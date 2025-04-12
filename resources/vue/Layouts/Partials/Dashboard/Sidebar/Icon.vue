<template>
  <props.icon />
</template>

<script setup lang="ts">
// --------------------------------------------------------
// component props
interface ComponentProps {
  icon?: object | null
}

const props = defineProps<ComponentProps>()
</script>

<style scoped></style>
