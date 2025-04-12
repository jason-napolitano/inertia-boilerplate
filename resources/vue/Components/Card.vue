<template>
  <div class="card">
    <div class="card-header" v-if="!slotEmpty('header')">
      <div v-if="props.icon">
        <props.icon class="h-3.5" />
      </div>
      <div>
        <slot name="header"></slot>
      </div>
    </div>
    <div class="card-body">
      <slot></slot>
    </div>
    <div class="card-footer" v-if="!slotEmpty('footer')">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useApp } from '@/Composables/useApp'

// --------------------------------------------------------
// app composable
const { slotEmpty } = useApp()

interface CardProps {
  icon: string | null
}

const props = withDefaults(defineProps<CardProps>(), {
  icon: null,
})
</script>

<style scoped>
.card {
  @apply rounded-sm border dark:border-stone-700;
}

.card-footer,
.card-header {
  @apply flex justify-start space-x-1 items-center py-1 px-2 bg-stone-100 dark:border-stone-700 dark:bg-[#262727];
}

.card-header {
  @apply border-b;
}

.card-footer {
  @apply border-t;
}

.card-body {
  @apply p-2 dark:bg-[#1D1E1F];
}
</style>
