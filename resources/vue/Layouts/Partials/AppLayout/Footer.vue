<template>
  <footer>
    <Menu />
  </footer>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import Menu from '@/Layouts/Partials/AppLayout/Footer/Menu.vue'
</script>

<style scoped>
footer {
  @apply flex
  flex-col
  text-center
  container
  mx-auto
  py-4;
}
</style>
