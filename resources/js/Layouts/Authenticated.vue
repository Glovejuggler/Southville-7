<template>
    <div :class="$page.props.dark">
        <div class="min-h-screen bg-gray-100 dark:bg-zinc-800" style="transition: all 0.5s ease">
            <SidebarMenuAkahon />
            <div class="md:hidden flex justify-between items-center bg-white max-screen-2xl mx-auto px-6">
                <div class="">SV7CC</div>
                <button @click="isDropdownOpen = !isDropdownOpen"
                    class="bg-white m-3 text-4xl flex items-center rounded-lg border-theme-800 border"><i
                        class="bx bx-menu text-theme-800"></i>
                </button>
            </div>
            <div v-if="isDropdownOpen" class="relative bg-white">
                <ul>
                    <li class="hover:bg-theme-800 hover:text-white ease-in-out duration-200">
                        <Link @click="isDropdownOpen = false" :href="route('dashboard')" class="block py-4 px-2">
                        Dashboard
                        </Link>
                    </li>
                    <li class="hover:bg-theme-800 hover:text-white ease-in-out duration-200">
                        <Link @click="isDropdownOpen = false" :href="route('members.index')" class="block py-4 px-2">
                        Members
                        </Link>
                    </li>
                    <li class="hover:bg-theme-800 hover:text-white ease-in-out duration-200">
                        <Link @click="isDropdownOpen = false" :href="route('loanables.index')" class="block py-4 px-2">
                        Loan Services
                        </Link>
                    </li>
                    <li class="hover:bg-theme-800 hover:text-white ease-in-out duration-200">
                        <Link @click="isDropdownOpen = false" :href="route('events.index')" class="block py-4 px-2">
                        Events
                        </Link>
                    </li>
                </ul>
            </div>
            <!-- Page Content -->
            <main id="main">
                <slot />
            </main>
        </div>
    </div>
</template>

<script>
import SidebarMenuAkahon from '@/Components/Sidebar-menu-akahon.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        SidebarMenuAkahon,
        Link
    },
    data() {
        return {
            isDropdownOpen: false,
        }
    },
}
</script>