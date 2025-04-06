import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useSidebarStore = defineStore(
  'sidebarStore',
  () => {
    // --------------------------------------------------------------
    // state

    // is the sidebar collapsed?
    const collapsed = ref<boolean>(true)

    // is the sidebar shown?
    const isShown = ref<boolean>(false)

    // --------------------------------------------------------------
    // actions

    const toggleSidebar = () => {
      collapsed.value = !collapsed.value
    }

    const toggleIsShown = () => {
      if (collapsed.value === true) {
        collapsed.value = false
      }
      isShown.value = !isShown.value
    }

    return { collapsed, toggleSidebar, isShown, toggleIsShown }
  },
  { persist: true }
)
