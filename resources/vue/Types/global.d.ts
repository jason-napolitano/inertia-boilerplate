import { PageProps as InertiaPageProps } from '@inertiajs/core'
import { PageProps as AppPageProps } from './'
import { route as ziggyRoute } from 'ziggy-js'

declare global {
  interface Window {
    // ...
  }

  /* eslint-disable no-var */
  let route: typeof ziggyRoute
}

declare module 'vue' {
  interface ComponentCustomProperties {
    route: typeof ziggyRoute
  }
}

declare module '@inertiajs/core' {
  interface PageProps extends InertiaPageProps, AppPageProps {}
}
