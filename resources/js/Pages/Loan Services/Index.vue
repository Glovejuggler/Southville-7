<template>

    <Head>
        <title>
            Loan Services
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Loan Services
                </h2>
                <Link as="button" :href="route('loanables.create')" class="inline-flex cursor-pointer
                        items-center px-4 py-2 bg-theme-800 dark:bg-white/90 dark:text-zinc-800
                        border border-transparent rounded-md 
                        font-semibold text-xs text-white uppercase
                        tracking-widest hover:bg-theme-700 active:bg-theme-900
                        focus:outline-none focus:border-theme-900
                        focus:shadow-outline-gray transition ease-in-out duration-150 leading-none">
                Add
                </Link>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-0">
                    <table class="table-fixed w-full text-sm whitespace-nowrap">
                        <thead>
                            <tr class="uppercase text-left dark:text-white/80">
                                <th class="px-3">Item name</th>
                                <th class="px-3">Type</th>
                                <th class="px-3">Required savings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="loanable in loanables.data"
                                class="hover:bg-neutral-200 dark:hover:bg-white/10 group dark:text-white/90">
                                <td class="rounded-l-lg">
                                    <Link class="flex p-3" :href="route('loanables.edit', loanable)">
                                    {{ loanable.name }}
                                    </Link>
                                </td>
                                <td>
                                    <Link class="flex p-3" :href="route('loanables.edit', loanable)">
                                    {{ loanable.type }}
                                    </Link>
                                </td>
                                <td class="rounded-r-lg">
                                    <Link class="flex p-3" :href="route('loanables.edit', loanable)">
                                    {{ loanable.requirement }}
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="loanables.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        loanables: Object,
    }
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
</script>