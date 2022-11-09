<template>

    <Head>
        <title>
            Loan - {{ member.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-white/90 my-auto">
                    Loan for {{ member.name }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.post(route('loans.store'))">
                        <div>
                            <BreezeLabel for="principal" value="Principal" />
                            <BreezeInput autofocus id="principal" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.principal" />
                            <div v-if="errors.principal" class="text-red-600">{{ errors.principal }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="rate" value="Rate (%)" />
                            <BreezeInput id="rate" type="text" class="mt-1 block w-full lg:w-96" v-model="form.rate" />
                            <div v-if="errors.rate" class="text-red-600">{{ errors.rate }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="term" value="Term (months)" />
                            <BreezeInput id="term" type="text" class="mt-1 block w-full lg:w-96" v-model="form.term" />
                            <div v-if="errors.term" class="text-red-600">{{ errors.term }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="amortization" value="Amortization" />
                            <BreezeInput id="amortization" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.amortization" />
                            <div v-if="errors.amortization" class="text-red-600">{{ errors.amortization }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="maturity" value="Starting date of payment" />
                            <BreezeInput id="maturity" type="date" class="mt-1 block w-full lg:w-96"
                                v-model="form.maturity" />
                            <div v-if="errors.maturity" class="text-red-600">{{ errors.maturity }}</div>
                        </div>

                        <div>
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Loan</BreezeButton>
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
import { Head, useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
    },
    setup(props) {
        const form = useForm({
            member_id: props.member.id,
            principal: '',
            rate: '',
            term: '',
            amortization: '',
            maturity: ''
        })

        return { form }
    },
    props: {
        member: Object,
        errors: Object
    }
}
</script>