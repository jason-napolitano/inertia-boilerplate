<template>
  <header>
    <div class="flex justify-between items-center px-4 py-2 min-h-10">
      <el-breadcrumb :separator-icon="ArrowRight">
        <el-breadcrumb-item>Dashboard</el-breadcrumb-item>
        <el-breadcrumb-item v-if="props.breadcrumbText">
          {{ breadcrumbText }}
        </el-breadcrumb-item>
      </el-breadcrumb>
      <div class="flex text-sm justify-between items-center">
        <slot />
      </div>
    </div>
  </header>
</template>
<script setup lang="ts">
// --------------------------------------------------------
// imports
import { ArrowRight } from '@element-plus/icons-vue'

// --------------------------------------------------------
// component props
const props = withDefaults(
  defineProps<{
    breadcrumbText: string | null
  }>(),
  {
    breadcrumbText: null,
  }
)
</script>

<style scoped>
header {
  @apply bg-white
    dark:border-stone-600/60
    dark:bg-[#262727]
    text-stone-400
    border-b;
}
</style>
