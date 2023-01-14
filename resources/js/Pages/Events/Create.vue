<template>

    <Head>
        <title>
            New Event
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    New Event
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.post(route('events.store'))">
                        <div>
                            <BreezeLabel for="title" value="Title" />
                            <BreezeInput autofocus id="title" type="text" class="mt-1 block w-full lg:w-1/2"
                                v-model="form.title" />
                            <div v-if="errors.title" class="text-red-600">{{ errors.title }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="content" value="Content" />
                            <textarea name="content" v-model="form.content" id="content" cols="30" rows="10"
                                class="mt-1 block w-full lg:w-1/2 rounded-lg dark:bg-zinc-900 text-sm text-gray-700 dark:text-white/70 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm"
                                style="resize: none;"></textarea>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="date" value="Date" />
                            <BreezeInput id="date" type="date" class="mt-1 block w-full lg:w-1/2" v-model="form.date" />
                            <div v-if="errors.date" class="text-red-600">{{ errors.date }}</div>
                        </div>

                        <div>
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Add</BreezeButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
    },
    setup() {
        const form = useForm({
            title: '',
            content: '',
            date: '',
        })

        return { form }
    },
    props: {
        errors: Object
    }
}
</script>