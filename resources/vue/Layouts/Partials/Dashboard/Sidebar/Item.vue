<template>
  <li>
    <Link
      :class="{
        'justify-start': !sidebar.collapsed,
        'justify-center': sidebar.collapsed,
      }"
      :href="route(props.to)"
    >
      <props.icon v-if="props.icon" class="h-4" />
      <span v-if="!sidebar.collapsed">
        {{ props.text }}
      </span>
    </Link>
  </li>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useSidebarStore } from '@/Stores/sidebarStore'

// --------------------------------------------------------
// component props
interface ComponentProps {
  icon: any | null
  to: string
  text: string
}

const props = withDefaults(defineProps<ComponentProps>(), {
  icon: null,
})

// --------------------------------------------------------
// sidebar state
const sidebar = useSidebarStore()
</script>

<style scoped>
li a {
  @apply dark:hover:text-stone-400
    dark:hover:bg-stone-700
    dark:border-stone-950
    hover:text-stone-600
    hover:bg-neutral-100
    border-stone-300/60
    dark:bg-stone-800
    text-stone-500
    items-center
    inline-flex
    text-center
    ease-in-out
    rounded-sm
    transition
    bg-white
    space-x-1
    w-full
    border
    px-2
    py-1;
}

li a span {
  @apply overflow-y-hidden
    max-h-6;
}
</style>
