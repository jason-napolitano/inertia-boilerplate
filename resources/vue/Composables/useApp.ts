import { useSlots } from 'vue'

export function useApp() {
  // ---------------------------------------------
  // composables
  const slots = useSlots()

  /**
   * Checks to determine if a slot is empty
   *
   * @param {string} slot
   *
   * @returns {boolean}
   */
  const slotEmpty = (slot: string): boolean =>
    !slots[slot] || slots[slot]().length === 0

  return { slotEmpty }
}
