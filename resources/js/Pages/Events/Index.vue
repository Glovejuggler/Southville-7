<template>

    <Head>
        <title>
            Events
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Events
                </h2>
                <Link as="button" :href="route('events.create')" class="inline-flex cursor-pointer
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
            <InfiniteScroll :loadMore="loadMoreEvents" v-if="visibleEvents.data.length">
                <div class="flex flex-col space-y-3">
                    <Link v-for="event in visibleEvents.data" :href="route('events.edit', event)"
                        class="bg-white rounded-lg p-3 border border-transparent hover:border-theme-800 active:border-theme-800">
                    <span class="font-semibold text-theme-800">{{ event.title }}</span>
                    <div class="flex lg:flex-row lg:justify-between lg:w-1/4 flex-col">
                        <div class="text-sm">{{ format_dateMDY(event.date) }}</div>
                        <div class="text-sm">{{ event.status }}</div>
                    </div>
                    </Link>
                </div>
            </InfiniteScroll>
            <div v-if="!visibleEvents.data.length" class="italic">Create new event using the Add button</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visibleEvents: this.events
        }
    },
    props: {
        events: Object,
    },
    methods: {
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('MMMM D, YYYY')
            }
        },
        loadMoreEvents() {
            if (!this.visibleEvents.next_page_url) {
                return Promise.resolve();
            }

            return axios.get(this.visibleEvents.next_page_url).then(response => {
                this.visibleEvents = {
                    ...response.data,
                    data: [...this.visibleEvents.data, ...response.data.data]
                }
            });
        }
    }
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import InfiniteScroll from '@/Components/InfiniteScroll.vue';
import moment from 'moment';
</script>