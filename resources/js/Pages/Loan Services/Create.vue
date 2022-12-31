<template>

    <Head>
        <title>
            New Loan Service
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    New Loan Service
                </h2>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.post(route('loanables.store'))">
                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput autofocus id="name" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.name" />
                            <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="type" value="Type" />
                            <select v-model="form.type" id="type"
                                class="block rounded-lg dark:bg-zinc-900 dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30
                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-96">
                                <option value="" disabled hidden selected>Select one</option>
                                <option value="Cash">Cash</option>
                                <option value="Goods">Goods</option>
                            </select>
                            <div v-if="errors.type" class="text-red-600">{{ errors.type }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="equivalent" value="Equivalent amount" />
                            <BreezeInput id="equivalent" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.equivalent" />
                            <div v-if="errors.equivalent" class="text-red-600">{{ errors.equivalent }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="requirement" value="Required share capital" />
                            <BreezeInput id="requirement" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.requirement" />
                            <div v-if="errors.requirement" class="text-red-600">{{ errors.requirement }}</div>
                        </div>

                        <div>
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Add</BreezeButton>
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
    setup() {
        const form = useForm({
            name: '',
            type: '',
            equivalent: '',
            requirement: '',
        })

        return { form }
    },
    props: {
        errors: Object
    }
}
</script>