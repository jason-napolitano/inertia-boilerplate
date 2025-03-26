<template>
  <div v-if="props.links.length > 3">
    <div class="flex">
      <template v-for="(link, key) in props.links" :key="key">
        <div
          v-if="link['url'] === null"
          class="no-underline px-2 py-1 text-sm text-gray-600 border rounded-0 dark:border-stone-700 cursor-not-allowed"
          v-html="link['label']"
        />
        <Link
          v-else
          class="no-underline px-2 py-1 text-sm border rounded-0 dark:border-stone-700"
          :class="{
            'bg-[#F5F7FA] dark:bg-[#262727] text-stone-600 dark:text-stone-200':
              link.active,
          }"
          :href="link['url']"
          v-html="link['label']"
        />
      </template>
    </div>
  </div>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { PaginationLink } from '@/Types'

// --------------------------------------------------------
// component props
const props = defineProps<{
  links: PaginationLink[]
}>()
</script>
