<template>
    <div class="rounded-full h-6 w-10 flex p-1 cursor-pointer transition duration-300 ease-in-out"
        @click="toggleButton(); $emit('update:modelValue', state)"
        :class="state ? 'bg-gray-900 dark:bg-blue-300' : 'bg-black/25 dark:bg-white/25'">
        <div class="rounded-full h-4 w-4 bg-white dark:bg-zinc-900 duration-300 ease-in-out"
            :class="state ? 'translate-x-full' : ''">
            <input type="checkbox" :name="name" :id="id" :value="modelValue" :checked="state" class="hidden"
                v-on:change="$emit('update:modelValue', state)" ref="input" />
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
export default {
    data() {
        return {
            state: false,
        }
    },
    props: ['name', 'id', 'modelValue'],
    emits: ['update:modelValue'],
    methods: {
        toggleButton: function () {
            this.state = !this.state;
        }
    },
    setup() {
        const input = ref(null);
    },
    mounted() {
        this.state = this.modelValue;
    },
}
</script>