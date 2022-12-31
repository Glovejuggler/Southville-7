<template>
    <div class="flex flex-wrap mb-5 border-b-2 dark:border-white/25 md:px-3 ease-in-out duration-500">
        <Link :href="tabItem.link" v-for="tabItem in tabItems"
            class="py-3 px-5 cursor-pointer hover:text-gray-900 hover:transition-none dark:hover:text-white/90 font-semibold text-sm ease-in-out duration-500"
            :class="{ 'border-b-4 border-gray-900 dark:border-gray-300 text-gray-900 dark:text-white/90': $page.component == tabItem.component, 'text-black/60 dark:text-white/50': $page.component !== tabItem.component }"
            preserve-scroll>
        {{ tabItem.label }}
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
        tabItems: {
            type: Array,
            default: () => [
                {
                    link: route('members.show', member.id),
                    label: 'Member information',
                    component: 'Members/Show',
                },
                {
                    link: route('loans.create'),
                    label: 'Loan',
                    component: 'Loan/Create',
                },
                {
                    link: route('savings.create'),
                    label: 'Savings',
                    component: 'Savings/Create',
                },
            ]
        },
    },
}
</script>