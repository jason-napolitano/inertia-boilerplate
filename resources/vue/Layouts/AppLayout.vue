<template>
  <Head :title="props.title ? ' - ' + props.title : ''" />
  <Navbar />
  <ContentContainer>
    <section class="flex flex-col space-y-4">
      <FlashMessage />
      <slot />
    </section>
  </ContentContainer>
  <AppFooter />
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import ContentContainer from '@/Layouts/Partials/AppLayout/Content/Container.vue'
import FlashMessage from '@/Layouts/Partials/FlashMessage.vue'
import AppFooter from './Partials/AppLayout/Footer.vue'
import Navbar from './Partials/AppLayout/Navbar.vue'
import { Head } from '@inertiajs/vue3'

// --------------------------------------------------------
// component props
interface ComponentProps {
  title: string | null
}

const props = withDefaults(defineProps<ComponentProps>(), {
  title: null,
})
</script>
