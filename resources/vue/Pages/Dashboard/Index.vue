<template>
  <DashboardLayout title="Dashboard Index">
    <AlertBox type="info" :show-icon="false" :closable="false" :timeout="null">
      Welcome to your dashboard! This is some dummy content to show you how it
      this area looks when it has visible content to display. From here, feel
      free to visit the
      <Link class="underline" :href="route('users.index')">user manager</Link>
      to view and manage each of the users that are currently registered within
      the system. Also, you can view and modify
      <Link class="underline" :href="route('users.show', auth.user)">
        your own profile
      </Link>
      as well.
    </AlertBox>
  </DashboardLayout>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import AlertBox from '@/Components/AlertBox.vue'
import { usePage } from '@inertiajs/vue3'
import { PageProps } from '@/Types'

// --------------------------------------------------------
// composables
const { auth } = usePage().props as PageProps
</script>
