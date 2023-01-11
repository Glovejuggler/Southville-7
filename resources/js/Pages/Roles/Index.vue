<template>

    <Head>
        <title>
            Roles
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90">
                    Roles
                </h2>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 flex flex-col space-y-4">
            <div class="overflow-hidden shadow-sm rounded-lg cursor-pointer" v-for="role in roles"
                @click="assignMemberModal(role)">
                <div
                    class="p-6 bg-white hover:border-theme-900/50 dark:bg-zinc-900 border border-transparent rounded-lg group">
                    <div class="flex flex-col">
                        <span class="font-bold text-theme-800">
                            {{ role.position }}
                        </span>
                        <span class="font-normal">
                            {{ role.member ? role.member.name : 'Unassigned' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-2 opacity-70">
                <i class="bx bx-info-circle text-xl"></i>
                <span>Click a role to assign a member</span>
            </div>
        </div>
    </div>

    <!-- Assign Member Modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showAssignModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showAssignModal = false">
                <div class="relative bg-white dark:bg-zinc-900 min-w-max w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <div class="mb-5">
                        <span class="font-bold block">{{ role.position }}</span>
                        <span>{{ role.member ? role.member.name + ' (Current)' : 'Unassigned' }}</span>
                    </div>
                    <BreezeInput v-model="searchform.search" class="block w-full mb-3" type="text"
                        placeholder="Search..." />
                    <span class="font-semibold block pb-3">Members</span>
                    <div class="max-h-[40vh] overflow-y-auto overflow-x-hidden">
                        <div class="text-center my-5 w-full" v-if="loading">
                            <i class="bx bx-loader-alt text-3xl text-theme-800 animate-spin"></i>
                        </div>
                        <div v-if="!loading">
                            <div v-for="member in visibleMembers" @click="assignmentConfirmationModal(member)"
                                class="w-96 p-3 hover:bg-black/5 rounded-lg cursor-pointer">
                                <span>{{ member.name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showAssignModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>

    <!-- Assignment Confirmation Modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showConfirmationModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showConfirmationModal = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <div>
                        <span class="font-bold text-lg block mb-2">Confirmation</span>
                        <span class="font-normal text-sm">Assign {{ member.name }} as {{ role.position }}?</span>
                    </div>
                    <form
                        @submit.prevent="form.put(route('roles.update', role), { preserveState: false, preserveScroll: true })">
                        <div class="flex justify-end mt-6">
                            <button class="mx-2 text-sm hover:underline" type="button"
                                @click="this.showConfirmationModal = false">Cancel</button>
                            <button type="submit"
                                class="mx-2 py-3 px-7 bg-theme-600 hover:bg-theme-700 active:bg-theme-900 text-white text-sm rounded-lg">
                                Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showConfirmationModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';
import throttle from 'lodash/throttle';
import axios from 'axios';

export default {
    data() {
        return {
            showAssignModal: false,
            role: null,
            showConfirmationModal: false,
            member: null,
            searchform: {
                search: this.filters.search
            },
            visibleMembers: '',
            loading: false
        }
    },
    components: {
        Head, Link, BreezeInput
    },
    props: {
        roles: Object,
        filters: Object,
        members: Object
    },
    methods: {
        assignMemberModal(role) {
            if (!this.visibleMembers) {
                this.loading = true;
                axios.get('/roles').then(response => {
                    this.visibleMembers = {
                        ...response.data.members,
                        data: [...this.visibleMembers, ...response.data.members]
                    }
                }).finally(() => this.loading = false);
            }
            this.showAssignModal = true;
            this.role = role;
            this.form.role = role.id;
        },
        assignmentConfirmationModal(member) {
            this.showAssignModal = false;
            this.showConfirmationModal = true;
            this.member = member;
            this.form.member_id = member.id;
        },
    },
    setup() {
        const form = useForm({
            member_id: ''
        })

        return { form }
    },
    watch: {
        searchform: {
            deep: true,
            handler: throttle(function () {
                axios.get(route('roles.index'), {
                    params: {
                        'search': this.searchform.search
                    }
                }).then(response => {
                    this.visibleMembers = response.data.members;
                });
            }, 150),
        }
    }
}
</script>