<template>
  <AppLayout title="Homepage">
    <h1 class="text-xl text-center">Welcome to {{ appName }}</h1>
    <hr />
    <p class="text-justify">
      {{ appName }} is a streamlined tool designed to simplify the
      administration of user accounts within any digital system. With a clean
      and intuitive interface, it allows administrators to create, update,
      deactivate, and assign roles to users with ease. The application
      prioritizes both functionality and user experience, integrating robust
      validation, permission controls, and responsive design to ensure smooth
      operation across all devices. Whether managing a handful of users or
      scaling up to thousands, the app delivers consistent performance and
      clarity.
    </p>
    <p class="text-justify">
      Built with a focus on modern web standards, {{ appName }} leverages
      technologies like Laravel for backend processing and Vue and Inertia for a
      dynamic frontend experience. It supports features like customizable
      role-based access control. {{ appName }} not only boosts efficiency but
      also reinforces security best practices, making user management a breeze
      rather than a burden.
    </p>
  </AppLayout>
</template>

<script setup>
import { computed } from 'vue'

const appName = computed(() => import.meta.env['VITE_APP_NAME'])
</script>
