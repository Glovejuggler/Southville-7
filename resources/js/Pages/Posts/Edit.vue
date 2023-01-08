<template>

    <Head>
        <title>
            {{ post.title }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                    {{ post.title }}
                </h2>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.put(route('post.update', post))">
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

                        <!-- Pictures -->
                        <div class="mt-5 lg:w-1/2 w-full">
                            <div class="font-semibold text-sm">Photos</div>
                            <div class="grid gap-2 grid-cols-2 lg:grid-cols-4 mt-2">
                                <div v-for="pic in pics" class="cursor-pointer
                                                [&>div>div:nth-child(3)]:hover:z-30
                                                [&>div>div:nth-child(3)]:hover:delay-500
                                                [&>div>div:nth-child(3)]:hover:translate-x-0
                                                [&>div>img]:hover:scale-125
                                                [&>div>img]:hover:opacity-75
                                                rounded-lg">
                                    <div class="relative h-48 rounded-lg overflow-hidden content-center">
                                        <img :src="`../../${pic.path}`" @contextmenu.prevent=""
                                            class="z-20 absolute h-full w-full bg-white object-cover rounded-lg ease-in-out duration-300"
                                            @click.self="toggleModal(pic.path, pic.id)">
                                        <div class="z-10 absolute bg-black w-full h-full">
                                        </div>
                                        <div class="absolute z-0 grid w-full h-full translate-x-1/4 ease-in-out duration-300"
                                            @click.self="toggleModal(pic.path, pic.id)">
                                            <Link class="uppercase text-white font-bold place-self-end
                                                            inline-flex p-3 bg-red-600 hover:bg-red-500
                                                            rounded-full m-3" :href="route('photo.destroy', pic.id)"
                                                method="delete" as="button" preserve-scroll>
                                            <i class="bx bx-trash text-lg leading-none"></i></Link>
                                        </div>
                                    </div>
                                </div>
                                <div class="rounded-lg h-48 bg-blue-50 border-blue-500 border border-dashed flex justify-center items-center cursor-pointer text-4xl hover:text-5xl duration-200 ease-in-out"
                                    @click="showAddPhotoModal = !showAddPhotoModal">
                                    <i class="bx bx-plus text-blue-500"></i>
                                </div>
                            </div>
                        </div>

                        <div class="lg:flex">
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Save
                            </BreezeButton>

                            <button type="button" @click.self="toggleDeleteModal"
                                class="mt-4 ml-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray transition ease-in-out duration-150">delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo modal -->
    <ShowImage ref="showImageModal" />

    <!-- Add photo modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showAddPhotoModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showAddPhotoModal = false">
                <div class="relative bg-white dark:bg-zinc-900 w-full lg:w-[40vw] h-auto max-h-[80%] p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <span class="font-semibold">Add photos</span>
                        <button class="inline-flex rounded-full hover:bg-black/20 dark:hover:bg-white/20"
                            @click="this.showAddPhotoModal = false"><i
                                class="bx bx-x text-[25px] text-black/60 dark:text-white/60"></i></button>
                    </div>
                    <form @submit.prevent="submitFile">
                        <label class="flex">
                            <span class="sr-only">Choose files</span>
                            <input @change="update" type="file" name="file" accept="image/*"
                                @input="fileform.file = $event.target.files" class="block w-full text-sm text-slate-500 dark:text-white/70
                                                    file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0
                                                    file:text-sm file:font-semibold
                                                    file:bg-gray-50 file:text-gray-700 dark:file:text-white/70 dark:file:bg-zinc-600
                                                    hover:file:bg-gray-100
                                                    " multiple />
                        </label>
                        <div v-if="images.length" class="pt-3 grid gap-2 lg:max-h-[50vh] max-h-[80vh] overflow-y-auto"
                            :class="{ 'grid-cols-2': images.length > 1, 'grid-cols-4': images.length > 3 }">
                            <div class="relative" v-for="(item, index) in images" :key="index">
                                <button type="button" @click="removeImage(index)"
                                    class="inline-flex bg-black/75 m-1 absolute top-0 left-0 text-white hover:bg-black rounded-full text-xl"><i
                                        class="bx bx-x"></i></button>
                                <img :src="item.url" alt="" class="rounded-lg object-cover h-48 w-full">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button v-if="fileform.file.length" :disabled="fileform.processing"
                                :class="{ 'opacity-50': fileform.processing }" type="submit"
                                class="text-sm uppercase rounded-lg text-white font-semibold bg-theme-800 px-3 py-2 mt-3">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showAddPhotoModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
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
                        <span class="font-normal text-sm">Are you really sure you want to delete this post?</span>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button class="mx-2 text-sm hover:underline"
                            @click="this.showDeleteModal = false">Cancel</button>
                        <Link as="button" :href="route('post.destroy', post)" method="delete"
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
import ShowImage from '@/Components/ShowImage.vue';

export default {
    data() {
        return {
            showDeleteModal: false,
            showAddPhotoModal: false,
            images: []
        }
    },
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        Link,
        ShowImage
    },
    setup(props) {
        const form = useForm({
            title: props.post.title,
            content: props.post.content,
        })

        const fileform = useForm({
            file: [],
            post_id: props.post.id,
        })

        function submitFile() {
            fileform.post('/photo', {
                preserveScroll: true,
                preserveState: false,
                onSuccess: () => this.showAddPhotoModal = false,
            });
        }

        return { form, fileform, submitFile }
    },
    props: {
        errors: Object,
        post: Object,
        pics: Object,
    },
    methods: {
        toggleModal(value, fileId) {
            this.$refs.showImageModal.toggleModal(value, fileId);
        },
        toggleDeleteModal() {
            this.showDeleteModal = true;
        },
        update() {
            this.images.splice(0, this.images.length);
            Array.from(this.fileform.file).forEach((image) => {
                let reader = new FileReader();
                reader.readAsDataURL(image);

                reader.onload = (e) => {
                    this.images.push({
                        url: e.target.result

                    });
                }
            });
        },
        removeImage(index) {
            const filelist = [...this.fileform.file];
            this.images.splice(index, 1);
            filelist.splice(index, 1);
            this.fileform.file = filelist;
        }

    }
}
</script>