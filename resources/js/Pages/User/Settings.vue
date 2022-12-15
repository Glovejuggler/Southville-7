<template>

    <Head>
        <title>
            Settings
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Settings
                </h2>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="p-6 mb-4 bg-white dark:bg-zinc-900 border border-transparent rounded-lg">
                <div>
                    <span class="font-bold">Change password</span>
                    <div v-if="tab === 1">
                        <form @submit.prevent="form.get(route('pass.check'))">
                            <div class="mt-5">
                                <BreezeLabel for="password" value="Your password" />
                                <BreezeInput id="password" type="password" class="mt-1 block w-full lg:w-96"
                                    v-model="form.password" />
                                <div v-if="this.$page.props.flash.message === false" class="text-red-600">Incorrect
                                    password</div>
                            </div>

                            <div>
                                <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">Next
                                </BreezeButton>
                            </div>
                        </form>
                    </div>

                    <div v-if="tab === 2">
                        <form @submit.prevent="form.put(route('settings.update.password'))">
                            <div class="mt-5">
                                <BreezeLabel for="newpassword" value="New password" />
                                <BreezeInput id="newpassword" type="password" class="mt-1 block w-full lg:w-96"
                                    v-model="form.newpassword" />
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="confirmpassword" value="Confirm your new password" />
                                <BreezeInput id="confirmpassword" type="password" class="mt-1 block w-full lg:w-96"
                                    v-model="form.confirmpassword" />
                                <div v-if="form.newpassword.length > 0 && form.confirmpassword.length > 0 && form.newpassword !== form.confirmpassword"
                                    class="text-red-600">Does not match
                                </div>
                            </div>

                            <div>
                                <BreezeButton class="mt-4"
                                    :class="{ 'opacity-25': form.processing || (form.newpassword.length > 0 && form.confirmpassword.length > 0 && form.newpassword !== form.confirmpassword) }"
                                    :disabled="form.processing">Save
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeButton from '@/Components/Button.vue';

export default {
    data() {
        return {
            tab: this.$page.props.flash.message === true ? 2 : 1,
        }
    },
    components: {
        Head,
        BreezeInput,
        BreezeLabel,
        BreezeButton,
    },
    props: {
        self: Object,
    },
    setup() {
        const form = useForm({
            password: '',
            newpassword: '',
            confirmpassword: ''
        })

        return { form }
    },
}
</script>