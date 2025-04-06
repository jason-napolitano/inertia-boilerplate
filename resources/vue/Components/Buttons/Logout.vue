<template>
  <span @click="logoutAction" class="cursor-pointer">
    <slot> Logout </slot>
  </span>
</template>

<script setup lang="ts">
import 'element-plus/es/components/message-box/style/css'
import { ElMessageBox } from 'element-plus'
import { router } from '@inertiajs/vue3'

const logoutAction = () => {
  ElMessageBox.confirm('This will terminate your current session. Continue?', {
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel'
  }).then(() => {
    router.post(route('logout'), {
      preserveScroll: true,
      preserveState: true,
    })
  })
}
</script>
