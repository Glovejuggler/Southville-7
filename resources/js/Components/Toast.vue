<script setup>
import { onMounted } from 'vue';
const props = defineProps({
    message: String,
    type: String
})

const emit = defineEmits(['remove'])

onMounted(() => {
    setTimeout(() => emit("remove"), 3000);
})
</script>

<template>
    <div v-if="message && type"
        class="font-semibold text-sm shadow-md py-2 px-4 rounded-lg flex justify-between items-center"
        :class="{ 'bg-green-600 text-white': type === 'success', 'bg-red-600 text-white': type === 'error' }">
        <div>
            {{ `${message}` }}
        </div>
        <button @click="emit('remove')">
            <i class="bx bx-x text-lg inline-flex rounded-full hover:bg-black/10 w-max h-max"></i>
        </button>
    </div>
</template>