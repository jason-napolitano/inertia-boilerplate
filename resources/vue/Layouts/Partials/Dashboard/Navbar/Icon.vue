<template>
  <button @click="sidebar.toggleSidebar">
    <IndentIncrease v-if="sidebar.collapsed" />
    <IndentDecrease v-else />
  </button>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { IndentIncrease, IndentDecrease } from 'lucide-vue-next'
import { useSidebarStore } from '@/Stores/sidebarStore'

// --------------------------------------------------------
// sidebar state
const sidebar = useSidebarStore()
</script>

<style scoped></style>
