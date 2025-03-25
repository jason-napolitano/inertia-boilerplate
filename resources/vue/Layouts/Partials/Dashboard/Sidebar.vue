<template>
  <aside :class="{ 'w-60': !sidebar.collapsed, 'w-20': sidebar.collapsed }">
    <SidebarLogo :icon="LayoutDashboard" />

    <SidebarMenu>
      <SidebarItem to="dashboard" :icon="Gauge" text="Dashboard Index" />
      <SidebarItem to="users.index" :icon="Users" text="User Manager" />
    </SidebarMenu>
  </aside>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useSidebarStore } from '@/Stores/sidebarStore'
import { LayoutDashboard, Gauge, Users } from 'lucide-vue-next'
import SidebarMenu from './Sidebar/Menu.vue'
import SidebarLogo from './Sidebar/Logo.vue'
import SidebarItem from './Sidebar/Item.vue'

// --------------------------------------------------------
// sidebar state
const sidebar = useSidebarStore()
</script>

<style scoped>
aside {
  @apply dark:border-stone-900
    dark:text-stone-200
    border-gray-300/40
    dark:bg-[#0c0c0c]
    text-stone-700
    bg-[#F5F7FA]
    transition-all
    justify-start
    duration-300
    space-y-6
    flex-col
    border-r
    flex
    p-4;
}
</style>
