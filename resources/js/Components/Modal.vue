<template>
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="show" class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.show = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <slot />
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="show" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>

<script>
export default {
    props: {

    },
    data() {
        return {
            show: false,
        }
    },
}

</script>