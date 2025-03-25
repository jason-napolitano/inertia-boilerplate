export function useRoute() {
  /** --------------------------------------------
   * Returns a boolean if the current route matches
   * the route passed through
   *
   * @param {string} to
   *
   * @returns {boolean}
   */
  const current = (to: string): boolean => route().current(to)

  return { current }
}
