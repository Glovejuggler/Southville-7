<template>

    <Head>
        <title>
            Configurations
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow ease-in-out duration-500">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white/90 my-auto ease-in-out duration-500">
                Configurations
            </h2>
        </div>
    </div>

    <div class="lg:flex pt-12 max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg w-full ease-in-out duration-500">
            <div class="p-6 bg-white dark:bg-zinc-900 ease-in-out duration-500">
                <Tabs />

                <!-- Main Content -->
                <div class="pt-5 pb-10 text-xl dark:text-white ease-in-out duration-500">
                    Theme Settings
                </div>

                <!-- Home Page -->
                <div
                    class="text-black/80 dark:text-white/80 uppercase pb-1 text-xs flex border-b-2 dark:border-white/25 w-full lg:w-2/4 font-bold ease-in-out duration-500">
                    Dark Mode
                </div>
                <div class="mt-3 mb-12">
                    <div class="flex justify-between items-center w-full lg:w-2/4 my-4">
                        <label
                            class="block font-medium text-md text-gray-700 dark:text-white/70 ease-in-out duration-500"
                            for="darkMode">Enable
                            dark mode</label>
                        <Toggle id="darkMode" name="darkMode" v-model="form.darkMode"
                            @update:model-value="form.post(route('configurations.store', 'darkMode'),{preserveScroll: true})" />
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
        darkMode: String,
    },
    setup(props) {
        const form = useForm({
            darkMode: props.darkMode === '1' ? true : false,
        })

        return { form }
    }
}
</script>