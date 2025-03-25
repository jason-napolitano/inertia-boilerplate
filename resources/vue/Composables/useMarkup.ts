import { useRoute } from './useRoute'

export function useMarkup() {
  // ---------------------------------------------
  // current route
  const { current } = useRoute()

  /** --------------------------------------------
   * Returns a class name if the route passed through
   * matches th current route
   *
   * @param route       {string}
   * @param activeClass {string}
   *
   * @returns {string}
   */
  const activeClass = (
    route: string,
    activeClass: string = 'is-active'
  ): string => (current(route) ? activeClass : '')

  return { activeClass }
}
