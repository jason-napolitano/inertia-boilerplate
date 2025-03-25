<template>
  <div>
    <span v-if="props.icon && !sidebar.collapsed">
      <props.icon class="w-[1rem] mt-[0.1rem]" />
    </span>
    <span> {{ appName }} </span>
  </div>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useSidebarStore } from '@/Stores/sidebarStore'
import { useString } from '@/Composables/useString'
import { computed } from 'vue'

// --------------------------------------------------------
// component props
interface ComponentProps {
  icon: any | null
}

const props = withDefaults(defineProps<ComponentProps>(), {
  icon: null,
})

// --------------------------------------------------------
// sidebar state
const sidebar = useSidebarStore()

// --------------------------------------------------------
// composables
const string = useString()

// --------------------------------------------------------
// computed properties
const appName = computed(() => {
  const appTitle = import.meta.env.VITE_APP_NAME
  return !sidebar.collapsed ? appTitle : string.initials(appTitle)
})
</script>

<style scoped>
div {
  @apply flex
    justify-center
    items-center
    space-x-2;
}

span {
  @apply inline
    overflow-hidden
    text-lg
    max-h-6;
}
</style>
