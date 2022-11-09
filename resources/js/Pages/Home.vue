<script setup>
import { Link } from '@inertiajs/inertia-vue3';

document.body.style.paddingLeft = "0px";
</script>

<template>
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white h-16 flex justify-between place-items-center">
            <div>
                Home
            </div>
            <div>
                <Link :href="route('login')" as="button"
                    class="font-bold border-2 border-black p-3 hover:bg-black hover:text-white">Login</Link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    layout: null,
}
</script>

<style scoped>
body {
    transition: none;
}
</style>