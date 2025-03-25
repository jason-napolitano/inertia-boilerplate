<template>
  <section class="flex p-2 h-full">
    <div class="relative flex-1">
      <div
        class="absolute inset-0 overflow-hidden dark:text-stone-100 bg-white rounded-sm border"
      >
        <slot />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { usePage } from '@inertiajs/vue3'
import { PageProps } from '@/Types'

// --------------------------------------------------------
// component props
interface ComponentProps {
  // ...
}

const props = defineProps<ComponentProps>()

// --------------------------------------------------------
// composables
const {
  /* */
} = usePage().props as PageProps
</script>

<style scoped></style>
