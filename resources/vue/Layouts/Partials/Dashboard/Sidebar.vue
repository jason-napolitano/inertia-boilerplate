<template>
  <Transition name="slide-in-out">
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
            <Link
              class="flex justify-start items-center w-full pl-7"
              :href="route(child.route as string)"
            >
              <SidebarIcon
                v-if="!sidebar.collapsed"
                :icon="ChevronsRight"
                class="h-3.5"
              />
              <span>
                {{ child.title }}
              </span>
            </Link>
          </el-menu-item>
        </el-sub-menu>
      </el-menu>
    </aside>
  </Transition>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { ListTodo, ChevronsRight } from 'lucide-vue-next'
import { useSidebarStore } from '@/Stores/sidebarStore'
import { useSidebar } from '@/Composables/useSidebar'
import SidebarIcon from './Sidebar/Icon.vue'
import SidebarLogo from './Sidebar/Logo.vue'

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

.el-menu-item {
  padding-left: 0 !important;
}

aside {
  @apply dark:border-stone-900
    dark:text-stone-200
    border-gray-300/40
    dark:bg-[#0c0c0c]
    text-stone-700
    bg-[#F5F7FA]
    justify-start
    flex-col
    border-r
    flex;
}
/* Transition classes */
.slide-in-out-enter-active,
.slide-in-out-leave-active {
  transition:
    transform 0.5s ease-in-out,
    opacity 0.5s ease-in-out;
}

.slide-in-out-enter-from {
  transform: translateX(-100%);
  opacity: 0;
}

.slide-in-out-enter-to {
  transform: translateX(0%);
  opacity: 1;
}

.slide-in-out-leave-from {
  transform: translateX(0%);
  opacity: 1;
}

.slide-in-out-leave-to {
  transform: translateX(100%);
  opacity: 0;
}
</style>
