<template>
  <div v-if="props.links.length > 3">
    <div class="flex">
      <template v-for="(link, key) in props.links" :key="key">
        <div
          v-if="link['url'] === null"
          class="no-underline px-2 py-1 text-sm text-gray-600 border rounded-0 dark:border-stone-700 cursor-not-allowed"
          v-html="link['label']"
        />
        <div
          @click="changePage(link)"
          v-else
          class="no-underline cursor-pointer px-2 py-1 text-sm border rounded-0 dark:border-stone-700"
          :class="{
            'bg-[#F5F7FA] dark:bg-[#262727] text-stone-600 dark:text-stone-200':
              link.active,
          }"
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
import { router } from '@inertiajs/vue3'

// --------------------------------------------------------
// component props
const props = defineProps<{
  links: PaginationLink[]
}>()

// --------------------------------------------------------
// change page
const changePage = (link: PaginationLink) => {
  router.visit(link['url'], {
    preserveState: true,
    showProgress: false,
    replace: false,
  })
}
</script>
