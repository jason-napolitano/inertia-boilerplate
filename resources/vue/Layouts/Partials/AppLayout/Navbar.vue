<template>
  <header>
    <section>
      <Logo />

      <Menu />
    </section>
  </header>
</template>

<script setup lang="ts">
import Menu from '@/Layouts/Partials/AppLayout/Navbar/Menu.vue'
import Logo from '@/Layouts/Partials/AppLayout/Navbar/Logo.vue'
</script>

<style scoped>
header {
  @apply flex
  sticky
  w-full
  min-h-16
  bg-[#F5F7FA]
  border-b
  border-gray-300/40
  hover:shadow
  transition
  ease-in-out
    dark:bg-[#111]
    dark:border-[#000];
}

section {
  @apply flex container mx-auto align-middle my-auto justify-between py-4;
}
</style>
