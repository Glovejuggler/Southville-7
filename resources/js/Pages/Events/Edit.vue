<template>

    <Head>
        <title>
            {{ event.title }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    {{ event.title }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.put(route('events.update', event))">
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

                        <div class="mt-5 w-1/2 lg:grid grid-cols-2 gap-2">
                            <div>
                                <BreezeLabel for="date" value="Date" />
                                <BreezeInput id="date" type="date" class="block w-full" v-model="form.date" />
                                <div v-if="errors.date" class="text-red-600">{{ errors.date }}</div>
                            </div>

                            <div>
                                <BreezeLabel for="status" value="Status" />
                                <select v-model="form.status" id="status"
                                    class="block rounded-lg dark:bg-zinc-900 dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30
                                                                                                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full">
                                    <option value="Upcoming">Upcoming</option>
                                    <option value="Done">Done</option>
                                    <option value="Hidden">Hidden</option>
                                </select>
                                <div v-if="errors.status" class="text-red-600">{{ errors.status }}</div>
                            </div>
                        </div>

                        <div class="flex space-x-2 lg:w-1/2 w-full">
                            <BreezeButton @click="form.post = false" class="mt-4"
                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save
                            </BreezeButton>
                            <BreezeButton v-if="form.status === 'Done' && hasPost === null" @click="form.post = true"
                                class="mt-4 bg-green-600 hover:bg-green-700 active:bg-green-900 focus:border-green-900"
                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save and make a
                                post</BreezeButton>
                            <Link as="button" method="delete" :href="route('events.destroy', event)"
                                class="mt-4 rounded-lg px-4 py-2 text-xs uppercase text-white border border-transparent font-semibold tracking-widest bg-red-600 hover:bg-red-700 active:bg-red-900">
                            Delete</Link>
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
import moment from 'moment';

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
            title: props.event.title,
            content: props.event.content,
            date: moment(String(props.event.date)).format('YYYY\-MM\-DD'),
            status: props.event.status,
            post: null,
        })

        return { form }
    },
    props: {
        errors: Object,
        event: Object,
        hasPost: Object
    }
}
</script>