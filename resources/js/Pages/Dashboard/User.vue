<template>

    <Head>
        <title>
            {{ self.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    {{ self.name }}
                </h2>
            </div>
        </div>
    </div>

    <div class="mt-4" v-if="page !== 'Main'">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 flex items-center space-x-2 text-black/75 hover:text-black cursor-pointer"
            @click="page = 'Main'">
            <i class="bx bx-arrow-back text-3xl"></i>
            <p class="font-semibold">Back</p>
        </div>
    </div>

    <div class="py-4" v-if="page === 'Main'">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 mb-4" v-if="overdue_payments">
            <div class="w-full bg-red-700 rounded-lg p-3 text-white flex items-center space-x-4">
                <i class="bx bxs-error-circle text-3xl"></i>
                <p class="text-sm">You have an overdue payment in your current loan</p>
            </div>
        </div>
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 mb-4" v-if="due_payments">
            <div class="w-full bg-yellow-400 rounded-lg p-3 text-black flex items-center space-x-4">
                <i class="bx bxs-error-circle text-3xl"></i>
                <p class="text-sm">You have a payment due today</p>
            </div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 lg:grid gap-2 grid-cols-2">
            <div class="w-full" @click="page = 'Savings'">
                <div class="bg-white rounded-lg p-6 cursor-pointer border border-transparent hover:border-theme-800">
                    <span class="font-bold block mb-5">Savings</span>
                    <span class="font-bold text-5xl">₱
                        <number ref="number1" :from="0" :to="self.savings" :duration="1" easing="Power3.easeOut" />
                    </span>
                </div>
            </div>
            <div class="w-full lg:mt-0 mt-4" @click="page = 'Share'">
                <div class="bg-white rounded-lg p-6 cursor-pointer border border-transparent hover:border-theme-800">
                    <span class="font-bold block mb-5">Share capital</span>
                    <span class="font-bold text-5xl">₱
                        <number ref="number2" :from="0" :to="self.share_capital" :duration="1"
                            easing="Power3.easeOut" />
                    </span>
                </div>
            </div>
            <div @click="page = 'Loanables'" v-if="!loan && loanables.length"
                class="bg-white rounded-lg p-3 lg:mt-0 mt-4 cursor-pointer border border-transparent hover:border-theme-800 col-span-2 flex justify-between items-center">
                <span>Available loans</span>
                <i class="bx bx-chevron-right text-2xl"></i>
            </div>
            <div @click="page = 'Loan'" v-if="loan"
                class="bg-white rounded-lg p-3 lg:mt-0 mt-4 cursor-pointer border border-transparent hover:border-theme-800 col-span-2 flex justify-between items-center">
                <span>Loan</span>
                <i class="bx bx-chevron-right text-2xl"></i>
            </div>
            <div @click="page = 'Loan History'" v-if="history.length"
                class="bg-white rounded-lg p-3 lg:mt-0 mt-4 cursor-pointer border border-transparent hover:border-theme-800 col-span-2 flex justify-between items-center">
                <span>Loan history</span>
                <i class="bx bx-chevron-right text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Savings -->
    <div v-if="page === 'Savings'">
        <div class="pt-4">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
                <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white dark:bg-zinc-900">
                        <span class="block text-sm font-bold pb-2">Savings:</span>
                        <span class="text-5xl">₱{{ self.savings }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction Logs -->
        <div class="py-4" v-if="savings_transactions.data.length">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
                <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white dark:bg-zinc-900">
                        <span class="text-sm font-bold">Transaction logs</span>
                        <table>
                            <tbody>
                                <tr v-for="transaction in savings_transactions.data"
                                    class="hover:bg-black/10 group cursor-pointer">
                                    <td class="p-3 rounded-l-lg">{{ format_dateMDY(transaction.created_at) }}</td>
                                    <td class="p-3" :class="{ 'text-red-600': transaction.method === 'Withdrawal' }">
                                        {{ transaction.method === 'Withdrawal' ? '-' : '' }}₱{{ transaction.amount }}
                                    </td>
                                    <td class="p-3 rounded-r-lg">{{ transaction.method }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination class="mt-6" :links="savings_transactions.links" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Share Capital -->
    <div v-if="page === 'Share'">
        <div class="py-4">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
                <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white dark:bg-zinc-900">
                        <span class="block text-sm font-bold pb-2">Share Capital:</span>
                        <span class="text-5xl">₱{{ self.share_capital }}</span>
                    </div>
                </div>
            </div>

            <!-- Transaction Logs -->
            <div class="py-4" v-if="share_transactions.data.length">
                <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
                    <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6 bg-white dark:bg-zinc-900">
                            <span class="text-sm font-bold">Transaction logs</span>
                            <table>
                                <tbody>
                                    <tr v-for="transaction in share_transactions.data"
                                        class="hover:bg-black/10 group cursor-pointer">
                                        <td class="p-3 rounded-l-lg">{{ format_dateMDY(transaction.created_at) }}</td>
                                        <td class="p-3 rounded-r-lg">₱{{
                                            transaction.amount
                                        }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <Pagination class="mt-6" :links="share_transactions.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loans -->
    <div v-if="page === 'Loan'">
        <div class="py-4">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
                <div class="bg-white rounded-lg p-6">
                    <div class="font-bold uppercase text-theme-800">Loan information</div>
                    <div class="flex flex-col mt-4">
                        <span class="font-bold text-sm text-theme-800 uppercase">Loan</span>
                        <span>{{ loan.loan_name }}</span>
                    </div>
                    <div class="flex flex-col mt-4">
                        <span class="font-bold text-sm text-theme-800 uppercase">Payment</span>
                        <span>₱{{ loan.receivable }} (₱{{ loan.paymentm }}/month)</span>
                    </div>
                </div>

                <!-- Payments -->
                <div class="bg-white rounded-lg p-6 mt-8">
                    <div class="uppercase text-theme-800 font-bold">Payments</div>
                    <table class="table-auto w-full text-left text-sm">
                        <thead>
                            <tr class="uppercase dark:text-white/80">
                                <th class="p-2">Date</th>
                                <th class="p-2">Date paid</th>
                                <th class="p-2">Payment</th>
                                <th class="p-2">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="payment in loan.payments" class="dark:hover:bg-white/10 dark:text-white/90">
                                <td class="rounded-l-lg">
                                    <div class="flex justify-between">
                                        <span class="p-2"
                                            :class="isLate(payment.month) && payment.payment == null ? 'text-red-500' : ''">{{
                                                formatPaymentDate(payment.month)
                                            }}</span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    {{ formatPaymentDate(payment.date_paid) }}
                                    <span v-if="payment.is_late"
                                        class="text-red-800 bg-red-200 dark:bg-transparent dark:border dark:border-red-500 dark:text-red-500 px-2 rounded-lg mr-1">Late</span>
                                    <span v-if="payment.payment && payment.payment < Math.round(loan.paymentm)"
                                        class="text-red-800 bg-red-200 px-2 dark:bg-transparent dark:border dark:border-red-500 dark:text-red-500 rounded-lg mr-1">Short</span>
                                </td>
                                <td>
                                    <span class="text-green-700 dark:text-green-500 pr-8">{{
                                        payment.payment?.toLocaleString()
                                    }}</span>
                                </td>
                                <td class="rounded-r-lg p-2">
                                    {{
                                        payment.payment ?
                                            payment.balance?.toLocaleString() : ''
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="bal > 0" class="flex justify-end font-semibold uppercase dark:text-white/90">Remaining
                        balance: ₱{{
                            bal.toLocaleString()
                        }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loanables -->
    <div v-if="page === 'Loanables'">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 my-4">
            <div class="bg-white rounded-lg p-6">
                <div class="font-bold uppercase text-theme-800">
                    Available loans
                </div>
                <div class="mt-4 flex flex-col space-y-2">
                    <div v-for="(loanable, index) in loanables" class="" :key="index">
                        {{ loanable.name }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- History -->
    <div v-if="page === 'Loan History'">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 my-4">
            <div class="bg-white rounded-lg p-6 mt-4">
                <Link :href="route('loans.show', loanHistory)" v-for="(loanHistory) in history"
                    class="flex items-center group rounded-lg lg:w-1/2 p-3 w-full justify-between hover:bg-black/10">
                <div>
                    {{ format_dateMDY(loanHistory.created_at) }}
                </div>
                <div>{{ loanHistory.loan_name }}</div>
                <i class="bx bxs-show group-hover:text-[#ed7464]"></i>
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import moment from 'moment';
import number from '@/Components/Number.vue';

export default {
    components: {
        Head, Link, Pagination, number
    },
    props: {
        self: Object,
        overdue_payments: Number,
        due_payments: Number,
        savings_transactions: Object,
        share_transactions: Object,
        loan: Object,
        bal: Number,
        history: Object,
        loanables: Object
    },
    data() {
        return {
            page: 'Main'
        }
    },
    methods: {
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('LL LTS')
            }
        },
        isLate(value) {
            if (value) {
                return moment().diff(moment(String(value)), 'days') >= 1
            }
        },
        formatPaymentDate(value) {
            if (value) {
                return moment(String(value)).format('MMMM D, YYYY')
            }
        }
    }
}
</script>