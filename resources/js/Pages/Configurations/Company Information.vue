<template>

    <Head>
        <title>
            Configurations
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white/90 my-auto">
                Configurations
            </h2>
        </div>
    </div>

    <div class="lg:flex py-12 max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg w-full">
            <div class="p-6 bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-0">
                <Tabs />

                <!-- Main Content -->
                <div class="pt-5 pb-10 text-xl dark:text-white">
                    Company Settings
                </div>
                <!-- Company Information -->
                <div
                    class="text-black/80 dark:text-white/80 uppercase pb-1 text-xs flex border-b-2 dark:border-white/25 w-full lg:w-2/4 font-bold">
                    Company Information
                </div>
                <div class="mt-3 mb-12">
                    <div>
                        <BreezeLabel for="name" value="Company name" />
                        <BreezeInput id="name"
                            v-on:blur="form.companyname != companyinfo.companyname ? form.post(route('configurations.store', 'companyinfo'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="form.companyname" />
                    </div>

                    <div class="mt-5">
                        <BreezeLabel for="year" value="Year established" />
                        <BreezeInput id="year"
                            v-on:blur="form.yearestablished != companyinfo.yearestablished ? form.post(route('configurations.store', 'companyinfo'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="form.yearestablished" />
                    </div>

                    <div class="hidden">
                        <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">Save</BreezeButton>
                    </div>
                </div>

                <!-- Contact Information -->
                <div
                    class="text-black/80 dark:text-white/80 uppercase pb-1 text-xs flex border-b-2 dark:border-white/25 w-full lg:w-2/4 font-bold">
                    Contact Information
                </div>
                <div class="mt-3 mb-12">
                    <div>
                        <BreezeLabel for="phonenumber" value="Phone number" />
                        <BreezeInput id="phonenumber"
                            v-on:blur="contactsform.phonenumber != contactinfo.phonenumber ? contactsform.post(route('configurations.store', 'contacts'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="contactsform.phonenumber" />
                    </div>

                    <div class="mt-5">
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput id="email"
                            v-on:blur="contactsform.email != contactinfo.email ? contactsform.post(route('configurations.store', 'contacts'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="contactsform.email" />
                    </div>

                    <div class="mt-5">
                        <BreezeLabel for="address" value="Address" />
                        <BreezeInput id="address"
                            v-on:blur="contactsform.address != contactinfo.address ? contactsform.post(route('configurations.store', 'contacts'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="contactsform.address" />
                    </div>
                </div>

                <!-- Socials -->
                <div
                    class="text-black/80 dark:text-white/80 uppercase pb-1 text-xs flex border-b-2 dark:border-white/25 w-full lg:w-2/4 font-bold">
                    Social Media Accounts
                </div>
                <div class="mt-3 mb-12">
                    <div>
                        <BreezeLabel for="facebook" value="Facebook" />
                        <BreezeInput id="facebook"
                            v-on:blur="socialsform.facebook != socials.facebook ? socialsform.post(route('configurations.store', 'socials'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="socialsform.facebook" />
                    </div>

                    <div class="mt-5">
                        <BreezeLabel for="twitter" value="Twitter" />
                        <BreezeInput id="twitter"
                            v-on:blur="socialsform.twitter != socials.twitter ? socialsform.post(route('configurations.store', 'socials'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="socialsform.twitter" />
                    </div>

                    <div class="mt-5">
                        <BreezeLabel for="instagram" value="Instagram" />
                        <BreezeInput id="instagram"
                            v-on:blur="socialsform.instagram != socials.instagram ? socialsform.post(route('configurations.store', 'socials'), {preserveScroll: true}) : ''"
                            type="text" class="mt-1 block w-full lg:w-2/4" v-model="socialsform.instagram" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeButton from '@/Components/Button.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Tabs from '@/Components/Tabs.vue';

export default {
    components: {
        BreezeInput,
        BreezeLabel,
        BreezeButton,
        Head,
        Tabs
    },
    props: {
        config: Object,
        companyinfo: Object,
        contactinfo: Object,
        socials: Object,
    },
    setup(props) {
        const form = useForm({
            companyname: props.companyinfo.companyname,
            yearestablished: props.companyinfo.yearestablished ?? '',
        })

        const contactsform = useForm({
            phonenumber: props.contactinfo.phonenumber ?? '',
            email: props.contactinfo.email ?? '',
            address: props.contactinfo.address ?? '',
        })

        const socialsform = useForm({
            facebook: props.socials.facebook ?? '',
            twitter: props.socials.twitter ?? '',
            instagram: props.socials.instagram ?? '',
        })

        return { form, contactsform, socialsform }
    }
}
</script>