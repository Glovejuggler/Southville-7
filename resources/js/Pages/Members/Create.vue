<template>

    <Head title="New Member" />

    <div class="bg-white dark:bg-zinc-900 shadow">
        <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-theme-800 dark:text-white/90 my-auto">
                New Member
            </h2>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-zinc-900">
                    <form @submit.prevent="form.post(route('members.store'))">
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

                        <div class="mt-4">
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

                        <div class="mt-4">
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

                        <div class="mt-4">
                            <div class="flex items-center space-x-3">
                                <span class="font-bold">Beneficiaries</span>
                                <button @click="addBeneficiary" type="button"
                                    class="border rounded-lg border-green-500 px-3 py-2 text-green-500 text-xs active:bg-green-500 active:text-white">Add</button>
                            </div>

                            <div>
                                <div v-for="(beneficiary, index) in form.beneficiaries" :key="index" class="mb-5">
                                    <div class="flex items-center">
                                        <i @click="removeBeneficiary(index)"
                                            class="bx bxs-trash border border-red-500 text-red-500 p-1 rounded-lg mr-2 active:bg-red-500 active:text-white cursor-pointer"></i>
                                        <span class="font-semibold text-sm">Beneficiary {{ index + 1 }}</span>
                                    </div>
                                    <div class="lg:flex">
                                        <div class="mt-2 lg:w-1/4">
                                            <BreezeLabel :for="`${index}.name`" value="Name" />
                                            <BreezeInput :id="`${index}.name`" type="text" class="mt-1 block w-full"
                                                v-model="beneficiary.name" />
                                            <div v-if="errors[`beneficiaries.${index}.name`]" class="text-red-600">{{
        errors[`beneficiaries.${index}.name`]
}}</div>
                                        </div>
                                        <div class="mt-2 lg:ml-1 lg:w-1/4">
                                            <BreezeLabel :for="`${index}.relation`" value="Relation" />
                                            <BreezeInput :id="`${index}.relation`" type="text" class="mt-1 block w-full"
                                                v-model="beneficiary.relation" />
                                            <div v-if="errors[`beneficiaries.${index}.relation`]" class="text-red-600">
                                                {{
        errors[`beneficiaries.${index}.relation`]
}}</div>
                                        </div>

                                    </div>
                                    <div class="lg:flex">
                                        <div class="mt-2 lg:w-1/4">
                                            <BreezeLabel :for="`${index}.birthday`" value="Birthday" />
                                            <BreezeInput :id="`${index}.birthday`" type="date" class="mt-1 block w-full"
                                                v-model="beneficiary.birthday" />
                                            <div v-if="errors[`beneficiaries.${index}.birthday`]" class="text-red-600">
                                                {{
        errors[`beneficiaries.${index}.birthday`]
}}</div>
                                        </div>


                                        <div class="mt-2 lg:ml-1 lg:w-1/4">
                                            <BreezeLabel :for="`${index}.phone`" value="Phone number" />
                                            <BreezeInput :id="`${index}.phone`" type="text" class="mt-1 block w-full"
                                                v-model="beneficiary.phone" />
                                            <div v-if="errors[`beneficiaries.${index}.phone`]" class="text-red-600">{{
        errors[`beneficiaries.${index}.phone`]
}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex lg:w-1/2 w-full">
                            <BreezeButton class="mt-8 justify-center" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">Save
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
import { Head, useForm } from '@inertiajs/inertia-vue3';


export default {
    components: {
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
        useForm
    },
    setup() {
        const form = useForm({
            name: '',
            address: '',
            prov_address: '',
            contact_number: '',
            email: '',
            facebook: '',
            birthdate: '',
            birthplace: '',
            religion: '',
            sss: '',
            tin: '',
            education: '',
            skills: '',
            employment: '',
            income: '',
            beneficiaries: []
        })

        return { form }
    },
    props: {
        errors: Object
    },
    methods: {
        addBeneficiary() {
            this.form.beneficiaries.push({
                relation: '',
                name: '',
                birthday: '',
                phone: ''
            })
        },
        removeBeneficiary(index) {
            this.form.beneficiaries.splice(index, 1)
        }
    }
}
</script>