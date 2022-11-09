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
                    Pages Settings
                </div>

                <!-- Home Page -->
                <div
                    class="text-black/80 dark:text-white/80 uppercase pb-1 text-xs flex border-b-2 dark:border-white/25 w-full lg:w-2/4 font-bold">
                    Home page
                </div>
                <div class="mt-3 mb-12">
                    <div class="flex justify-between items-center w-full lg:w-2/4 my-4">
                        <label class="block font-medium text-md text-gray-700 dark:text-white/70" for="showreviews">Show
                            reviews</label>
                        <Toggle id="showreviews" name="showreviews" v-model="show.showreviews"
                            @update:model-value="show.post(route('configurations.store', 'showreviews'),{preserveScroll: true})" />
                    </div>
                </div>

                <!-- About Us -->
                <div
                    class="text-black/80 dark:text-white/80 uppercase pb-1 text-xs flex border-b-2 dark:border-white/25 w-full lg:w-2/4 font-bold">
                    about us page
                </div>
                <div class="mt-3 mb-12">
                    <div>
                        <BreezeLabel for="aboutus" value="About the company" />
                        <textarea id="aboutus" cols="30" rows="10" style="resize: none"
                            v-on:blur="form.aboutus != aboutus ? form.post(route('configurations.store', 'aboutus'), {preserveScroll: true}) : ''"
                            type="text"
                            class="mt-1 block w-full lg:w-2/4 rounded-lg text-sm text-gray-700 dark:text-white/80 dark:bg-zinc-900 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm"
                            v-model="form.aboutus" />
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
import Toggle from '@/Components/Toggle.vue';

export default {
    components: {
        BreezeInput,
        BreezeLabel,
        BreezeButton,
        Head,
        Tabs,
        Toggle
    },
    props: {
        config: Object,
        aboutus: String,
        showreviews: String,
    },
    setup(props) {
        const form = useForm({
            aboutus: props.aboutus ?? '',
        })

        const show = useForm({
            showreviews: props.showreviews === '1' ? true : false,
        })

        return { form, show }
    }
}
</script>