<template>
  <DashboardLayout :title="props.user.name">
    <template #heading v-if="props.user['id'] == auth.user['id']">
      <Logout>
        <div class="flex items-center justify-start space-x-1">
          <span>Account Logout</span>
          <LogOut class="h-[0.75rem]"></LogOut>
        </div>
      </Logout>
    </template>
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
                  <ImageOff />
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
          <!-- profile information tab -->
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
          <!-- ./profile information tab -->

          <!-- profile image tab -->
          <el-tab-pane>
            <template #label>
              <span class="tab-label">
                <el-icon>
                  <ImageUp />
                </el-icon>
                <span>Profile Image</span>
              </span>
            </template>
            <div class="flex flex-col space-y-2">
              <div class="flex justify-end">
                <el-button
                  :disabled="props.user['profile_image'] == ''"
                  @click="deleteCurrentProfilePhoto"
                  :icon="Delete"
                  type="danger"
                  size="small"
                >
                  Delete Current Image
                </el-button>
              </div>
              <form
                @submit.prevent="uploadImage"
                class="flex flex-col space-y-4"
                enctype="multipart/form-data"
              >
                <div
                  class="relative flex flex-col hover:text-[#2E8EFF] text-stone-400 border border-stone-200 border-dashed dark:border-stone-700 rounded cursor-pointer"
                >
                  <input
                    class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                    @change="handleFileChange"
                    type="file"
                    multiple
                  />

                  <div
                    class="flex flex-col items-center justify-center py-10 text-center"
                  >
                    <p class="m-0">
                      Drag your files here or click in this area.
                    </p>
                    <p class="mt-2 text-xs dark:text-stone-500">
                      <strong>{{ currentImage }}</strong>
                    </p>
                  </div>
                </div>

                <div
                  class="flex justify-center items-center space-x-1 mt-4 text-red-500"
                  v-if="imageForm.errors['profile_image']"
                >
                  <div>
                    <FileWarning class="h-4" />
                  </div>
                  <div>
                    {{ imageForm.errors['profile_image'] }}
                  </div>
                </div>
                <button type="submit" class="el-button w-full">
                  Upload Image
                </button>
              </form>
            </div>
          </el-tab-pane>
          <!-- ./profile image tab -->

          <!-- appearance tab -->
          <el-tab-pane>
            <template #label>
              <span class="tab-label">
                <el-icon>
                  <LayoutList />
                </el-icon>
                <span>Appearance</span>
              </span>
            </template>
            <AlertBox class="text-sm" :timeout="null" :closable="false">
              These settings are stored locally in your browser using
              <a
                href="https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage"
                class="underline"
                target="_blank"
                >local storage</a
              >. They will be reset if you clear your browser's history using
              third-party cleaning applications, or your browser's built in
              history management features.
            </AlertBox>
            <el-row :gutter="8">
              <el-col :span="8">
                <div class="divider">
                  <span>
                    <SunMoon class="divider-icon" />
                  </span>
                  <span>Dark / Light Mode</span>
                </div>
                <div>
                  <DarkMode>
                    <template #light>
                      <el-button class="w-full">Toggle Light Mode</el-button>
                    </template>
                    <template #dark>
                      <el-button class="w-full">Toggle Dark Mode</el-button>
                    </template>
                  </DarkMode>
                </div>
              </el-col>

              <!--
              <el-col :span="8">
                <div class="divider">
                  <span>
                    <SunMoon class="divider-icon" />
                  </span>
                  <span>Sidebar Visibility</span>
                </div>
                <div>
                    <el-button class="w-full" @click="sidebar.toggleIsShown">Toggle Sidebar</el-button>
                </div>
              </el-col>
                -->
            </el-row>
          </el-tab-pane>
          <!-- ./appearance tab -->
        </el-tabs>
      </div>
    </section>
  </DashboardLayout>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { Delete, InfoFilled, Refresh } from '@element-plus/icons-vue'
import FlashMessage from '@/Layouts/Partials/FlashMessage.vue'
import { useForm, router, usePage } from '@inertiajs/vue3'
import 'element-plus/es/components/message-box/style/css'
import DarkMode from '@/Components/Buttons/DarkMode.vue'
import Logout from '@/Components/Buttons/Logout.vue'
import 'element-plus/es/components/button/style/css'
import AlertBox from '@/Components/AlertBox.vue'
import { useDate } from '@/Composables/useDate'
import { ElMessageBox } from 'element-plus'
import { User, PageProps } from '@/Types'
import { vMaska } from 'maska/vue'
import { computed } from 'vue'
import {
  Highlighter,
  FileWarning,
  LayoutList,
  ImageOff,
  BookUser,
  UserPen,
  ImageUp,
  SunMoon,
  LogOut,
} from 'lucide-vue-next'

// --------------------------------------------------------
// component props
const props = defineProps<{
  user: User
}>()

// --------------------------------------------------------
// composables
const { auth } = usePage().props as PageProps

// --------------------------------------------------------
// composables
const date = useDate()

// --------------------------------------------------------
// edit form
const form = useForm({
  country: props.user['country'],
  profile_image: null,
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
  imageForm.post(route('users.photo', props.user), {
    onSuccess: () => imageForm.reset(),
    showProgress: false,
  })
}

const currentImage = computed(() =>
  imageForm.profile_image
    ? imageForm.profile_image['name']
    : 'No image selected'
)

const deleteCurrentProfilePhoto = () => {
  ElMessageBox.confirm('This will permanently delete the file. Continue?', {
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    type: 'warning',
  }).then(() => {
    // @ts-expect-error Expected ziggy error
    router.delete(route('users.photo.delete', props.user), {
      preserveScroll: true,
      preserveState: true,
      showProgress: false,
    })
  })
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
  min-height: 175px;
  max-height: 175px;
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
  background: var(--el-fill-color-light);
  color: var(--el-text-color-secondary);
  justify-content: center;
  align-items: center;
  min-height: 175px;
  max-height: 175px;
  font-size: 3rem;
  display: flex;
  width: 100%;
}

.divider {
  @apply border-stone-200
    dark:border-stone-500
    justify-start
    items-center
    space-x-2
    border-b
    py-2
    my-4
    flex;
}

.divider-icon {
  @apply w-4;
}
</style>
