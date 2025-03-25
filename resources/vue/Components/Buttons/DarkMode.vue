<template>
  <el-text @click.prevent="toggleDarkMode()" class="cursor-pointer">
    <slot name="dark" v-if="!isDark">
      <el-icon>
        <Moon />
      </el-icon>
    </slot>
    <slot v-else name="light">
      <el-icon>
        <Sunny />
      </el-icon>
    </slot>
  </el-text>
</template>

<script setup lang="ts">
import { useDarkMode } from '@/Composables/useDarkMode'
import { Moon, Sunny } from '@element-plus/icons-vue'

const { isDark, toggleDarkMode } = useDarkMode()
</script>
