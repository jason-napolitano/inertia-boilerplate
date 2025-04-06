<template>
  <DashboardLayout title="User Manager">
    <template #heading>
      <el-button size="small" :icon="Plus" @click="toggleCreateDialog">
        Create User
      </el-button>
    </template>
    <template #top>
      <div class="flex justify-end">
        <div class="">
          <el-input
            placeholder="Search by name or email..."
            @change="searchUser"
            v-model="search"
            size="small"
          >
            <template #suffix>
              <ElTooltip content="Reset Search" placement="left">
                <ElIcon @click="resetSearch" class="cursor-pointer">
                  <Refresh />
                </ElIcon>
              </ElTooltip>
            </template>
          </el-input>
        </div>
      </div>
    </template>
    <el-table :data="props.users['data']" border stripe>
      <el-table-column label="Name" sortable>
        <template #default="scope: TableRow">
          <div class="flex justify-start space-x-2 items-center">
            <div class="max-w-3.5 min-w-3.5">
              <el-image
                class="rounded-full max-h-3.5 min-w-3.5 mt-1.5"
                :src="scope.row['profile_image']"
              >
                <template #error>
                  <span>
                    <el-icon>
                      <Image />
                    </el-icon>
                  </span>
                </template>
              </el-image>
            </div>
            <div class="lg">
              {{ scope.row['name'] }}
            </div>
          </div>
        </template>
      </el-table-column>
      <el-table-column label="Role" width="150">
        <template #default="scope: TableRow">
          <span
            v-text="toTitleCase(removeUnderscores(scope.row.roles[0]['name']))"
          />
        </template>
      </el-table-column>
      <el-table-column prop="email" label="Email Address" sortable />
      <el-table-column label="Created">
        <template #default="scope: TableRow">
          {{ date.timeAgo(scope.row.created_at) }}
        </template>
      </el-table-column>
      <el-table-column label="Updated">
        <template #default="scope: TableRow">
          {{ date.timeAgo(scope.row.updated_at) }}
        </template>
      </el-table-column>
      <el-table-column label="Actions" width="100">
        <template #default="scope: TableRow">
          <el-button-group size="small">
            <Link
              :href="route('users.show', scope.row)"
              class="el-button el-button--small"
            >
              <el-icon>
                <UserFilled />
              </el-icon>
            </Link>
            <el-button type="danger" @click="deleteUser(scope.row)">
              <el-icon>
                <Delete />
              </el-icon>
            </el-button>
          </el-button-group>
        </template>
      </el-table-column>
    </el-table>
    <template #bottom>
      <pagination :links="props.users['links']" />
    </template>
  </DashboardLayout>

  <ElDialog v-model="createDialogVisible" :show-close="false">
    <template #header="{ close, titleId, titleClass }">
      <div class="my-header">
        <div class="flex justify-between" :class="titleClass" :id="titleId">
          <div class="flex justify-start space-x-2 items-center">
            <div>
              <UserRoundPlus class="w-4" />
            </div>
            <div>Create New User</div>
          </div>
          <div class="cursor-pointer">
            <X @click="close" class="w-4" />
          </div>
        </div>
      </div>
    </template>
    <CreateUser
      route="users.store"
      @createUserSuccess="toggleCreateDialog"
      button-text="Create User"
    />
  </ElDialog>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { Delete, Refresh, UserFilled } from '@element-plus/icons-vue'
import { Image, Plus, UserRoundPlus, X } from 'lucide-vue-next'
import CreateUser from '@/Pages/Partials/Forms/CreateUser.vue'
import { PaginatedResults, User, PageProps } from '@/Types'
import { ElNotification, ElMessageBox } from 'element-plus'
import 'element-plus/es/components/notification/style/css'
import 'element-plus/es/components/message-box/style/css'
import Pagination from '@/Components/Pagination.vue'
import { useString } from '@/Composables/useString'
import { useDate } from '@/Composables/useDate'
import { router } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

// --------------------------------------------------------
// table row interface
interface TableRow {
  row: User
}

// --------------------------------------------------------
// shared data
const { auth } = usePage().props as PageProps

// --------------------------------------------------------
// component props
interface ComponentProps {
  users: PaginatedResults
}

const props = defineProps<ComponentProps>()

// --------------------------------------------------------
// string formatting
const { toTitleCase, removeUnderscores } = useString()

// --------------------------------------------------------
// date formatting
const date = useDate()

// --------------------------------------------------------
// user deletion
const deleteUser = (user: User): void => {
  ElMessageBox.confirm('This will permanently delete the user. Continue?', {
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    type: 'warning',
  }).then(() => {
    if (user.id !== auth.user.id) {
      // @ts-expect-error Expected ziggy error
      router.delete(route('users.destroy', user))
    } else {
      ElNotification({
        message: 'This user cannot be deleted.',
        type: 'error',
      })
    }
  })
}

// --------------------------------------------------------
// user creation
const createDialogVisible = ref<boolean>(false)

const toggleCreateDialog = () =>
  (createDialogVisible.value = !createDialogVisible.value)

// --------------------------------------------------------
// query filtration
const search = ref(null)

const resetSearch = () => {
  search.value = null
  searchUser(search.value)
}

const searchUser = (value: string | null): void => {
  router.visit(route('users.index'), {
    data: {
      'filter[users]': value,
    },
    showProgress: false,
    preserveState: true,
  })
}
</script>
