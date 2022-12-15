<template>

    <Head>
        <title>
            {{ event ? event.title : 'New Post' }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    {{ event ? event.title : 'New Post' }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.post(route('post.store'))">
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
                            <div v-if="errors.content" class="text-red-600">{{ errors.content }}</div>
                        </div>

                        <div class="mt-5 w-full lg:w-1/2">
                            <label class="flex">
                                <span class="sr-only">Choose files</span>
                                <input type="file" name="file" accept="image/*" @input="form.file = $event.target.files"
                                    class="block w-full text-sm text-slate-500 dark:text-white/70
                                                                                    file:mr-4 file:py-2 file:px-4
                                                                                    file:rounded-full file:border-0
                                                                                    file:text-sm file:font-semibold
                                                                                    file:bg-gray-50 file:text-gray-700 dark:file:text-white/70 dark:file:bg-zinc-600
                                                                                    hover:file:bg-gray-100
                                                                                    " multiple />
                            </label>
                        </div>

                        <div class="lg:flex">
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Post
                            </BreezeButton>
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
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Link
    },
    setup(props) {
        const form = useForm({
            title: props.event?.title,
            content: props.event?.content,
            event_id: props.event?.id,
            file: [],
        })

        return { form }
    },
    props: {
        errors: Object,
        event: Object
    }
}
</script>