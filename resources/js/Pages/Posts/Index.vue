<template>

    <Head>
        <title>
            Posts
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Posts
                </h2>
                <Link as="button" :href="route('post.create')" class="inline-flex cursor-pointer
                        items-center px-4 py-2 bg-theme-800 dark:bg-white/90 dark:text-zinc-800
                        border border-transparent rounded-md 
                        font-semibold text-xs text-white uppercase
                        tracking-widest hover:bg-theme-700 active:bg-theme-900
                        focus:outline-none focus:border-theme-900
                        focus:shadow-outline-gray transition ease-in-out duration-150 leading-none">
                New Post
                </Link>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <span v-if="!visiblePosts.data.length" class="italic">No posts published yet. Create one through the "New
                Post"
                button</span>

            <InfiniteScroll :loadMore="loadMorePosts">
                <Link class="overflow-hidden shadow-sm rounded-lg" v-for="post in visiblePosts.data"
                    :href="route('post.edit', post)">
                <div
                    class="p-6 mb-4 bg-white hover:border-theme-900/50 dark:bg-zinc-900 border border-transparent rounded-lg group">
                    <div class="flex flex-col">
                        <span class="font-bold">
                            {{ post.title }}
                            <span class="font-normal ml-5 text-xs opacity-70">{{
                                format_dateMDY(post.created_at)
                            }}</span>
                        </span>
                        <span class="text-sm block text-justify line-clamp-3">{{ post.content }}</span>
                    </div>
                </div>
                </Link>
            </InfiniteScroll>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visiblePosts: this.posts
        }
    },
    props: {
        posts: Object
    },
    methods: {
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('MMMM D, YYYY')
            }
        },
        loadMorePosts() {
            if (!this.visiblePosts.next_page_url) {
                return Promise.resolve();
            }

            return axios.get(this.visiblePosts.next_page_url).then(response => {
                this.visiblePosts = {
                    ...response.data,
                    data: [...this.visiblePosts.data, ...response.data.data]
                }
            });
        }
    },
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import moment from 'moment';
import axios from 'axios';
import InfiniteScroll from '@/Components/InfiniteScroll.vue';
</script>