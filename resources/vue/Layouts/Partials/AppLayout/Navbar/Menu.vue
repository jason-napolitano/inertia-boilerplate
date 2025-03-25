<template>
  <ul>
    <ListItem to="home" text="Home" />
    <ListItem to="about" text="About" />
    <ListItem v-if="page.props.auth.user" to="dashboard" text="Dashboard" />
  </ul>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { usePage } from '@inertiajs/vue3'
import ListItem from './Item.vue'

// --------------------------------------------------------
// composables
const page = usePage()
</script>

<style scoped>
ul {
  @apply flex space-x-2;
}
</style>
