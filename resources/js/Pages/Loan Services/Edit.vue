<template>

    <Head>
        <title>
            {{ loanable.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    {{ loanable.name }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.put(route('loanables.update', loanable.id))">
                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput autofocus id="name" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.name" />
                            <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="type" value="Type" />
                            <select v-model="form.type" id="type"
                                class="block rounded-lg dark:bg-zinc-900 dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30
                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-96">
                                <option value="" disabled hidden selected>Select one</option>
                                <option value="Cash">Cash</option>
                                <option value="Goods">Goods</option>
                            </select>
                            <div v-if="errors.type" class="text-red-600">{{ errors.type }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="equivalent" value="Equivalent amount" />
                            <BreezeInput id="equivalent" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.equivalent" />
                            <div v-if="errors.equivalent" class="text-red-600">{{ errors.equivalent }}</div>
                        </div>

                        <div class="mt-5">
                            <BreezeLabel for="requirement" value="Required share capital" />
                            <BreezeInput id="requirement" type="text" class="mt-1 block w-full lg:w-96"
                                v-model="form.requirement" />
                            <div v-if="errors.requirement" class="text-red-600">{{ errors.requirement }}</div>
                        </div>

                        <div class="flex">
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Save</BreezeButton>
                            <button type="button" @click.self="showDeleteModal = true"
                                class="mt-4 ml-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray transition ease-in-out duration-150">delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete post modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showDeleteModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showDeleteModal = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <div>
                        <span class="font-bold text-lg block mb-2">Confirmation</span>
                        <span class="font-normal text-sm">Are you really sure you want to delete this loan
                            service?</span>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button class="mx-2 text-sm hover:underline"
                            @click="this.showDeleteModal = false">Cancel</button>
                        <Link as="button" :href="route('loanables.destroy', loanable)" method="delete"
                            class="mx-2 p-3 bg-red-600 hover:bg-red-700 active:bg-red-900 text-white text-sm rounded-lg">
                        Delete</Link>
                    </div>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showDeleteModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>


<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';

export default {
    data() {
        return {
            showDeleteModal: false,
        }
    },
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Link
    },
    setup(props) {
        const form = useForm({
            name: props.loanable.name,
            type: props.loanable.type,
            equivalent: props.loanable.equivalent,
            requirement: props.loanable.requirement,
        })

        return { form }
    },
    props: {
        errors: Object,
        loanable: Object,
    },
}
</script>