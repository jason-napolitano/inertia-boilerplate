<template>
  <section class="flex p-2 h-full">
    <div class="relative flex-1">
      <div
        class="absolute inset-0 overflow-hidden dark:text-stone-100 bg-white dark:bg-[#141414] dark:border-stone-800 rounded-sm border"
      >
        <slot />
      </div>
    </div>
  </section>
</template>
