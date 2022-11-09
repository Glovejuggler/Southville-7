<template>
    <div :class="$page.props.dark">
        <div class="min-h-screen bg-gray-100 dark:bg-zinc-800" style="transition: all 0.5s ease">
            <SidebarMenuAkahon />
            <div class="md:hidden flex">Dropdown nav for mobile devices</div>
            <!-- Page Content -->
            <main id="main">
                <slot />
            </main>
        </div>
    </div>
</template>

<script>
import SidebarMenuAkahon from '@/Components/Sidebar-menu-akahon.vue';

export default {
    components: {
        SidebarMenuAkahon
    },
}
</script>