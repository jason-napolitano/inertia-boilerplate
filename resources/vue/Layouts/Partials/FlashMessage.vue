<template>
  <AlertBox v-if="flash.message" :closable="props.closable">
    {{ flash.message }}
  </AlertBox>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import AlertBox from '@/Components/AlertBox.vue'
import { usePage } from '@inertiajs/vue3'
import { PageProps } from '@/Types'

// --------------------------------------------------------
// shared data
const { flash } = usePage().props as PageProps

// --------------------------------------------------------
// component props
interface ComponentProps {
  closable?: boolean
  timeout?: number
}

const props = withDefaults(defineProps<ComponentProps>(), {
  timeout: 3500,
  closable: false,
})
</script>
