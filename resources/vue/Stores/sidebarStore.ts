import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useSidebarStore = defineStore(
  'sidebarStore',
  () => {
    // --------------------------------------------------------------
    // state
    const collapsed = ref<boolean>(false)

    // --------------------------------------------------------------
    // actions
    const toggleSidebar = () => {
      collapsed.value = !collapsed.value
    }

    return { collapsed, toggleSidebar }
  },
  { persist: true }
)
