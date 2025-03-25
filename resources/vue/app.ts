import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import { createApp, DefineComponent, h } from 'vue'
import { createPinia } from 'pinia'

// --------------------------------------------------------
// css
import 'element-plus/theme-chalk/dark/css-vars.css'
import '../assets/css/app.css'

// --------------------------------------------------------
// layouts
import AppLayout from '@/Layouts/AppLayout.vue'
import Dashboard from '@/Layouts/Dashboard.vue'

// --------------------------------------------------------
// local variable(s)
const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

// --------------------------------------------------------
// pinia
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

// --------------------------------------------------------
// app instance
createInertiaApp({
  title: (title) => `${appName} ${title}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob<DefineComponent>('./Pages/**/*.vue')
    ),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('DashboardLayout', Dashboard)
      .component('AppLayout', AppLayout)
      .component('Link', Link)
      .use(ZiggyVue)
      .use(pinia)
      .use(plugin)
      .mount(el)
  },
  // progress: false,
  progress: {
    color: '#29d',
    delay: 250,
  },
}).then()
