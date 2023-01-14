<template>
    <div class="flex justify-evenly mb-5 border-b-2 bg-white dark:border-white/25 md:px-3 ease-in-out duration-500">
        <Link :href="route('members.show', member)"
            class="py-3 px-5 cursor-pointer hover:text-theme-900 hover:transition-none dark:hover:text-white/90 font-semibold text-sm ease-in-out duration-500"
            :class="{ 'border-b-4 border-theme-900 dark:border-gray-300 text-theme-900 dark:text-white/90': $page.component == 'Members/Show', 'text-black/60 dark:text-white/50': $page.component !== 'Members/Show' }"
            preserve-scroll>
        Member Information
        </Link>

        <Link :href="route('savings.create', member)"
            v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Treasurer'].includes(r))"
            class="py-3 px-5 cursor-pointer hover:text-theme-900 hover:transition-none dark:hover:text-white/90 font-semibold text-sm ease-in-out duration-500"
            :class="{ 'border-b-4 border-theme-900 dark:border-gray-300 text-theme-900 dark:text-white/90': $page.component == 'Savings/Create', 'text-black/60 dark:text-white/50': $page.component !== 'Savings/Create' }"
            preserve-scroll>
        Savings
        </Link>

        <Link :href="route('share.capital', member)"
            v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Treasurer'].includes(r))"
            class="py-3 px-5 cursor-pointer hover:text-theme-900 hover:transition-none dark:hover:text-white/90 font-semibold text-sm ease-in-out duration-500"
            :class="{ 'border-b-4 border-theme-900 dark:border-gray-300 text-theme-900 dark:text-white/90': $page.component == 'Share Capital/Create', 'text-black/60 dark:text-white/50': $page.component !== 'Share Capital/Create' }"
            preserve-scroll>
        Share Capital
        </Link>

        <Link :href="route('loans.create', member)"
            v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Treasurer'].includes(r))"
            class="py-3 px-5 cursor-pointer hover:text-theme-900 hover:transition-none dark:hover:text-white/90 font-semibold text-sm ease-in-out duration-500"
            :class="{ 'border-b-4 border-theme-900 dark:border-gray-300 text-theme-900 dark:text-white/90': $page.component == 'Loan/Create', 'text-black/60 dark:text-white/50': $page.component !== 'Loan/Create' }"
            preserve-scroll>
        Loan
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    },
    props: {
        member: Object,
    },
}
</script>