<template>

    <Head>
        <title>
            {{ member.name }} - Savings
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

    <div class="pt-4">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <span class="block text-sm font-bold pb-2">Savings:</span>
                    <span class="text-5xl">₱{{ member.savings }}</span>
                    <div v-if="$page.props.auth.position.includes('Treasurer')" class="flex mt-4">
                        <BreezeButton type="button" class="" @click="toggleDeposit">Deposit</BreezeButton>
                        <BreezeButton type="button" class="ml-2" @click="toggleWithdrawal">Withdraw</BreezeButton>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Logs -->
    <div class="py-4" v-if="transactions.data.length">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <span class="text-sm font-bold">Transaction logs</span>
                    <table>
                        <tbody>
                            <tr v-for="transaction in transactions.data" class="hover:bg-black/10 group cursor-pointer">
                                <td class="p-3 rounded-l-lg">{{ format_dateMDY(transaction.created_at) }}</td>
                                <td class="p-3" :class="{ 'text-red-600': transaction.method === 'Withdrawal' }">
                                    {{ transaction.method === 'Withdrawal' ? '-' : '' }}₱{{ transaction.amount }}
                                </td>
                                <td class="p-3 rounded-r-lg">{{ transaction.method }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="transactions.links" />
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit/Withdrawal Modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showDeposit || showWithdrawal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showDeposit = false, this.showWithdrawal = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <div class="flex justify-between pb-3">
                        <span class="font-semibold text-gray-800 dark:text-white/90">
                            {{ showDeposit ? 'Deposit' : 'Withdawal' }}
                        </span>
                        <button class="inline-flex rounded-full hover:bg-black/20 dark:hover:bg-white/20"
                            @click="this.showDeposit = false, this.showWithdrawal = false"><i
                                class="bx bx-x text-[25px] text-black/60 dark:text-white/60"></i></button>
                    </div>
                    <form @submit.prevent="submitSavings()">
                        <div>
                            <BreezeLabel for="amount" value="Amount" />
                            <BreezeInput autofocus id="amount" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.amount" />
                            <div v-if="errors.amount" class="text-red-600">{{ errors.amount }}</div>
                        </div>

                        <div>
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">{{ showDeposit ? 'Deposit' :
        'Withdraw'
}}
                            </BreezeButton>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showDeposit || showWithdrawal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';
import ShowMemberTabs from '@/Components/ShowMemberTabs.vue';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Pagination,
        ShowMemberTabs
    },
    setup(props) {
        const form = useForm({
            amount: '',
            member_id: props.member.id,
            method: ''
        })

        function submitSavings() {
            form.post(route('savings.store'), {
                preserveScroll: true,
                preserveState: false,
                onSuccess: () => {
                    this.showDeposit = false
                    this.showWithdrawal = false
                }
            })
        }

        return { form, submitSavings }
    },
    props: {
        errors: Object,
        member: Object,
        savings: Number,
        transactions: Object
    },
    methods: {
        toggleDeposit() {
            this.showDeposit = true;
            this.form.method = 'Deposit';
        },
        toggleWithdrawal() {
            this.showWithdrawal = true;
            this.form.method = 'Withdrawal';
        },
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('LL LTS')
            }
        },
    },
    data() {
        return {
            showDeposit: false,
            showWithdrawal: false,
        }
    }
}
</script>