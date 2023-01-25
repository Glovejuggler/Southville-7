<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <BreezeGuestLayout>

        <Head title="Log in" />

        <div class="flex justify-center">
            <img src="../../../../public/images/logo-large.png" class="h-48 w-48" alt="">
        </div>
        <div class="flex justify-center mt-2 font-bold text-theme-800 text-lg">
            Login
        </div>

        <BreezeValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="email" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-center mt-4">
                <BreezeButton type="submit" class="w-full flex justify-center"
                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </BreezeButton>
            </div>
        </form>

        <div class="mt-3 flex justify-center">
            <Link :href="route('password.request')" class="text-theme-300 underline">Forgot your password?</Link>
        </div>

        <div class="mt-3 flex justify-center">
            <a :href="route('home')" class="text-theme-300 underline">Back to home</a>
        </div>
    </BreezeGuestLayout>
</template>

<script>
export default {
    layout: null
}
</script>
