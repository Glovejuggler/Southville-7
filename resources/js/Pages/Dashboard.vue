<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head>
        <title>
            Dashboard
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                Dashboard
            </h2>
        </div>
    </div>

    <div class="lg:flex mt-12 max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
        <Link class="w-1/4" :href="route('members.index')">
        <div class="max-w-7xl mx-auto p-3 lg:p-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="px-6 pt-6 dark:bg-zinc-900
                        hover:bg-neutral-200 transition ease-in-out duration-300">
                    <div class="text-theme-900 font-bold">
                        Members
                    </div>
                    <div class="grid place-items-end">
                        <span class="text-[64px] text-theme-900 font-extrabold">{{ members }}</span>
                    </div>
                </div>
            </div>
        </div>
        </Link>

        <Link class="w-1/4" href="/members?status=active">
        <div class="max-w-7xl mx-auto p-3 lg:p-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="px-6 pt-6 dark:bg-zinc-900
                        hover:bg-neutral-200 transition ease-in-out duration-300">
                    <div class="text-theme-900 font-bold">
                        Active loans
                    </div>
                    <div class="grid place-items-end">
                        <span class="text-[64px] text-theme-900 font-extrabold">{{ active_loans }}</span>
                    </div>
                </div>
            </div>
        </div>
        </Link>

        <Link class="w-1/4" href="/members?status=overdue">
        <div class="max-w-7xl mx-auto p-3 lg:p-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="px-6 pt-6 dark:bg-zinc-900
                        hover:bg-neutral-200 transition ease-in-out duration-300">
                    <div class="text-theme-900 font-bold">
                        Overdue payments
                    </div>
                    <div class="grid place-items-end">
                        <span class="text-[64px] text-theme-900 font-extrabold">{{ overdue_payments }}</span>
                    </div>
                </div>
            </div>
        </div>
        </Link>

        <Link class="w-1/4" href="/members?status=dueToday">
        <div class="max-w-7xl mx-auto p-3 lg:p-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="px-6 pt-6 dark:bg-zinc-900
                        hover:bg-neutral-200 transition ease-in-out duration-300">
                    <div class="text-theme-900 font-bold">
                        Payments due today
                    </div>
                    <div class="grid place-items-end">
                        <span class="text-[64px] text-theme-900 font-extrabold">{{ due_payments }}</span>
                    </div>
                </div>
            </div>
        </div>
        </Link>
    </div>
</template>

<script>
export default {
    props: {
        auth: Object,
        members: Number,
        active_loans: Number,
        overdue_payments: Number,
        due_payments: Number,
    },
}
</script>