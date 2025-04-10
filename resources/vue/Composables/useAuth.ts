// @ts-nocheck
import { usePage } from '@inertiajs/vue3'
import { PageProps } from '@/types'

export function useAuth() {
  // ---------------------------------------------
  // auth object
  let { auth } = usePage().props as PageProps

  /** --------------------------------------------
   * Can a user perform a certain action (or actions)?
   *
   * @param permissions {string|string[]}
   *
   * @returns {boolean}
   */
  function can(permissions: string[] | string): boolean {
    // if the permissions prop passed by inertia is not
    // an empty array
    if (auth.permissions != []) {
      // generate an empty data array
      let data: string[] = []

      // add permission names to that array
      auth.permissions.forEach((prop: { name: string }) => {
        data.push(prop.name.toLowerCase())
      })

      // if `permissions` is a string
      if (typeof permissions === 'string') {
        // run this check
        return data.includes(permissions) || data.includes('*')
      }
      // otherwise, run this check
      return (
        permissions.every((permission: string) => data.includes(permission)) ||
        data.includes('*')
      )
    }
    // if the permissions prop passed by inertia is not set
    // default to false
    return false
  }

  return { can }
}
