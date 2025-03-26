<template>
  <el-form v-model="form" label-position="top">
    <el-form-item label="Name">
      <el-input v-model="form.name" required autofocus autocomplete="name" />
      <div class="mt-2 text-red-500">
        {{ form.errors.name }}
      </div>
    </el-form-item>

    <el-form-item label="Email Address">
      <el-input v-model="form.email" required autocomplete="username" />
      <div class="mt-2 text-red-500">
        {{ form.errors.email }}
      </div>
    </el-form-item>

    <el-form-item label="Password">
      <el-input
        autocomplete="new-password"
        v-model="form.password"
        type="password"
        required
      />
      <div class="mt-2 text-red-500">
        {{ form.errors.password }}
      </div>
    </el-form-item>

    <el-form-item label="Confirm Password">
      <el-input
        v-model="form.password_confirmation"
        autocomplete="new-password"
        type="password"
        required
      />
      <div class="mt-2 text-red-500">
        {{ form.errors.password_confirmation }}
      </div>
    </el-form-item>

    <el-form-item>
      <el-button @click="submit" class="w-full">Register</el-button>
    </el-form-item>
  </el-form>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useForm } from '@inertiajs/vue3'

// --------------------------------------------------------
// event
const emit = defineEmits(['createUserSuccess'])

// --------------------------------------------------------
// component props
interface CreateUserProps {
  route: string
}

const props = withDefaults(defineProps<CreateUserProps>(), {
  route: 'register.store',
})

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
  form.post(route(props.route), {
    onSuccess: () => {
      form.reset()
      emit('createUserSuccess', (callback: () => void) => {
        callback()
      })
    },
  })
}
</script>
