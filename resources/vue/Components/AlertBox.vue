<template>
  <transition name="fade">
    <div :class="props.type" v-if="alertVisible" class="alert" role="alert">
      <div class="flex justify-start items-center space-x-2">
        <el-icon v-if="props.showIcon">
          <icon />
        </el-icon>
        <span v-if="props.text" v-text="props.text" class="text-justify" />
        <span v-else class="text-justify"><slot /></span>
      </div>
      <span v-if="props.closable" class="close">
        <X class="cursor-pointer" @click="updateAlertStatus" />
      </span>
    </div>
  </transition>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { ref, computed, onMounted } from 'vue'
import { CircleCheck, CircleAlert, CircleX, Info, X } from 'lucide-vue-next'

// --------------------------------------------------------
// alert types
enum AlertType {
  SUCCESS = 'success',
  WARNING = 'warning',
  NEUTRAL = 'neutral',
  ERROR = 'error',
  INFO = 'info',
}

// --------------------------------------------------------
// component props
interface ComponentProps {
  timeout: number | null
  text: string | null
  showIcon: boolean
  closable: boolean
  type: AlertType
}

const props = withDefaults(defineProps<ComponentProps>(), {
  type: AlertType.INFO,
  showIcon: true,
  closable: true,
  timeout: 3500,
  text: null,
})

// --------------------------------------------------------
// icon type
const icon = computed(() => {
  if (props.type === AlertType.INFO) {
    return Info
  }
  if (props.type === AlertType.SUCCESS) {
    return CircleCheck
  }
  if (props.type === AlertType.ERROR) {
    return CircleX
  }
  if (props.type === AlertType.WARNING) {
    return CircleAlert
  }
})

// --------------------------------------------------------
// close alert
const alertVisible = ref(true)

const updateAlertStatus = () => (alertVisible.value = false)

// set timer
onMounted(() => {
  if (props.timeout) {
    setTimeout(() => {
      updateAlertStatus()
    }, props.timeout as number)
  }
})
</script>

<style scoped>
.alert {
  @apply flex justify-between p-2 rounded text-white space-x-2;
}

.success {
  @apply dark:bg-green-700 bg-green-700/80;
}

.warning {
  @apply dark:bg-orange-500 bg-orange-500/80;
}

.neutral {
  @apply dark:bg-neutral-300 bg-neutral-500/80;
}

.error {
  @apply dark:bg-red-500 bg-red-500/80;
}

.info {
  @apply dark:bg-sky-600 bg-sky-600/80;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
