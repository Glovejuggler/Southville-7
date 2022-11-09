<template>
    <div v-if="links.length > 3" class="text-xs">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label" />
                <Link v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm dark:text-white/90 leading-4 border rounded focus:border-gray-500"
                    :class="{ 'bg-theme-800 dark:bg-white/70 text-white dark:text-black': link.active }"
                    :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link
    },
    props: {
        links: Array
    },
}
</script>