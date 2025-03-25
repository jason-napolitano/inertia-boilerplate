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
import { useMarkup } from '@/Composables/useMarkup'

// --------------------------------------------------------
// component props
interface ComponentProps {
  to: string | null
  text: string
  link: boolean
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
    hover:border-b-red-300
    hover:border-b-2
    duration-300
    align-middle
    ease-in-out
    transition
    my-auto
    px-2
    py-1
    /** dark mode **/
    hover:dark:text-blue-400
    dark:text-stone-200;
}

.is-active {
  @apply border-b-2
    hover:border-b-red-500
    border-b-red-500
    /** dark mode **/
  dark:hover:border-b-red-300
  dark:border-b-red-300;
}
</style>
