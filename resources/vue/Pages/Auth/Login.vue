<template>
  <AppLayout title="Login">
    <el-form v-model="form" label-position="top">
      <el-form-item label="Email Address">
        <el-input
          autocomplete="username"
          v-model="form.email"
          :clearable="true"
          required
          autofocus
        />

        <div class="mt-2 text-red-500">
          {{ form.errors.email }}
        </div>
      </el-form-item>

      <el-form-item label="Password">
        <el-input
          v-model="form.password"
          :show-password="true"
          type="password"
          required
        />

        <div class="mt-2 text-red-500">
          {{ form.errors.password }}
        </div>
      </el-form-item>

      <el-form-item>
        <label class="flex items-center">
          <el-checkbox v-model:checked="form.remember" label="Remember me" />
        </label>
      </el-form-item>

      <el-form-item>
        <el-button @click="submit" class="w-full"> Login </el-button>
      </el-form-item>
    </el-form>
  </AppLayout>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { useForm } from '@inertiajs/vue3'

// --------------------------------------------------------
// login form
const form = useForm({
  remember: false,
  password: '',
  email: '',
})

// --------------------------------------------------------
// login action
const submit = () => {
  form.post(route('login.store'), {
    onFinish: () => {
      form.reset('password')
    },
  })
}
</script>
