<template>
    <div>
        <slot></slot>
    </div>
    <div v-if="loading" class="mt-4 pb-8 text-center">
        <i class="bx bx-loader-alt animate-spin text-3xl text-theme-800"></i>
    </div>
</template>

<script>
import debounce from 'lodash/debounce';

export default {
    props: {
        loadMore: Function
    },
    data() {
        return {
            loading: false
        }
    },
    mounted() {
        window.addEventListener('scroll', debounce((e) => {
            let pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - (window.innerHeight ?? screen.height);

            if (pixelsFromBottom < 200 && !this.loading) {
                this.loading = true;
                this.loadMore().finally(() => this.loading = false);
            }
        }, 100))
    }
}
</script>