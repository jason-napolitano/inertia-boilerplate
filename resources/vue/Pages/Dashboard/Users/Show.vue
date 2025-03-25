<template>
  <DashboardLayout title="Profile">
    <section class="flex space-x-4">
      <div class="w-1/6">
        <div class="img-container">
          <el-image
            :src="props.user['profile_image']"
            class="img"
            fit="cover"
            lazy
          >
            <template #placeholder>
              <div class="image-slot">
                <el-icon class="animate-spin">
                  <Refresh />
                </el-icon>
              </div>
            </template>
            <template #error>
              <div class="image-slot">
                <el-icon>
                  <Picture />
                </el-icon>
              </div>
            </template>
          </el-image>
          <div class="img-footer">
            Joined: {{ date.timeAgo(props.user['created_at']) }}
          </div>
        </div>
      </div>
      <div class="w-5/6 flex flex-col space-y-4">
        <FlashMessage :closable="false" />
        <el-tabs type="border-card">
          <el-tab-pane>
            <template #label>
              <span class="tab-label">
                <el-icon>
                  <UserPen />
                </el-icon>
                <span>Profile Information</span>
              </span>
            </template>
            <section class="flex flex-col space-y-4">
              <el-form
                @submit.prevent="submitForm"
                label-position="top"
                v-model="form"
              >
                <el-row>
                  <el-col :span="24">
                    <el-col :span="24">
                      <div class="divider">
                        <span>
                          <Highlighter class="divider-icon" />
                        </span>
                        <span>Basic Information</span>
                      </div>
                    </el-col>
                  </el-col>
                </el-row>
                <el-row :gutter="8">
                  <el-col :span="8">
                    <el-form-item label="Name">
                      <el-input
                        :placeholder="props.user['name']"
                        v-model="form.name"
                        autocomplete="off"
                        class="w-full"
                      />

                      <div class="mt-2 text-red-500" v-if="form.errors['name']">
                        {{ form.errors['name'] }}
                      </div>
                    </el-form-item>
                  </el-col>

                  <el-col :span="8">
                    <el-form-item label="Email Address">
                      <el-input
                        :placeholder="props.user['email']"
                        v-model="form.email"
                        autocomplete="off"
                        class="w-full"
                      />

                      <div
                        class="mt-2 text-red-500"
                        v-if="form.errors['email']"
                      >
                        {{ form.errors['email'] }}
                      </div>
                    </el-form-item>
                  </el-col>

                  <el-col :span="8">
                    <el-form-item label="Phone Number">
                      <el-input
                        v-maska="'# (###)-###-#### EXT: #####'"
                        :placeholder="props.user['phone']"
                        v-model="form.phone"
                        autocomplete="off"
                        class="w-full"
                      />

                      <div
                        class="mt-2 text-red-500"
                        v-if="form.errors['phone']"
                      >
                        {{ form.errors['phone'] }}
                      </div>
                    </el-form-item>
                  </el-col>
                </el-row>

                <el-row>
                  <el-col :span="24">
                    <el-col :span="24">
                      <div class="divider">
                        <span>
                          <BookUser class="divider-icon" />
                        </span>
                        <span>Contact Information</span>
                      </div>
                    </el-col>
                  </el-col>
                </el-row>

                <el-row :gutter="8">
                  <el-col :span="12">
                    <el-form-item label="Address">
                      <el-input
                        :placeholder="props.user['address']"
                        v-model="form.address"
                        autocomplete="off"
                        class="w-full"
                      />

                      <div
                        class="mt-2 text-red-500"
                        v-if="form.errors['address']"
                      >
                        {{ form.errors['address'] }}
                      </div>
                    </el-form-item>
                  </el-col>

                  <el-col :span="12">
                    <el-form-item label="Country / Region">
                      <el-select v-model="form.country">
                        <el-option value="United States">
                          United States
                        </el-option>
                      </el-select>

                      <div
                        class="mt-2 text-red-500"
                        v-if="form.errors['country']"
                      >
                        {{ form.errors['country'] }}
                      </div>
                    </el-form-item>
                  </el-col>
                </el-row>

                <el-row>
                  <el-col :span="24">
                    <button type="submit" class="el-button w-full">
                      Submit Profile Data
                    </button>
                  </el-col>
                </el-row>
              </el-form>
            </section>
          </el-tab-pane>

          <el-tab-pane label="Profile Image">
            <form
              @submit.prevent="uploadImage"
              class="flex flex-col space-y-4"
              enctype="multipart/form-data"
            >
              <input
                class="border rounded-sm px-2 py-1 file:text-sm"
                @input="handleFileChange"
                type="file"
              />
              <button type="submit" class="el-button w-full">
                Upload Image
              </button>
            </form>
          </el-tab-pane>
        </el-tabs>
      </div>
    </section>
  </DashboardLayout>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { Highlighter, BookUser, UserPen } from 'lucide-vue-next'
import FlashMessage from '@/Layouts/Partials/FlashMessage.vue'
import 'element-plus/es/components/button/style/css'
import { Refresh } from '@element-plus/icons-vue'
import { useDate } from '@/Composables/useDate'
import { useForm } from '@inertiajs/vue3'
import { vMaska } from 'maska/vue'
import { User } from '@/Types'

// --------------------------------------------------------
// component props
const props = defineProps<{
  user: User
}>()

// --------------------------------------------------------
// composables
const date = useDate()

// --------------------------------------------------------
// edit form
const form = useForm({
  profile_image: null,
  country: null,
  address: null,
  phone: null,
  email: null,
  name: null,
})

const submitForm = () => {
  // @ts-expect-error Expected Ziggy error
  form.patch(route('users.update', props.user), {
    onSuccess: () => form.reset(),
  })
}

// --------------------------------------------------------
// profile image
const imageForm = useForm({
  profile_image: null,
})

const handleFileChange = (event: any) => {
  imageForm.profile_image = event.target.files[0]
}

const uploadImage = () => {
  // @ts-expect-error expected ziggy error
  imageForm.post(route('users.photo', props.user))
}
</script>

<style scoped>
.img-footer {
  @apply rounded-b-sm
    dark:border-stone-600/60
    text-center text-sm
    dark:bg-[#1D1E1F]
    text-neutral-400
    bg-white p-2
    border;
}

.img {
  min-height: 200px;
  max-height: 200px;
  @apply dark:border-stone-600/60
    rounded-t-sm
    border-b-0
    border;
}

.img-container {
  @apply flex flex-col;
}

.tab-label {
  @apply flex space-x-2 items-center;
}

.image-slot {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  min-height: 200px;
  max-height: 200px;
  background: var(--el-fill-color-light);
  color: var(--el-text-color-secondary);
  font-size: 3rem;
}

.divider {
  @apply py-2 my-4 border-b border-stone-200 dark:border-stone-500 flex justify-start space-x-2 items-center;
}

.divider-icon {
  @apply w-4;
}
</style>
