<template>
  <main>
    <slot />
  </main>
</template>

<style scoped>
main {
  @apply flex
  dark:border-stone-900
  dark:text-stone-200
  dark:bg-[#191919]/90
    border-stone-300
    md:container
    border-t-0
    bg-white
    rounded-b
    flex-col
    mx-auto
    border
    p-4;
}
</style>
