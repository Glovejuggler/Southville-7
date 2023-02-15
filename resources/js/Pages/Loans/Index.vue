<template>

    <Head>
        <title>
            Ledger
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Ledger
                </h2>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 lg:flex justify-between">
            <BreezeInput v-model="form.search" class="mt-1 block lg:w-96 w-full" type="text" placeholder="Search..." />
            <div class="flex items-center lg:flex-row flex-col-reverse lg:space-x-2 space-x-0">
                <div class="flex flex-col lg:flex-row lg:space-y-0 space-y-2 lg:space-x-2 space-x-0 w-full lg:w-auto">
                    <select id="status" v-model="form.type"
                        class="block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-auto">
                        <option value="">All</option>
                        <option value="Active">Active</option>
                        <option value="Paid">Paid</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <InfiniteScroll :loadMore="loadMoreLoans">
        <div class="py-4">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
                <div class="bg-white rounded-lg p-6 overflow-x-auto">
                    <table class="table-auto w-full text-left text-sm">
                        <thead>
                            <tr class="uppercase dark:text-white/80">
                                <th class="p-2">Name</th>
                                <th class="p-2">Date</th>
                                <th class="p-2">Month</th>
                                <th class="p-2">Amount</th>
                                <th class="p-2">Interest</th>
                                <th class="p-2">Total</th>
                                <th class="p-2">Due</th>
                                <th class="p-2">Payments</th>
                                <th class="p-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="loan in visibleLoans.data"
                                class="cursor-pointer hover:bg-black/10 odd:bg-theme-800/5 align-top"
                                @click="goTo(loan)">
                                <td class="p-2 rounded-l-lg">{{ loan.member?.name }}</td>
                                <td class="p-2">{{ format_dateMDY(loan.created_at) }}</td>
                                <td class="p-2">{{ loan.term }}</td>
                                <td class="p-2">₱{{ Math.round(loan.principal).toLocaleString() }}</td>
                                <td class="p-2">₱{{ Math.round(loan.interest).toLocaleString() }}</td>
                                <td class="p-2">₱{{ Math.round(loan.receivable).toLocaleString() }}</td>
                                <td class="p-2">{{
                                    format_dateMDY(loan.payments[loan.payments.length -
                                        1].month)
                                }}</td>
                                <td class="p-2">
                                    <div class="flex justify-between" v-for="payment in loan.payments">
                                        <p>{{ format_dateMDY(payment.date_paid) }}</p>
                                        <p>{{ payment.payment ? `₱${payment.payment.toLocaleString()}` : '' }}</p>
                                    </div>
                                </td>
                                <td class="p-2 rounded-r-lg"><span
                                        :class="{ 'px-2 inline-flex rounded-lg text-xs bg-green-200 text-green-800 dark:bg-transparent dark:border-green-500 dark:border dark:text-green-500': loan.deleted_at }">{{
    loan.deleted_at ? 'Paid'
        : ''
                                        }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </InfiniteScroll>
</template>

<script>
export default {
    props: {
        filters: Object,
        loans: Object
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                type: this.filters.type ?? "",
            },
            visibleLoans: this.loans,
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/ledger', pickBy(this.form), {
                    preserveState: true,
                    preserveScroll: true,
                    replace: true,
                    onFinish: () => this.visibleLoans = this.loans,
                });
            }, 150),
        }
    },
    methods: {
        loadMoreLoans() {
            if (!this.visibleLoans.next_page_url) {
                return Promise.resolve();
            }

            return axios.get(this.visibleLoans.next_page_url).then(response => {
                this.visibleLoans = {
                    ...response.data,
                    data: [...this.visibleLoans.data, ...response.data.data]
                }
            });
        },
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('MMMM D, YYYY')
            }
        },
        goTo(loan) {
            this.$inertia.get(route('loans.show', loan));
        }
    },
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import throttle from 'lodash/throttle';
import pickBy from 'lodash/pickBy';
import axios from 'axios';
import InfiniteScroll from '@/Components/InfiniteScroll.vue';
import moment from 'moment';
</script>