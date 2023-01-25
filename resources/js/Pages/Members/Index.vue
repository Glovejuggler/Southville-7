<template>

    <Head>
        <title>
            Members
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Members
                </h2>
                <Link v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
                    as="button" :href="route('members.create')" class="inline-flex cursor-pointer
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

    <div class="pt-6">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 lg:flex justify-between">
            <BreezeInput v-model="form.search" class="mt-1 block lg:w-96 w-full" type="text" placeholder="Search..." />
            <div class="flex items-center lg:flex-row flex-col-reverse lg:space-x-2 space-x-0">
                <a target="_blank" type="button" v-if="visibleMembers.data.length"
                    :href="route('members.pdf', [filters])"
                    class="h-min px-4 py-2 text-xs rounded-lg bg-theme-600 hover:bg-theme-700 active:bg-theme-900 text-white inline-flex items-center justify-center lg:mt-0 mt-2 w-full">
                    Download
                    as
                    PDF</a>
                <div class="flex flex-col lg:flex-row lg:space-y-0 space-y-2 lg:space-x-2 space-x-0 w-full lg:w-auto">
                    <select id="status" v-model="form.status"
                        class="block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-auto">
                        <option value="">All</option>
                        <option value="active">Active loans</option>
                        <option value="inactive">No active loans</option>
                        <option value="overdue">Overdue payments</option>
                        <option value="dueToday">Payments due today</option>
                    </select>
                    <select id="sortBy" v-model="form.sortBy"
                        class="block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-auto">
                        <option value="">Oldest first</option>
                        <option value="dateAddedDesc">Newest first</option>
                        <option value="nameAsc">Name, A-Z</option>
                        <option value="nameDesc">Name, Z-A</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <InfiniteScroll :loadMore="loadMoreMembers">
        <div class="py-4">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 lg:grid lg:gap-2 flex flex-col"
                :class="{ 'grid-cols-2': visibleMembers.data.length > 1 }">
                <Link :href="route('members.show', member.id)"
                    class="bg-white rounded-lg border border-transparent hover:border-theme-800 p-3 mb-2 flex justify-between"
                    v-for="member in visibleMembers.data">
                <div>{{ member.name }}</div>
                <div>
                    <span v-if="member.loan"
                        class="px-2 inline-flex rounded-lg text-xs bg-green-200 text-green-800 dark:bg-transparent dark:border-green-500 dark:border dark:text-green-500">
                        Active</span>
                    <span v-if="member.loan?.has_late_payment"
                        class="text-red-800 rounded-full text-xs inline-flex mx-1 px-2 bg-red-200 place-items-center dark:border dark:border-red-500 dark:text-red-500 dark:bg-transparent">
                        {{ member.loan?.has_late_payment }}
                    </span>
                    <span v-if="member.loan" class="text-xs inline-flex items-center ml-1">
                        Balance: {{ member.loan.balance }}
                    </span>
                </div>
                </Link>
            </div>
        </div>
    </InfiniteScroll>
</template>

<script>
export default {
    props: {
        filters: Object,
        members: Object
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                status: this.filters.status ?? "",
                sortBy: this.filters.sortBy ?? "",
            },
            visibleMembers: this.members,
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/members', pickBy(this.form), {
                    preserveState: true,
                    preserveScroll: true,
                    replace: true,
                    onFinish: () => this.visibleMembers = this.members,
                });
            }, 150),
        }
    },
    methods: {
        loadMoreMembers() {
            if (!this.visibleMembers.next_page_url) {
                return Promise.resolve();
            }

            return axios.get(this.visibleMembers.next_page_url).then(response => {
                this.visibleMembers = {
                    ...response.data,
                    data: [...this.visibleMembers.data, ...response.data.data]
                }
            });
        }
    },
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import throttle from 'lodash/throttle';
import pickBy from 'lodash/pickBy';
import axios from 'axios';
import InfiniteScroll from '@/Components/InfiniteScroll.vue';
</script>