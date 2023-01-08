<template>

    <Head :title="member.name" />

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                {{ member.name }}
            </h2>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900 flex flex-col space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="text-theme-800 font-bold">Beneficiaries</div>
                        <button type="button" @click="showAddModal = true"
                            class="text-xs px-3 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white active:bg-green-500 active:text-white active:translate-y-0.5">Add</button>
                    </div>
                    <div v-if="beneficiaries" v-for="(beneficiary, index) in beneficiaries" :key="index">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm font-semibold text-theme-800">{{ `Beneficiary ${index + 1}` }}</span>
                            <div>
                                <i @click="editBeneficiary(beneficiary)"
                                    class="bx bx-edit inline-flex items-center justify-center h-8 w-8 p-2 hover:bg-black/10 hover:text-green-500 rounded-full cursor-pointer"></i>
                                <i @click="deleteBeneficiaryModel = beneficiary, showDeleteModal = true"
                                    class="bx bx-trash inline-flex items-center justify-center h-8 w-8 p-2 hover:bg-black/10 hover:text-red-500 rounded-full cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 lg:w-1/2">
                            <div>Name: {{ beneficiary.name }}</div>
                            <div>Relation: {{ beneficiary.relation }}</div>
                        </div>
                        <div class="lg:grid grid-cols-2 lg:w-1/2">
                            <div>Birthday: {{ beneficiary.birthday }}</div>
                            <div>Phone number: {{ beneficiary.phone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add beneficiary modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showAddModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showAddModal = false">
                <div
                    class="relative bg-white dark:bg-zinc-900 w-full mx-2 lg:mx-0 overflow-y-auto lg:w-96 h-auto max-h-[80%] p-6 rounded-lg">
                    <div class="text-theme-800 font-bold">
                        Add beneficiary
                    </div>
                    <form @submit.prevent="addform.post(route('beneficiaries.store'), {
                        preserveScroll: true, onSuccess: () => {
                            this.showAddModal = errors.length ? true : false; if (!errors.length) {
                                addform.reset()
                            }
                        }
                    })">
                        <div class="mt-4">
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="addform.name" />
                            <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="relation" value="Relation" />
                            <BreezeInput id="relation" type="text" class="mt-1 block w-full"
                                v-model="addform.relation" />
                            <div v-if="errors.relation" class="text-red-600">{{ errors.relation }}</div>
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="birthday" value="Birthday" />
                            <BreezeInput id="birthday" type="date" class="mt-1 block w-full"
                                v-model="addform.birthday" />
                            <div v-if="errors.birthday" class="text-red-600">{{ errors.birthday }}</div>
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="phone" value="Phone" />
                            <BreezeInput id="phone" type="text" class="mt-1 block w-full" v-model="addform.phone" />
                            <div v-if="errors.phone" class="text-red-600">{{ errors.phone }}</div>
                        </div>

                        <BreezeButton class="mt-4 w-full justify-center" :class="{ 'opacity-25': addform.processing }"
                            :disabled="addform.processing">Add</BreezeButton>
                    </form>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showAddModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>

    <!-- Edit beneficiary modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showEditModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showEditModal = false">
                <div
                    class="relative bg-white dark:bg-zinc-900 w-full mx-2 lg:mx-0 overflow-y-auto lg:w-96 h-auto max-h-[80%] p-6 rounded-lg">
                    <div class="text-theme-800 font-bold">
                        Edit beneficiary
                    </div>
                    <form @submit.prevent="editform.put(route('beneficiaries.update', editBeneficiaryModel), {
                        preserveScroll: true, preserveState: false, onSuccess: () => this.showEditModal = false
                    })">
                        <div class="mt-4">
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="editform.name" />
                            <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="relation" value="Relation" />
                            <BreezeInput id="relation" type="text" class="mt-1 block w-full"
                                v-model="editform.relation" />
                            <div v-if="errors.relation" class="text-red-600">{{ errors.relation }}</div>
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="birthday" value="Birthday" />
                            <BreezeInput id="birthday" type="date" class="mt-1 block w-full"
                                v-model="editform.birthday" />
                            <div v-if="errors.birthday" class="text-red-600">{{ errors.birthday }}</div>
                        </div>

                        <div class="mt-4">
                            <BreezeLabel for="phone" value="Phone" />
                            <BreezeInput id="phone" type="text" class="mt-1 block w-full" v-model="editform.phone" />
                            <div v-if="errors.phone" class="text-red-600">{{ errors.phone }}</div>
                        </div>

                        <BreezeButton class="mt-4 w-full justify-center" :class="{ 'opacity-25': editform.processing }"
                            :disabled="editform.processing">Update</BreezeButton>
                    </form>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showEditModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>

    <!-- Delete beneficiary modal -->
    <div>
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
                            <span class="font-normal text-sm">Are you really sure you want to delete this
                                beneficiary?</span>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button class="mx-2 text-sm hover:underline"
                                @click="this.showDeleteModal = false">Cancel</button>
                            <button @click="deleteBeneficiary"
                                class="mx-2 p-3 bg-red-600 hover:bg-red-700 active:bg-red-900 text-white text-sm rounded-lg">
                                Delete</button>
                        </div>
                    </div>
                </div>
            </Transition>
            <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90"
                leave-from-class="opacity-90" leave-to-class="transform opacity-0" appear>
                <div v-if="showDeleteModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
            </Transition>
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
        useForm,
        Link
    },
    setup(props) {
        const addform = useForm({
            member_id: props.member.id,
            name: '',
            relation: '',
            birthday: '',
            phone: '',
        })

        const editform = useForm({
            name: '',
            relation: '',
            birthday: '',
            phone: '',
        })

        return { addform, editform }
    },
    props: {
        errors: Object,
        beneficiaries: Object,
        member: Object
    },
    methods: {
        editBeneficiary(beneficiary) {
            this.editBeneficiaryModel = beneficiary
            this.editform.name = beneficiary.name
            this.editform.relation = beneficiary.relation
            this.editform.birthday = beneficiary.birthday
            this.editform.phone = beneficiary.phone

            this.showEditModal = true
        },
        deleteBeneficiary() {
            this.$inertia.delete(route('beneficiaries.destroy', this.deleteBeneficiaryModel), {
                onSuccess: () => {
                    this.showDeleteModal = false
                }
            })
        }
    },
    data() {
        return {
            showEditModal: false,
            showAddModal: false,
            showDeleteModal: false,
            editBeneficiaryModel: '',
            deleteBeneficiaryModel: '',
        }
    }
}
</script>