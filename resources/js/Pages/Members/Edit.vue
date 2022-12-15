<template>

    <Head>
        <title>
            {{ member.name }}
        </title>
    </Head>

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                Edit
            </h2>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.put(route('members.update', member.id))">
                        <div>
                            <span class="font-bold">Personal Information</span>
                            <div>
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput id="name" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.name" />
                                <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="address" value="Address" />
                                <BreezeInput id="address" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.address" />
                                <div v-if="errors.address" class="text-red-600">{{ errors.address }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="prov_address" value="Provincial Address" />
                                <BreezeInput id="prov_address" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.prov_address" />
                                <div v-if="errors.prov_address" class="text-red-600">{{ errors.prov_address }}</div>
                            </div>

                            <div class="lg:flex">
                                <div class="mt-5 lg:w-1/4">
                                    <BreezeLabel for="birthdate" value="Birthdate" />
                                    <BreezeInput id="birthdate" type="date" class="mt-1 block w-full"
                                        v-model="form.birthdate" />
                                    <div v-if="errors.birthdate" class="text-red-600">{{ errors.birthdate }}</div>
                                </div>

                                <div class="mt-5 lg:ml-1 lg:w-1/4">
                                    <BreezeLabel for="birthplace" value="Birthplace" />
                                    <BreezeInput id="birthplace" type="text" class="mt-1 block w-full"
                                        v-model="form.birthplace" />
                                    <div v-if="errors.birthplace" class="text-red-600">{{ errors.birthplace }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <span class="font-bold">Contact information</span>
                            <div class="">
                                <BreezeLabel for="contact_number" value="Contact Number" />
                                <BreezeInput id="contact_number" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.contact_number" />
                                <div v-if="errors.contact_number" class="text-red-600">{{ errors.contact_number }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="email" value="Email address" />
                                <BreezeInput id="email" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.email" />
                                <div v-if="errors.email" class="text-red-600">{{ errors.email }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="facebook" value="Facebook Name" />
                                <BreezeInput id="facebook" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.facebook" />
                                <div v-if="errors.facebook" class="text-red-600">{{ errors.facebook }}</div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <span class="font-bold">Others</span>
                            <div class="">
                                <BreezeLabel for="religion" value="Religion" />
                                <BreezeInput id="religion" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.religion" />
                                <div v-if="errors.religion" class="text-red-600">{{ errors.religion }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="sss" value="SSS" />
                                <BreezeInput id="sss" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.sss" />
                                <div v-if="errors.sss" class="text-red-600">{{ errors.sss }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="tin" value="TIN" />
                                <BreezeInput id="tin" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.tin" />
                                <div v-if="errors.tin" class="text-red-600">{{ errors.tin }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="education" value="Educational attainment/course" />
                                <BreezeInput id="education" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.education" />
                                <div v-if="errors.education" class="text-red-600">{{ errors.education }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="skills" value="Skills" />
                                <BreezeInput id="skills" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.skills" />
                                <div v-if="errors.skills" class="text-red-600">{{ errors.skills }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="employment" value="Present employment or business activities" />
                                <BreezeInput id="employment" type="text" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.employment" />
                                <div v-if="errors.employment" class="text-red-600">{{ errors.employment }}</div>
                            </div>

                            <div class="mt-5">
                                <BreezeLabel for="income" value="Monthly income" />
                                <BreezeInput id="income" type="number" class="mt-1 block w-full lg:w-1/2"
                                    v-model="form.income" />
                                <div v-if="errors.income" class="text-red-600">{{ errors.income }}</div>
                            </div>
                        </div>

                        <div>
                            <BreezeButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Update</BreezeButton>
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
        BreezeInput
    },
    setup(props) {
        const form = useForm({
            name: props.member.name,
            address: props.member.address,
            prov_address: props.member.prov_address,
            contact_number: props.member.contact_number,
            email: props.member.email,
            facebook: props.member.facebook,
            birthdate: props.member.birthdate,
            birthplace: props.member.birthplace,
            religion: props.member.religion,
            sss: props.member.sss,
            tin: props.member.tin,
            education: props.member.education,
            skills: props.member.skills,
            employment: props.member.employment,
            income: props.member.income,
        })

        return { form }
    },
    props: {
        member: Object,
        errors: Object
    }
}
</script>