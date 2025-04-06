<template>
  <aside :class="{ 'w-60': !sidebar.collapsed, 'w-16.5': sidebar.collapsed }">
    <div class="flex items-center justify-center py-4">
      <SidebarLogo :icon="ListTodo" />
    </div>
    <el-menu :collapse="sidebar.collapsed" :unique-opened="true">
      <el-sub-menu
        v-for="(sidebarItem, mainIndex) in sidebarItems"
        :index="mainIndex"
      >
        <template #title>
          <el-icon>
            <SidebarIcon :icon="sidebarItem.icon"></SidebarIcon>
          </el-icon>
          <span>
            {{ sidebarItem.title }}
          </span>
        </template>
        <el-menu-item
          v-for="(child, childIndex) in sidebarItem.children"
          :index="mainIndex + '-' + childIndex"
        >
          <Link :href="route(child.route as string)" class="flex w-full">
            {{ child.title }}
          </Link>
        </el-menu-item>
      </el-sub-menu>
    </el-menu>
  </aside>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useSidebarStore } from '@/Stores/sidebarStore'
import { useSidebar } from '@/Composables/useSidebar'
import SidebarIcon from './Sidebar/Icon.vue'
import SidebarLogo from './Sidebar/Logo.vue'
import { ListTodo } from 'lucide-vue-next'

// --------------------------------------------------------
// sidebar state
const sidebar = useSidebarStore()


// --------------------------------------------------------
// sidebar items
const { sidebarItems } = useSidebar()
</script>

<style scoped>
.el-menu--vertical,
.el-menu {
  @apply border-r-0 border-t
    dark:border-stone-900
    dark:bg-[#171717]
    bg-[#F5F7FA]
    h-screen;
}

aside {
  @apply dark:border-stone-900
    dark:text-stone-200
    border-gray-300/40
    dark:bg-[#0c0c0c]
    text-stone-700
    bg-[#F5F7FA]
    justify-start
    transition
    flex-col
    border-r
    flex;
}
</style>
