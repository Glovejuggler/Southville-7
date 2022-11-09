<template>

    <Head title="Payment" />

    <div class="bg-white shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 my-auto">
                    Payment
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="form.put(route('payment.update', payment.id))">
                        <div>
                            <BreezeLabel for="payment" value="Payment" />
                            <BreezeInput autofocus id="payment" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.payment" />
                            <div v-if="errors.payment" class="text-red-600">{{ errors.payment }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="date_paid" value="Date paid" />
                            <BreezeInput id="date_paid" type="date" class="mt-1 block w-full lg:w-96"
                                v-model="form.date_paid" />
                            <div v-if="errors.date_paid" class="text-red-600">{{ errors.date_paid }}</div>
                        </div>

                        <div>
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Pay</BreezeButton>
                            <Link as="button" @click="back"
                                class="ml-2 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                            Cancel
                            </Link>
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
import moment from 'moment';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Link
    },
    setup(props) {
        const format_dateInput = (value) => {
            if (value) {
                return moment(String(value)).format('YYYY\-MM\-DD')
            }
        }

        const form = useForm({
            client_id: props.client.id,
            payment: props.payment.payment,
            date_paid: format_dateInput(props.payment.date_paid),
        })

        return { form }
    },
    props: {
        payment: Object,
        client: Object,
        errors: Object
    },
    methods: {
        back() {
            window.history.back();
        }
    }
}
</script>