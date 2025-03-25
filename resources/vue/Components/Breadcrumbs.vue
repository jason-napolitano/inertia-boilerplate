<template></template>

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
