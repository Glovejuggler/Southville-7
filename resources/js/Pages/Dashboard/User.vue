<template>

    <Head>
        <title>
            {{ self.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    {{ self.name }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 lg:flex">
            <div class="p-2 lg:w-1/2 w-full">
                <div class="bg-white rounded-lg p-6">
                    <span class="font-bold block mb-5">Savings</span>
                    <span class="font-bold text-5xl">₱ {{ self.savings }}</span>
                </div>
            </div>
            <div class="p-2 lg:w-1/2 w-full">
                <div class="bg-white rounded-lg p-6">
                    <span class="font-bold block mb-5">Share capital</span>
                    <span class="font-bold text-5xl">₱ 0</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head, Link
    },
    props: {
        self: Object
    },
}
</script>