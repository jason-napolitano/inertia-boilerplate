<template>
  <Head :title="props.title ? ' - ' + props.title : ''" />
  <!-- Main Content Area -->
  <main class="flex h-screen">
    <!-- Sidebar -->
    <Sidebar />

    <!-- Content Section -->
    <section class="flex-1 flex flex-col">
      <!-- Top Navigation Bar -->
      <DashboardNavbar />

      <!-- Content Heading -->
      <Heading :breadcrumb-text="props.title">
        <slot name="heading" />
      </Heading>

      <!-- Content Container -->
      <Container>
        <section
          class="flex flex-1 flex-col p-2 h-full justify-between space-y-4"
        >
          <div class="px-2" v-if="!slotEmpty('top')">
            <slot name="top" />
          </div>
          <div class="relative flex-1">
            <div
              class="absolute inset-0 custom-scrollbar overflow-y-scroll p-2 space-y-2"
            >
              <slot />
            </div>
          </div>
          <div class="px-2" v-if="!slotEmpty('bottom')">
            <slot name="bottom" />
          </div>
        </section>
      </Container>
    </section>
  </main>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import Container from './Partials/Dashboard/Content/Container.vue'
import Heading from '@/Layouts/Partials/Dashboard/Heading.vue'
import DashboardNavbar from './Partials/Dashboard/Navbar.vue'
import Sidebar from './Partials/Dashboard/Sidebar.vue'
import { useApp } from '@/Composables/useApp'
import { Head } from '@inertiajs/vue3'

// --------------------------------------------------------
// component props
interface ComponentProps {
  title: string | null
}

const props = withDefaults(defineProps<ComponentProps>(), {
  title: null,
})

// --------------------------------------------------------
// component props
const { slotEmpty } = useApp()
</script>
