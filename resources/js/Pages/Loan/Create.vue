<template>

    <Head>
        <title>
            Loan - {{ member.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    Loan for {{ member.name }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <div v-if="!loanables.length">
                        <span class="italic">{{ member.name }} does not have enough savings required for any
                            loan.</span>
                    </div>
                    <form @submit.prevent="form.post(route('loans.store'))" v-else>
                        <div>
                            <BreezeLabel for="principal" value="Loan" />
                            <select v-model="form.principal" id="principal"
                                class="block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30
                                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-96">
                                <option value="" disabled hidden selected>Select one</option>
                                <option v-for="loanable in loanables" :value="loanable.equivalent">{{ loanable.name }}
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

                        <div class="flex-row">
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Loan</BreezeButton>

                            <BreezeButton type="button"
                                class="mx-2 bg-neutral-500 hover:bg-neutral-600 active:bg-neutral-700 focus:bg-neutral-700"
                                @click="back()">Back</BreezeButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Link
    },
    setup(props) {
        const form = useForm({
            member_id: props.member.id,
            principal: '',
            rate: 3,
            term: 3,
            amortization: 3,
            maturity: ''
        })

        return { form }
    },
    props: {
        member: Object,
        errors: Object,
        loanables: Object,
    },
    methods: {
        back() {
            window.history.back();
        }
    }
}
</script>