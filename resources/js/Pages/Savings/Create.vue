<template>

    <Head>
        <title>
            {{ member.name }} - Savings
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-white/90 my-auto">
                    {{ member.name }} - Savings
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.post(route('savings.store'))">
                        <div>
                            <BreezeLabel for="amount" value="Amount" />
                            <BreezeInput autofocus id="amount" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.amount" />
                            <div v-if="errors.amount" class="text-red-600">{{ errors.amount }}</div>
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
    setup(props) {
        const form = useForm({
            amount: '',
            member_id: props.member.id,
        })

        return { form }
    },
    props: {
        errors: Object,
        member: Object,
    }
}
</script>