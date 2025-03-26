<template>
  <AppLayout title="Register">
    <CreateUser />
  </AppLayout>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import CreateUser from '@/Pages/Partials/Forms/CreateUser.vue'
import { useForm } from '@inertiajs/vue3'

// --------------------------------------------------------
// registration form
const form = useForm({
  password_confirmation: '',
  password: '',
  email: '',
  name: '',
})

// --------------------------------------------------------
// registration action
const submit = () => {
  form.post(route('register.store'), {
    onSuccess: () => {
      form.reset()
    },
  })
}
</script>
