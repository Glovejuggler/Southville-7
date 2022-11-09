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
                <Link as="button" :href="route('clients.create')" class="inline-flex cursor-pointer
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
            <select v-model="form.status"
                class="block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-auto">
                <option value="" selected>All</option>
                <option value="active">Active loans</option>
                <option value="inactive">No active loans</option>
                <option value="overdue">Overdue payments</option>
                <option value="dueToday">Payments due today</option>
            </select>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-0">
                    <table class="table-fixed w-full text-sm whitespace-nowrap">
                        <thead>
                            <tr class="uppercase text-left dark:text-white/80">
                                <th class="px-3">Name</th>
                                <th class="px-3">Address</th>
                                <th class="px-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="client in clients.data"
                                class="hover:bg-neutral-200 dark:hover:bg-white/10 group dark:text-white/90">
                                <td class="rounded-l-lg">
                                    <Link class="flex p-3" :href="route('clients.show', client.id)">
                                    {{ client.name }}
                                    </Link>
                                </td>
                                <td>
                                    <Link class="flex p-3" :href="route('clients.show', client.id)">
                                    {{ client.address }}
                                    </Link>
                                </td>
                                <td class="rounded-r-lg">
                                    <Link class="flex p-3" :href="route('clients.show', client.id)">
                                    <span v-if="client.loan"
                                        class="px-2 inline-flex rounded-lg bg-green-200 text-green-800 dark:bg-transparent dark:border-green-500 dark:border dark:text-green-500">
                                        Active</span>
                                    <span v-if="client.loan?.has_late_payment && filters.status === 'overdue'"
                                        class="text-red-800 rounded-full inline-flex mx-1 px-2 bg-red-200 place-items-center dark:border dark:border-red-500 dark:text-red-500 dark:bg-transparent">
                                        {{ client.loan?.has_late_payment }}
                                    </span>
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="clients.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        filters: Object,
        clients: Object
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                status: this.filters.status ?? "",
            }
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('/clients', pickBy(this.form), {
                    preserveState: true,
                    preserveScroll: true,
                    replace: true
                });
            }, 150),
        }
    }
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import BreezeInput from '@/Components/Input.vue';
import { ref, watch } from "vue";
import { Inertia } from '@inertiajs/inertia';
import throttle from 'lodash/throttle';
import pickBy from 'lodash/pickBy';
</script>