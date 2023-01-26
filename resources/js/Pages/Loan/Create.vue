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

    <div class="py-4" v-if="!loan">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <!-- Cannot loan -->
                    <div v-if="!loanables.length">
                        <span class="italic">{{ member.name }} does not have enough share capital required for any
                            loan.</span>
                    </div>

                    <!-- Loan form -->
                    <form v-if="loanables.length" @submit.prevent="form.post(route('loans.store'))">
                        <div>
                            <BreezeLabel for="principal" value="Loan" />
                            <select v-model="form.loanable" id="principal"
                                class="block rounded-lg dark:bg-zinc-900 dark:text-white/70 border-gray-300 dark:border-white/30
                                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-96">
                                <option value="" disabled hidden selected>Select one</option>
                                <option v-for="loanable in loanables" :value="loanable.id">{{ loanable.name }}
                                </option>
                            </select>
                            <div v-if="errors.principal" class="text-red-600">{{ errors.principal }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="maturity" value="Starting date of payment" />
                            <BreezeInput id="maturity" type="date" class="mt-1 block w-full lg:w-96"
                                v-model="form.maturity" />
                            <div v-if="errors.maturity" class="text-red-600">{{ errors.maturity }}</div>
                        </div>

                        <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">Loan</BreezeButton>
                    </form>
                </div>
            </div>
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
                            <span class="dark:text-white/70">₱{{ loan?.receivable }} (₱{{
                                Math.round(loan?.paymentm)
                            }}/month)</span>
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
                                <th class="p-2">Payment</th>
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
                                            :class="isLate(payment.month) && payment.payment == null && loan?.balance ? 'text-red-500' : ''">{{
                                                format_dateMDY(payment.month)
                                            }}</span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    {{ format_dateMDY(payment.date_paid) }}
                                    <span v-if="payment.is_late"
                                        class="text-red-800 bg-red-200 dark:bg-transparent dark:border dark:border-red-500 dark:text-red-500 px-2 rounded-lg mr-1">Late</span>
                                    <span
                                        v-if="payment.payment && payment.payment < Math.round(loan.paymentm) && payment.balance > 0"
                                        class="text-red-800 bg-red-200 px-2 dark:bg-transparent dark:border dark:border-red-500 dark:text-red-500 rounded-lg mr-1">Short</span>
                                </td>
                                <td class="p-2">
                                    <span class="text-green-700 dark:text-green-500">{{
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
                            <tr v-if="loan?.paid_all && loan?.balance" @click="newPaymentModal = true"
                                class="hover:bg-black/10 dark:hover:bg-white/10 dark:text-white/90 cursor-pointer">
                                <td colspan="4" class="rounded-lg p-2 text-theme-500 hover:underline" align="center">
                                    Add new payment schedule
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="loan?.balance" class="flex justify-end font-semibold uppercase dark:text-white/90">
                        Remaining
                        balance: ₱{{
                            loan?.balance.toLocaleString()
                        }}</div>
                </div>
            </div>
        </div>

        <!-- End of loan -->
        <div class="py-4 max-w-screen-2xl mx-auto lg:px-8 flex justify-end" v-if="!loan?.balance">
            <!-- <Link :href="route('loans.destroy', loan.id)" as="button" method="delete"
                class="text-red-500 text-xs uppercase font-semibold p-2 border border-red-500 rounded-lg hover:bg-red-500 hover:text-white ease-out duration-300"
                preserve-scroll>Settle loan</Link> -->
            <button @click="showDeleteModal = true" type="button"
                class="text-red-500 text-xs uppercase font-semibold p-2 border border-red-500 rounded-lg hover:bg-red-500 hover:text-white ease-out duration-300">Settle
                loan</button>
        </div>

        <!-- Settle loan modal -->
        <div>
            <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
                enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
                leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
                <div v-if="showDeleteModal"
                    class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                    @click.self="this.showDeleteModal = false">
                    <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                        <div>
                            <span class="font-bold text-lg block mb-2">Confirmation</span>
                            <span class="font-normal text-sm">Are you sure you want to settle this loan?</span>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button class="mx-2 text-sm hover:underline"
                                @click="this.showDeleteModal = false">Cancel</button>
                            <Link as="button" :href="route('loans.destroy', loan.id)" method="delete"
                                class="mx-2 p-3 bg-red-600 hover:bg-red-700 active:bg-red-900 text-white text-sm rounded-lg">
                            Yes</Link>
                        </div>
                    </div>
                </div>
            </Transition>
            <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90"
                leave-from-class="opacity-90" leave-to-class="transform opacity-0" appear>
                <div v-if="showDeleteModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
            </Transition>
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
                        class="relative bg-white dark:bg-zinc-900 w-auto h-auto overflow-y-auto max-h-[80%] p-6 rounded-lg">
                        <div class="flex justify-between pb-3">
                            <span class="font-semibold text-gray-800 dark:text-white/90">{{
                                format_dateMDY(paymentform.paymentMonth)
                            }}</span>
                            <button class="inline-flex rounded-full hover:bg-black/20 dark:hover:bg-white/20"
                                @click="this.showPayment = false"><i
                                    class="bx bx-x text-[25px] text-black/60 dark:text-white/60"></i></button>
                        </div>
                        <form @submit.prevent="paymentSubmit(paymentform.paymentId)">
                            <div>
                                <BreezeLabel for="payment" value="Payment" />
                                <BreezeInput autofocus id="payment" type="text" class="mt-1 block w-full lg:w-96"
                                    v-model="paymentform.payment" />
                                <div v-if="errors.payment" class="text-red-600">{{ errors.payment }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="date_paid" value="Date paid" />
                                <BreezeInput id="date_paid" type="date" class="mt-1 block w-full lg:w-96"
                                    v-model="paymentform.date_paid" />
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="notes" value="Notes" />
                                <textarea name="notes" v-model="paymentform.notes" id="notes" cols="30" rows="10"
                                    class="mt-1 block w-full lg:w-96 rounded-lg dark:bg-zinc-900 text-sm text-gray-700 dark:text-white/70 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm"
                                    style="resize: none;"></textarea>
                            </div>

                            <div>
                                <BreezeButton class="mt-4" :class="{ 'opacity-25': paymentform.processing }"
                                    :disabled="paymentform.processing || paymentform.payment == null || paymentform.date_paid == null || Number.isSafeInteger(Number(paymentform.payment)) === false">
                                    Pay
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </Transition>
            <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90"
                leave-from-class="opacity-90" leave-to-class="transform opacity-0" appear>
                <div v-if="showPayment" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
            </Transition>
        </div>

        <!-- New payment schedule modal -->
        <div>
            <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
                enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
                leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
                <div v-if="newPaymentModal"
                    class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                    @click.self="this.newPaymentModal = false">
                    <div
                        class="relative bg-white dark:bg-zinc-900 lg:w-96 w-11/12 h-auto overflow-y-auto max-h-[80%] p-6 rounded-lg">
                        <div class="flex justify-between pb-3">
                            <span class="font-semibold text-gray-800 dark:text-white/90">New payment schedule</span>
                            <button class="inline-flex rounded-full hover:bg-black/20 dark:hover:bg-white/20"
                                @click="this.newPaymentModal = false"><i
                                    class="bx bx-x text-[25px] text-black/60 dark:text-white/60"></i></button>
                        </div>
                        <form @submit.prevent="newPaymentForm.post(route('payment.store'), {
                            onSuccess: () => this.newPaymentModal = false
                        })">
                            <div>
                                <BreezeLabel for="month" value="Date" />
                                <BreezeInput id="month" type="date" class="mt-1 block w-full"
                                    v-model="newPaymentForm.month" required />
                            </div>

                            <div>
                                <BreezeButton class="mt-4" :class="{ 'opacity-25': paymentform.processing }"
                                    :disabled="paymentform.processing">
                                    Add
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </Transition>
            <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90"
                leave-from-class="opacity-90" leave-to-class="transform opacity-0" appear>
                <div v-if="newPaymentModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
            </Transition>
        </div>
    </div>

    <!-- Loan History -->
    <div class="py-4 max-w-screen-2xl mx-auto px-6 lg:px-8" v-if="history.length">
        <div class="font-bold mb-3">Loan history</div>
        <div class="p-6 bg-white rounded-lg">
            <Link :href="route('loans.show', loanHistory)" v-for="(loanHistory) in history"
                class="flex items-center group rounded-lg lg:w-1/3 md:w-full p-3 w-full justify-between hover:bg-black/10">
            <div>
                {{ format_dateMDY(loanHistory.created_at) }}
            </div>
            <div>{{ loanHistory.loan_name }}</div>
            <i class="bx bxs-show group-hover:text-[#ed7464]"></i>
            </Link>
        </div>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
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
    setup(props) {
        const form = useForm({
            member_id: props.member.id,
            loanable: '',
            rate: 3,
            term: 3,
            amortization: 3,
            maturity: ''
        })

        const paymentform = useForm({
            paymentMonth: '',
            paymentId: '',
            payment: '',
            notes: '',
            date_paid: '',
        })

        function paymentSubmit(value) {
            paymentform.put(route('payment.update', value), {
                preserveScroll: true,
                preserveState: false,
                onSuccess: () => this.showPayment = false
            })
        }

        const newPaymentForm = useForm({
            loan_id: props.loan?.id,
            month: '',
        })

        return { form, paymentform, paymentSubmit, newPaymentForm }
    },
    props: {
        member: Object,
        errors: Object,
        loanables: Object,
        loan: Object,
        history: Object
    },
    data() {
        return {
            showPayment: false,
            showDeleteModal: false,
            newPaymentModal: false,
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
        togglePayment(value) {
            if (this.$page.props.auth.position.some(r => ['Treasurer'].includes(r))) {
                this.showPayment = true;
                this.paymentform.paymentMonth = value.month;
                this.paymentform.paymentId = value.id;
                this.paymentform.payment = value.payment;
                this.paymentform.notes = value.notes;
                if (value.date_paid) {
                    this.paymentform.date_paid = moment(String(value.date_paid)).format('YYYY\-MM\-DD');
                } else {
                    this.paymentform.date_paid = null;
                }
            }
        }
    }
}
</script>