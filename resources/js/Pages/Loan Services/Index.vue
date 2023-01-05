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
            <InfiniteScroll :loadMore="loadMoreLoanables">
                <div class="flex flex-col space-y-3">
                    <Link :href="route('loanables.edit', loanable)" v-for="loanable in visibleLoanables.data"
                        class="p-3 rounded-lg border border-transparent bg-white hover:border-theme-800 active:border-theme-800">
                    <span class="text-theme-800 font-semibold">{{ loanable.name }}</span>
                    <div class="flex flex-col">
                        <div class="text-sm text-black/75">{{ loanable.type }}</div>
                        <div class="text-sm text-black/75">Required share capital: {{ loanable.requirement }}</div>
                    </div>
                    </Link>
                </div>
            </InfiniteScroll>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visibleLoanables: this.loanables
        }
    },
    props: {
        loanables: Object,
    },
    methods: {
        loadMoreLoanables() {
            if (!this.visibleLoanables.next_page_url) {
                return Promise.resolve();
            }

            return axios.get(this.visibleLoanables.next_page_url).then(response => {
                this.visibleLoanables = {
                    ...response.data,
                    data: [...this.visibleLoanables.data, ...response.data.data]
                }
            });
        }
    }
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import InfiniteScroll from '@/Components/InfiniteScroll.vue';
</script>