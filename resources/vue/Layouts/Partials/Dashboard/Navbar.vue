<template>
  <header class="text-stone-400">
    <nav>
      <Icon />
    </nav>

    <Menu />
  </header>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useSidebarStore } from '@/Stores/sidebarStore'
import Icon from './Navbar/Icon.vue'
import Menu from './Navbar/Menu.vue'

// --------------------------------------------------------
// sidebar state
const sidebar = useSidebarStore()
</script>

<style scoped>
header {
  @apply dark:border-stone-800
    dark:bg-neutral-900
    dark:text-stone-100
    justify-between
    items-center
    border-b
    bg-white
    flex
    p-4;
}

nav {
  @apply flex
  items-center
  space-x-4;
}
</style>
