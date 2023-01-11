<template>

    <Head>
        <title>
            {{ member.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    {{ member.name }}
                </h2>
            </div>
        </div>
    </div>

    <ShowMemberTabs :member="member" />

    <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="cursor-pointer flex px-3 space-x-2 hover:px-1 duration-200 ease-in-out items-center"
            @click="this.$inertia.visit(route('loans.create', member))">
            <i class="bx bx-arrow-back"></i>
            <span>Back</span>
        </div>
    </div>

    <!-- Loan Information -->
    <div class="py-4" v-if="loan">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900 w-full">
                    <div>
                        <span class="uppercase text-theme-800 dark:text-white/90 font-bold block">Loan
                            Information</span>
                    </div>

                    <div class="mt-4">
                        <div>
                            <span
                                class="text-sm uppercase font-bold text-theme-800 dark:text-white/90 block">Loan</span>
                            <span class="dark:text-white/70">{{ loan?.loan_name }}</span>
                        </div>
                        <div class="mt-2">
                            <span
                                class="text-sm uppercase font-bold text-theme-800 dark:text-white/90 block">Receivable</span>
                            <span class="dark:text-white/70">₱{{ loan?.receivable }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments -->
        <div class="lg:mt-8 mt-4 max-w-screen-2xl mx-auto px-6 lg:px-8" v-if="loan">
            <div class="bg-white dark:bg-zinc-900 overflow-x-auto shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <h4 class="uppercase text-theme-800 font-bold mb-4 dark:text-white/90">Payments</h4>
                    <table class="table-auto w-full text-left text-sm">
                        <thead>
                            <tr class="uppercase dark:text-white/80">
                                <th class="p-2">Date</th>
                                <th class="p-2">Date paid</th>
                                <th class="p-2">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="payment in loan.payments"
                                class="hover:bg-black/10 dark:hover:bg-white/10 dark:text-white/90 cursor-pointer"
                                @click="togglePayment(payment)">
                                <td class="rounded-l-lg">
                                    <div class="flex justify-between">
                                        <span class="p-2"
                                            :class="isLate(payment.month) && payment.payment == null ? 'text-red-500' : ''">{{
                                                format_dateMDY(payment.month)
                                            }}</span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="flex justify-between">
                                        <div>
                                            {{ format_dateMDY(payment.date_paid) }}
                                            <span v-if="payment.is_late"
                                                class="text-red-800 bg-red-200 dark:bg-transparent dark:border dark:border-red-500 dark:text-red-500 px-2 rounded-lg mr-1">Late</span>
                                            <span v-if="payment.payment && payment.payment < Math.round(loan.paymentm)"
                                                class="text-red-800 bg-red-200 px-2 dark:bg-transparent dark:border dark:border-red-500 dark:text-red-500 rounded-lg mr-1">Short</span>
                                        </div>
                                        <span class="text-green-700 dark:text-green-500 pr-8">{{
                                            payment.payment?.toLocaleString()
                                        }}</span>
                                    </div>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Payment modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showPayment"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showPayment = false">
                <div
                    class="relative bg-white dark:bg-zinc-900 w-full lg:w-96 h-auto overflow-y-auto max-h-[80%] p-6 rounded-lg">
                    <div class="flex justify-between pb-3">
                        <span class="font-semibold text-gray-800 dark:text-white/90">{{
                            format_dateMDY(payment.month)
                        }}</span>
                        <button class="inline-flex rounded-full hover:bg-black/20 dark:hover:bg-white/20"
                            @click="this.showPayment = false"><i
                                class="bx bx-x text-[25px] text-black/60 dark:text-white/60"></i></button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="text-sm text-theme-900 font-semibold">
                            Date paid:
                        </div>
                        <span>
                            {{ format_dateMDY(payment.date_paid) }}
                        </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="text-sm text-theme-900 font-semibold">
                            Payment:
                        </div>
                        <span>
                            {{ `₱${payment.payment}.00` }}
                        </span>
                    </div>
                    <div>
                        <div class="text-sm text-theme-800 font-semibold">
                            Notes:
                        </div>
                        <div :class="{ 'italic': payment.notes === null }" class="text-sm">
                            {{ payment.notes ?? 'None' }}
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showPayment" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ShowMemberTabs from '@/Components/ShowMemberTabs.vue';
import moment from 'moment';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Link,
        ShowMemberTabs
    },
    props: {
        member: Object,
        loan: Object,
    },
    data() {
        return {
            payment: '',
            showPayment: false,
        }
    },
    methods: {
        format_dateMY(value) {
            if (value) {
                return moment(String(value)).format('MMMM YYYY')
            }
        },
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('MMMM D, YYYY')
            }
        },
        isLate(value) {
            if (value) {
                return moment().diff(moment(String(value)), 'days') >= 1
            }
        },
        togglePayment(payment) {
            this.showPayment = true
            this.payment = payment

        }
    }
}
</script>