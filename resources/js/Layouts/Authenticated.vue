<template>
    <div :class="$page.props.dark">
        <div class="min-h-screen bg-gray-100 dark:bg-zinc-800" style="transition: all 0.5s ease">
            <SidebarMenuAkahon />
            <div class="md:hidden flex justify-between items-center bg-white max-screen-2xl mx-auto px-6">
                <div class="">SV7CC</div>
                <button @click="isDropdownOpen = !isDropdownOpen"
                    class="m-3 text-4xl flex items-center rounded-lg bg-white text-theme-800 border-theme-800 border"
                    :class="{ 'bg-theme-800 text-white': isDropdownOpen }"><i class="bx bx-menu"></i>
                </button>
            </div>
            <div v-if="isDropdownOpen" class="relative bg-white">
                <ul>
                    <li
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('dashboard')" class="block py-4 px-2">
                        Dashboard
                        </Link>
                    </li>
                    <li v-if="$page.props.auth.position.length"
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('members.index')" class="block py-4 px-2">
                        Members
                        </Link>
                    </li>
                    <li v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman', 'Treasurer'].includes(r))"
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('loanables.index')" class="block py-4 px-2">
                        Loan Services
                        </Link>
                    </li>
                    <li v-if="$page.props.auth.position.includes('Secretary')"
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('events.index')" class="block py-4 px-2">
                        Events
                        </Link>
                    </li>
                    <li v-if="$page.props.auth.position.includes('Secretary')"
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('post.index')" class="block py-4 px-2">
                        Posts
                        </Link>
                    </li>
                    <li v-if="$page.props.auth.position.some(r => ['Chairman', 'Vice Chairman'].includes(r))"
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('roles.index')" class="block py-4 px-2">
                        Roles
                        </Link>
                    </li>
                    <li
                        class="hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white">
                        <Link @click="isDropdownOpen = false" :href="route('user.settings')" class="block py-4 px-2">
                        Settings
                        </Link>
                    </li>
                    <Link @click="isDropdownOpen = false" :href="route('logout')" method="post"
                        class="py-4 px-2 hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white flex items-center group">
                    Logout<span class="px-2 text-xs text-black/50 group-hover:text-white group-active:text-white">({{
                        $page.props.auth.user.name
                    }})</span>
                    </Link>

                </ul>
            </div>
            <!-- Page Content -->
            <main id="main">
                <slot />
            </main>
        </div>
    </div>

    <ToastList />
</template>

<script>
import SidebarMenuAkahon from '@/Components/Sidebar-menu-akahon.vue';
import { Link } from '@inertiajs/inertia-vue3';
import ToastList from '@/Components/ToastList.vue';

export default {
    components: {
        SidebarMenuAkahon,
        Link,
        ToastList
    },
    data() {
        return {
            isDropdownOpen: false,
        }
    },
}
</script>