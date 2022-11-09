<template >

    <Head>
        <title>
            {{ client.name }}
        </title>
    </Head>

    <!-- Header -->
    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    {{ client.name }}
                </h2>
                <div>
                    <Link v-if="!user" as="button" method="post" :href="route('user.store', client.id)" class="inline-flex cursor-pointer
                            items-center mx-2 px-4 py-2 bg-theme-800
                            border border-transparent rounded-md 
                            font-semibold text-xs text-white uppercase
                            tracking-widest hover:bg-theme-700 active:bg-theme-900
                            focus:outline-none focus:border-theme-900
                            focus:shadow-outline-theme transition ease-in-out duration-150">
                    Create account
                    </Link>
                    <Link as="button" v-if="!loan" :href="route('loans.create', client.id)" class="inline-flex cursor-pointer
                            items-center mx-2 px-4 py-2 bg-theme-800
                            border border-transparent rounded-md 
                            font-semibold text-xs text-white uppercase
                            tracking-widest hover:bg-theme-700 active:bg-theme-900
                            focus:outline-none focus:border-gray-900
                            focus:shadow-outline-theme transition ease-in-out duration-150">
                    Loan
                    </Link>
                    <Link as="button" :href="route('savings.create', client.id)" class="inline-flex cursor-pointer
                            items-center mx-2 px-4 py-2 bg-emerald-800
                            border border-transparent rounded-md 
                            font-semibold text-xs text-white uppercase
                            tracking-widest hover:bg-emerald-700 active:bg-emerald-900
                            focus:outline-none focus:border-emerald-900
                            focus:shadow-outline-gray transition ease-in-out duration-150">
                    Savings
                    </Link>
                    <Link as="button" :href="route('clients.edit', client.id)" class="inline-flex cursor-pointer
                            items-center mx-2 px-4 py-2 bg-emerald-800
                            border border-transparent rounded-md 
                            font-semibold text-xs text-white uppercase
                            tracking-widest hover:bg-emerald-700 active:bg-emerald-900
                            focus:outline-none focus:border-emerald-900
                            focus:shadow-outline-gray transition ease-in-out duration-150">
                    Edit
                    </Link>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Information -->
    <div class="lg:flex pt-12 max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg w-full">
            <div class="p-6 bg-white dark:bg-zinc-900">
                <span class="uppercase font-bold block text-theme-800 dark:text-white/90 text-lg">{{ client.name
                }}</span>
                <div class="lg:flex">
                    <div class="w-full lg:w-1/2">
                        <span class="block mt-3 dark:text-white/80"><i
                                class="bx bxs-home mr-1 font-bold text-lg text-theme-800 dark:text-white/90"></i>{{
                                        client.address
                                }}</span>
                        <span class="block dark:text-white/80"><i
                                class="bx bxs-contact mr-1 font-bold text-lg text-theme-800 dark:text-white/90"></i>{{
                                        client.contact_number
                                }}</span>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <span class="block lg:mt-3 dark:text-white/80"><i
                                class="bx bxs-calendar mr-1 font-bold text-lg text-theme-800 dark:text-white/90"></i>{{
                                        format_dateMDY(client.birthdate)
                                }}</span>
                    </div>
                </div>
                <div class="font-bold mt-5">
                    Savings: PHP {{ savings }}
                </div>
                <div v-if="history > 0">
                    <Link as="button" :href="route('client.view', client.id)"
                        class="flex items-center rounded-lg bg-gray-900 text-white p-2 mt-4 font-semibold uppercase text-sm">
                    <i class="bx bx-history text-lg mr-1"></i> History
                    </Link>
                </div>
            </div>
        </div>
    </div>

    <!-- Loan Information -->
    <div class="lg:flex mt-8 max-w-screen-2xl mx-auto px-6 lg:px-8" v-if="loan">
        <div class="group lg:pr-2" :class="loan ? 'lg:w-2/3' : 'lg:w-full'">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <div>
                        <span class="uppercase text-gray-800 dark:text-white/90 font-bold block">Loan Information</span>
                        <span class="block text-black/60 dark:text-white/60"
                            v-if="loan.amortization / loan.term == 1 && loan.payments.length > 1">Monthly</span>
                        <span class="block text-black/60"
                            v-else-if="loan.amortization / loan.term == 2">Semi-monthly</span>
                        <span class="block text-black/60" v-if="loan.payments.length == 1">One-time payment</span>
                    </div>

                    <div class="flex mt-8">
                        <div class="w-1/2">
                            <div>
                                <span
                                    class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Interest
                                    Rate</span>
                                <span class="dark:text-white/70">{{ loan?.rate }}%</span>
                            </div>

                            <div class="mt-4">
                                <span
                                    class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Term</span>
                                <span class="dark:text-white/70">{{ loan?.term }} month{{ loan?.term > 1 ? 's' : ''
                                }}</span>
                            </div>

                            <div class="mt-4">
                                <span
                                    class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Amortization</span>
                                <span class="dark:text-white/70">{{ loan?.amortization }}</span>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div>
                                <span
                                    class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Principal</span>
                                <span class="dark:text-white/70">{{ loan?.principal.toLocaleString() }}</span>
                            </div>

                            <div class="mt-4">
                                <span
                                    class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Interest</span>
                                <span class="dark:text-white/70">{{ loan?.interest.toLocaleString() }}</span>
                            </div>

                            <div class="mt-4">
                                <span
                                    class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Receivable</span>
                                <span class="dark:text-white/70">{{ loan?.receivable.toLocaleString() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maturity -->
        <div class="lg:w-1/3 lg:pl-2 lg:mt-0 mt-4" v-if="loan">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900 flex">

                    <div class="w-full">
                        <span class="uppercase font-bold block text-gray-800 dark:text-white/90">Maturity</span>
                        <span class="dark:text-white/80">{{ start_month }} to {{ end_month }}</span>

                        <div class="mt-8">
                            <span
                                class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Payments</span>
                            <span class="dark:text-white/80">{{ Math.round(loan.paymentm).toLocaleString() }}</span>
                        </div>

                        <div class="mt-4">
                            <span
                                class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Principal</span>
                            <span class="dark:text-white/80">{{ Math.round(loan.principalm).toLocaleString() }}</span>
                        </div>

                        <div class="mt-4">
                            <span
                                class="text-sm uppercase font-bold text-gray-800 dark:text-white/90 block">Interest</span>
                            <span class="dark:text-white/80">{{ Math.round(loan.interestm).toLocaleString() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payments -->
    <div class="lg:mt-8 mt-4 max-w-screen-2xl mx-auto px-6 lg:px-8" v-if="loan">
        <div class="bg-white dark:bg-zinc-900 overflow-x-auto shadow-sm rounded-lg">
            <div class="p-6 bg-white dark:bg-zinc-900">
                <h4 class="uppercase text-gray-800 font-bold mb-4 dark:text-white/90">Payments</h4>
                <table class="table-auto w-full text-left text-sm">
                    <thead>
                        <tr class="uppercase dark:text-white/80">
                            <th class="p-2">Date</th>
                            <th class="p-2">Date paid</th>
                            <th class="p-2">Principal</th>
                            <th class="p-2">Interest</th>
                            <th class="p-2">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="payment in loan.payments"
                            class="hover:bg-black/10 dark:hover:bg-white/10 dark:text-white/90 group">
                            <td class="rounded-l-lg">
                                <div class="flex justify-between">
                                    <span class="p-2"
                                        :class="isLate(payment.month) && payment.payment == null ? 'text-red-500' : ''">{{
                                                format_dateMDY(payment.month)
                                        }}</span>
                                    <button
                                        class="text-lg invisible group-hover:visible hover:text-green-600 dark:hover:text-green-500"
                                        @click="togglePayment(payment)"><i class="bx bx-edit"></i></button>
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
                            <td class="p-2">
                                {{ payment.payment ?
                                        (payment.payment - Math.round(loan.interestm)).toLocaleString() : ''
                                }}
                            </td>
                            <td class="p-2">
                                {{ payment.interest > 0 ? Math.round(payment.interest) : ''
                                }}
                            </td>
                            <td class="rounded-r-lg p-2">
                                {{ payment.payment ?
                                        payment.balance?.toLocaleString() : ''
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-if="bal > 0" class="flex justify-end font-semibold uppercase dark:text-white/90">Remaining
                    balance: P{{
                            bal.toLocaleString()
                    }}</div>
            </div>
        </div>
    </div>

    <!-- Picture upload -->
    <div class="lg:mt-8 mt-4 max-w-screen-2xl mx-auto px-6 lg:px-8 pb-4 group" v-if="loan && $page.props.auth.is_admin">
        <div class="bg-white dark:bg-zinc-900 overflow-x-auto shadow-sm rounded-lg">
            <div class="p-6 bg-white dark:bg-zinc-900">
                <div class="flex justify-between">
                    <span class="font-bold dark:text-white/90">Others</span>
                    <form @submit.prevent="submit">
                        <label class="flex">
                            <span class="sr-only">Choose files</span>
                            <input type="file" name="file" accept="image/*" @input="fileform.file = $event.target.files"
                                class="block w-full text-sm text-slate-500 dark:text-white/70
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gray-50 file:text-gray-700 dark:file:text-white/70 dark:file:bg-zinc-600
                                hover:file:bg-gray-100
                                " multiple />
                            <button :disabled="fileform.processing" type="submit"
                                class="text-sm uppercase rounded-lg text-white font-semibold bg-gray-800 px-3">
                                <span>Upload</span>
                            </button>
                        </label>
                    </form>
                </div>
                <div class="lg:flex lg:flex-wrap mt-4">
                    <div v-for="pic in pics" class="basis-1/4 p-1 cursor-pointer
                        [&>div>div:nth-child(3)]:hover:z-30
                        [&>div>div:nth-child(3)]:hover:delay-500
                        [&>div>div:nth-child(3)]:hover:translate-x-0
                        [&>div>img]:hover:scale-125
                        [&>div>img]:hover:opacity-75
                        rounded-lg">
                        <div class="relative h-48 rounded-lg overflow-hidden content-center">
                            <img :src="`../${pic.path}`"
                                class="z-20 absolute h-full w-full bg-white object-cover rounded-lg ease-in-out duration-300"
                                @click.self="toggleModal(pic.path, pic.id)">
                            <div class="z-10 absolute bg-black w-full h-full">
                            </div>
                            <div class="absolute z-0 grid w-full h-full translate-x-1/4 ease-in-out duration-300"
                                @click.self="toggleModal(pic.path, pic.id)">
                                <Link class="uppercase text-white font-bold place-self-end
                                    inline-flex p-3 bg-red-600 hover:bg-red-500
                                    rounded-full m-3" :href="route('files.destroy', pic.id)" method="delete"
                                    as="button" preserve-scroll>
                                <i class="bx bx-trash text-lg leading-none"></i></Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- No active loan prompt -->
    <div class="my-8 mx-4 flex justify-center" v-else>
        <span class="text-black/40 dark:text-white/40">No active loan</span>
    </div>

    <!-- End of loan -->
    <div class="pb-4 max-w-screen-2xl mx-auto lg:px-8 flex justify-end" v-if="loan?.is_fully_paid">
        <Link :href="route('loans.destroy', loan.id)" as="button" method="delete"
            class="text-red-500 text-xs uppercase font-semibold p-2 border border-red-500 rounded-lg hover:bg-red-500 hover:text-white ease-out duration-300"
            preserve-scroll>Close account</Link>
    </div>

    <!-- Image modal -->
    <ShowImage ref="showImageModal" />

    <!-- Payment modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showPayment"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showPayment = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
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
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showPayment" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';
import ShowImage from '@/Components/ShowImage.vue';

export default {
    components: {
        Head,
        Link,
        BreezeButton,
        ShowImage,
        BreezeInput,
        BreezeLabel,
    },
    props: {
        client: Object,
        loan: Object,
        bal: Number,
        pics: Object,
        errors: Object,
        history: Number,
        user: Object,
        savings: Number,
    },
    data(props) {
        return {
            start_month: this.format_dateMDY(props.loan?.payments[0]?.month),
            end_month: this.format_dateMDY(props.loan?.payments[props.loan?.payments?.length - 1]?.month),
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
        toggleModal(value, fileId) {
            this.$refs.showImageModal.toggleModal(value, fileId);
        },
        togglePayment(value) {
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
    },
    setup(props) {
        const fileform = useForm({
            client_id: props.client.id,
            loan_id: props.loan?.id,
            file: [],
        })

        function submit() {
            fileform.post('/files', {
                preserveScroll: true,
                preserveState: false,
                onSuccess: () => fileform.reset('file'),
            });
        }

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

        return { fileform, submit, paymentform, paymentSubmit }
    },
    created() {
        window.addEventListener('keydown', (e) => {
            if (e.key == 'Escape') {
                this.showPayment = false;
            }
        });
    }
}

</script>