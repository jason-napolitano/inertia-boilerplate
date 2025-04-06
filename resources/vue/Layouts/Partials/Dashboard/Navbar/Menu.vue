<template>
  <ul>
    <li :class="activeClass('dashboard')">
      <ElIcon>
        <Gauge />
      </ElIcon>
      <Link :href="route('dashboard')" v-text="'Dashboard'" />
    </li>
    <li :class="activeClass('users.index')">
      <ElIcon>
        <Users />
      </ElIcon>
      <Link :href="route('users.index')" v-text="'User Manager'" />
    </li>
    <li>
      <ElIcon class="w-2">
        <CircleUserRound />
      </ElIcon>
      <Link :href="route('users.show', auth.user)" v-text="'My Profile'" />
    </li>
  </ul>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { CircleUserRound, Gauge, Users, LogOut } from 'lucide-vue-next'
import { useMarkup } from '@/Composables/useMarkup'
import { usePage } from '@inertiajs/vue3'
import { PageProps } from '@/Types'

// --------------------------------------------------------
// shared data
const { auth } = usePage().props as PageProps

// --------------------------------------------------------
// active menu items
const { activeClass } = useMarkup()
</script>

<style scoped>
ul {
  @apply flex items-center space-x-4 text-sm;
}

li {
  @apply flex items-center space-x-2 justify-start hover:text-blue-400 transition ease-in-out hover:underline;
}

.is-active {
    @apply text-blue-400 underline
}
</style>
