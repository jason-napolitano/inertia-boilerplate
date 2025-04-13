<template>
  <ul>
    <ListItem>
      &copy; {{ currentYear }} {{ appName }} - All Rights Reserved
    </ListItem>
    <ListItem v-if="page.props.auth.user && can('view_analytics')">
      <a :href="route('telescope')" target="_blank"> Analytical Data </a>
    </ListItem>
    <ListItem v-if="!page.props.auth.user">
      <div class="flex justify-center space-x-2">
        <Link :href="route('login')">Member Login</Link>
        <!--
        <Link :href="route('register.index')">Register</Link>
        -->
      </div>
    </ListItem>
    <ListItem v-else>
      <Logout />
    </ListItem>
  </ul>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import Logout from '@/Components/Buttons/Logout.vue'
import { useDate } from '@/Composables/useDate'
import { useAuth } from '@/Composables/useAuth'
import { usePage } from '@inertiajs/vue3'
import ListItem from './Item.vue'
import { computed } from 'vue'

// --------------------------------------------------------
// composables
const { currentYear } = useDate()
const { can } = useAuth()
const page = usePage()

// --------------------------------------------------------
// computed props
const appName = computed(() => import.meta.env.VITE_APP_NAME)
</script>

<style scoped>
ul {
  @apply space-y-2 last:text-sm;
}
</style>
