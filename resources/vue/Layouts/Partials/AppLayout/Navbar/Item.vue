<template>
  <li>
    <Link
      :class="activeClass(props.to as string)"
      :href="route(props.to as string)"
      v-if="props.link"
    >
      <slot>{{ props.text }}</slot>
    </Link>
    <span v-else>
      <slot>{{ props.text }}</slot>
    </span>
  </li>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useMarkup } from '@/Composables/useMarkup' // --------------------------------------------------------

// --------------------------------------------------------
// component props
interface ComponentProps {
  to?: string | null
  link?: boolean
  text: string
}

const props = withDefaults(defineProps<ComponentProps>(), {
  to: null,
  link: true,
})

// --------------------------------------------------------
// composables
const { activeClass } = useMarkup()
</script>

<style scoped>
li span a,
li span,
li a {
  @apply inline-block
    hover:dark:text-blue-400
    hover:border-b-red-300
    dark:text-stone-200
    border-transparent
    duration-300
    align-middle
    ease-in-out
    transition
    border-b-2
    my-auto
    px-2
    py-1;
}

.is-active {
  @apply border-b-2
    dark:hover:border-b-red-300
    hover:border-b-red-500
    dark:border-b-red-300
    border-b-red-500;
}
</style>
