<template >

    <Head>
        <title>
            {{ member.name }}
        </title>
    </Head>

    <!-- Header -->
    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                {{ member.name }}
            </h2>
        </div>
    </div>

    <ShowMemberTabs :member="member" />

    <!-- Member Information -->
    <div class="lg:flex pt-4 max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg w-full">
            <div class="p-6 bg-white dark:bg-zinc-900 group-hover:bg-black/[0.02]">
                <div class="lg:flex justify-between">
                    <span class="uppercase font-bold block text-theme-800 dark:text-white/90 text-lg">{{
                        member.name
                    }}</span>

                    <div class="lg:flex flex-col lg:flex-row space-x-2">
                        <button
                            v-if="!user.length && member.email && $page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
                            @click="showAccountCreateModal = true" type="button" class="inline-flex cursor-pointer
                                                    items-center px-4 py-2 bg-theme-800
                                                    border border-transparent rounded-md 
                                                    font-semibold text-xs text-white uppercase
                                                    tracking-widest hover:bg-theme-700 active:bg-theme-900
                                                    focus:outline-none focus:border-theme-900
                                                    focus:shadow-outline-theme transition ease-in-out duration-150">
                            Create account
                        </button>
                        <Link
                            v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
                            as="button" :href="route('members.edit', member.id)" class="inline-flex cursor-pointer
                                                    items-center px-4 py-2 bg-emerald-800
                                                     rounded-md tracking-widest
                                                    font-semibold text-xs text-white uppercase hover:bg-emerald-700 active:bg-emerald-900
                                                    focus:outline-none focus:border-emerald-900
                                                    focus:shadow-outline-gray transition ease-in-out duration-150">
                        Edit
                        </Link>
                    </div>
                </div>

                <div class="font-semibold mt-3">Basic Info</div>
                <div class="lg:flex">
                    <div class="w-full lg:w-1/2">
                        <span class="block">Birthdate: {{ format_dateMDY(member.birthdate) }} ({{
                            age(member.birthdate)
                        }} years old)</span>
                        <span class="block">Birthplace: {{ member.birthplace }}</span>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <span class="block">Address: {{ member.address }}</span>
                        <span class="block">Provincial Address: {{ member.prov_address ?? 'N/A' }}</span>
                    </div>
                </div>

                <div class="font-semibold mt-3">Contact info</div>
                <div class="lg:flex">
                    <div class="w-full lg:w-1/2">
                        <span class="block">Mobile number: {{ member.contact_number }}</span>
                        <span class="block">E-mail: {{ member.email }}</span>
                        <span class="block">Facebook: {{ member.facebook }}</span>
                    </div>
                </div>

                <div class="font-semibold mt-3">Others</div>
                <div class="lg:flex">
                    <div class="w-full lg:w-1/2">
                        <span class="block">Religion: {{ member.religion }}</span>
                        <span class="block">SSS: {{ member.sss }}</span>
                        <span class="block">TIN: {{ member.tin }}</span>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <span class="block">Educational attainment/course: {{ member.education }}</span>
                        <span class="block">Skills: {{ member.skills }}</span>
                        <span class="block">Present employment or business activities: {{ member.employment }}</span>
                        <span class="block">Monthly income: {{ member.income }}</span>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Beneficiaries</span>
                        <Link
                            v-if="this.$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
                            :href="route('beneficiaries.edit', member)" class="hover:text-green-500">
                        <i
                            class="bx bx-edit text-xl rounded-full h-8 w-8 hover:bg-black/10 p-2 inline-flex items-center justify-center"></i>
                        </Link>
                    </div>
                    <div class="hidden lg:flex">
                        <table class="table-fixed lg:w-3/4 w=full text-left" v-if="beneficiaries.length">
                            <thead class="font-semibold text-xs">
                                <tr>
                                    <th>Name</th>
                                    <th>Relation</th>
                                    <th>Birthday</th>
                                    <th>Phone number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(beneficiary, index) in beneficiaries" :key="index">
                                    <td>{{ beneficiary.name }}</td>
                                    <td>{{ beneficiary.relation }}</td>
                                    <td>{{ format_dateMDY(beneficiary.birthday) }}</td>
                                    <td>{{ beneficiary.phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="lg:hidden block">
                        <div v-for="(beneficiary, index) in beneficiaries" :key="index" class="pb-4">
                            <div>Name: {{ beneficiary.name }}</div>
                            <div>Relation: {{ beneficiary.relation }}</div>
                            <div>Birthday: {{ format_dateMDY(beneficiary.birthday) }}</div>
                            <div>Phone number: {{ beneficiary.phone }}</div>
                        </div>
                    </div>
                    <div v-if="!beneficiaries.length" class="italic">
                        No beneficiaries
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Picture upload -->
    <div class="lg:mt-8 mt-4 max-w-screen-2xl mx-auto px-6 lg:px-8 pb-4 group">
        <div class="bg-white dark:bg-zinc-900 overflow-x-auto shadow-sm rounded-lg">
            <div class="p-6 bg-white dark:bg-zinc-900">
                <div class="flex justify-between">
                    <span class="font-bold dark:text-white/90 text-theme-800">Images</span>
                    <form @submit.prevent="submit"
                        v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))">
                        <label class="flex">
                            <span class="sr-only">Choose files</span>
                            <input type="file" name="file" accept="image/*" @input="fileform.file = $event.target.files"
                                class="block w-full text-sm text-slate-500 dark:text-white/70
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-theme-50 file:text-theme-700 dark:file:text-white/70 dark:file:bg-zinc-600
                                hover:file:bg-theme-100/20
                                " multiple />
                            <button :disabled="fileform.processing" type="submit"
                                class="text-sm uppercase rounded-lg text-white font-semibold bg-theme-800 px-3">
                                <span>Upload</span>
                            </button>
                        </label>
                    </form>
                </div>
                <div class="grid gap-2 lg:grid-cols-4 grid-cols-2 mt-4">
                    <div v-for="pic in pics" class="cursor-pointer
                        [&>div>div:nth-child(3)]:hover:z-30
                        [&>div>div:nth-child(3)]:hover:delay-500
                        [&>div>div:nth-child(3)]:hover:translate-x-0
                        [&>div>img]:hover:scale-125
                        [&>div>img]:hover:opacity-75
                        rounded-lg">
                        <div class="relative h-48 rounded-lg overflow-hidden content-center">
                            <img :src="`../${pic.path}`" height="50%" width="50%"
                                class="z-20 absolute h-full w-full bg-white object-cover rounded-lg ease-in-out duration-300"
                                @click.self="toggleModal(pic.path, pic.id)" @contextmenu.prevent="">
                            <div class="z-10 absolute bg-black w-full h-full">
                            </div>
                            <div v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
                                class="absolute z-0 grid w-full h-full translate-x-1/4 ease-in-out duration-300"
                                @click.self="toggleModal(pic.path, pic.id)">
                                <Link class="uppercase text-white font-bold place-self-end
                                    inline-flex p-3 bg-red-600 hover:bg-red-500
                                    rounded-full m-3" :href="route('files.destroy', pic.id)" method="delete"
                                    as="button" preserve-scroll>
                                <i class="bx bx-trash text-lg leading-none"></i></Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Secretary'].includes(r))"
        class="max-w-screen-2xl mx-auto px-6 lg:px-8 flex justify-end pb-4">
        <button type="button" @click="this.showMemberDeletionModal = true"
            class="rounded-lg py-2 px-4 uppercase font-semibold text-xs text-red-600 border border-red-600 hover:text-white hover:bg-red-600 duration-200 ease-in-out">Delete
            member</button>
    </div>

    <!-- Image modal -->
    <ShowImage ref="showImageModal" />

    <!-- Confirm account creation modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showAccountCreateModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showAccountCreateModal = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <div v-if="!account.processing">
                        <div>
                            <span class="font-bold text-lg block mb-2">Confirmation</span>
                            <span class="font-normal text-sm">Are you sure you want to create a user account for {{
                                member.name
                            }}?</span>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button class="mx-2 text-sm hover:underline"
                                @click="this.showAccountCreateModal = false">Cancel</button>
                            <button type="button" @click="account.post(route('user.store'), {
                                preserveScroll: true,
                                preserveState: false,
                                onSuccess: () => this.showAccountCreateModal = false
                            })"
                                class="mx-2 p-3 bg-theme-600 hover:bg-theme-700 active:bg-theme-900 text-white text-sm rounded-lg flex items-center">
                                Yes</button>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center" v-if="account.processing">
                        <i class="bx bx-loader-alt text-6xl text-theme-800 animate-spin"></i>
                        <p>Please wait</p>
                    </div>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showAccountCreateModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>

    <!-- Confirm member deletion modal -->
    <div>
        <Transition enter-active-class="duration-200 ease-out" enter-from-class="transform opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-200 ease-out"
            leave-from-class="opacity-100 scale-100" leave-to-class="transform opacity-0 scale-75">
            <div v-if="showMemberDeletionModal"
                class="overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center"
                @click.self="this.showMemberDeletionModal = false">
                <div class="relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg">
                    <div v-if="!account.processing">
                        <div>
                            <span class="font-bold text-lg block mb-2">Confirmation</span>
                            <div class="font-normal text-sm">Are you sure you want to delete this member: <span
                                    class="font-semibold text-theme-800">{{
                                        member.name
                                    }}</span>?</div>
                            <div class="text-sm italic">
                                This action cannot be undone
                            </div>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button class="mx-2 text-sm hover:underline"
                                @click="this.showMemberDeletionModal = false">Cancel</button>
                            <button type="button" @click="this.$inertia.delete(route('members.destroy', member), {
                                preserveScroll: true,
                                preserveState: false,
                                onSuccess: () => this.showMemberDeletionModal = false
                            })"
                                class="mx-2 p-3 bg-red-600 hover:bg-red-700 active:bg-red-900 text-white text-sm rounded-lg flex items-center">
                                Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
        <Transition enter-active-class="duration-200 ease opacity-0" enter-from-class="opacity-0"
            enter-to-class="opacity-100" leave-active-class="duration-200 ease opacity-90" leave-from-class="opacity-90"
            leave-to-class="transform opacity-0" appear>
            <div v-if="showMemberDeletionModal" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-md"></div>
        </Transition>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';
import ShowImage from '@/Components/ShowImage.vue';
import ShowMemberTabs from '@/Components/ShowMemberTabs.vue';

export default {
    components: {
        Head,
        Link,
        BreezeButton,
        ShowImage,
        BreezeInput,
        BreezeLabel,
        ShowMemberTabs
    },
    props: {
        member: Object,
        pics: Object,
        errors: Object,
        user: Object,
        savings: Number,
        beneficiaries: Object,
    },
    methods: {
        format_dateMY(value) {
            if (value) {
                return moment(String(value)).format('MMMM YYYY')
            }
        },
        format_dateMDY(value) {
            if (value) {
                return moment(String(value)).format('MMMM D, YYYY')
            }
        },
        age(value) {
            return moment().diff(String(value), 'years', false)
        },
        toggleModal(value, fileId) {
            this.$refs.showImageModal.toggleModal(value, fileId);
        },
    },
    setup(props) {
        const fileform = useForm({
            member_id: props.member.id,
            loan_id: props.loan?.id,
            file: [],
        })

        function submit() {
            fileform.post('/files', {
                preserveScroll: true,
                preserveState: false,
                onSuccess: () => fileform.reset('file'),
            });
        }

        const account = useForm({
            member_id: props.member.id
        })

        return { fileform, submit, account }
    },
    data() {
        return {
            showAccountCreateModal: false,
            showMemberDeletionModal: false,
        }
    }
}

</script>