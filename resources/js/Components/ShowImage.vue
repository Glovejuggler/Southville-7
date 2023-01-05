<template>
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showModal" class="overflow-auto fixed inset-0 z-50 h-screen justify-center items-center flex"
                @click.self="showModal = false">
                <div class="relative">
                    <!--body-->
                    <div class="relative">
                        <img :src="`/${shownImage}`" alt=""
                            class="relative max-w-[90vw] lg:max-w-4xl max-h-[80vh] object-contain bg-white">
                    </div>
                    <a v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
                        :href="route('file.download', fileId)"
                        class="flex text-gray-300 hover:text-white hover:underline font-semibold cursor-pointer">
                        Download
                    </a>
                </div>
            </div>
        </Transition>
        <div v-if="showModal" class="fixed right-0.5 top-0.5 z-[60]">
            <button class="bg-white rounded-full inline-flex p-1 m-4 hover:opacity-90" @click="toggleModal()"><i
                    class="bx bx-x text-black text-3xl leading-none"></i></button>
        </div>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showModal" class="fixed inset-0 z-40 bg-black/75 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>

<script>
export default {
    name: "show-image",
    data() {
        return {
            showModal: false,
            shownImage: '',
            fileId: ''
        }
    },
    methods: {
        toggleModal: function (value, fileId) {
            this.showModal = !this.showModal;
            if (value) {
                this.shownImage = value;
                this.fileId = fileId;
            }
        }
    },
    created() {
        window.addEventListener('keydown', (e) => {
            if (e.key == 'Escape') {
                this.showModal = false;
            }
        });
    },
    watch: {
        showModal() {
            document.body.style.overflow = this.showModal === true ? 'hidden' : 'auto';
            document.body.style.height = this.showModal === true ? '100vh' : 'auto';
            document.body.style.paddingRight = this.showModal === true ? '0px' : '0px';
        }
    }
}
</script>