<template>
  <ul>
    <li>
      <Link :href="route('users.show', auth.user)" v-text="'Profile'" />
    </li>
    <li>
      <Logout />
    </li>
  </ul>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import Logout from '@/Components/Buttons/Logout.vue'
import { usePage } from '@inertiajs/vue3'
import { PageProps } from '@/Types'

// --------------------------------------------------------
// shared data
const { auth } = usePage().props as PageProps
</script>

<style scoped>
ul {
  @apply flex items-center space-x-4 text-sm;
}
</style>
