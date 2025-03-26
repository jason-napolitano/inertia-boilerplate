<template>
  <DashboardLayout title="User Manager">
    <template #heading>
      <el-button size="small" :icon="Plus" @click="toggleCreateDialog">
        Create User
      </el-button>
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
            <div class="text-lg">
              {{ scope.row['name'] }}
            </div>
          </div>
        </template>
      </el-table-column>
      <el-table-column label="Role" width="100">
        <template #default="scope: TableRow">
          <el-button
            v-text="ucFirst(scope.row.roles[0]['name'])"
            class="w-full"
            size="small"
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

  <ElDialog v-model="createDialogVisible">
    <CreateUser route="users.store" @createUserSuccess="toggleCreateDialog" />
  </ElDialog>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import CreateUser from '@/Pages/Partials/Forms/CreateUser.vue'
import { Delete, UserFilled } from '@element-plus/icons-vue'
import { PaginatedResults, User, PageProps } from '@/Types'
import 'element-plus/es/components/notification/style/css'
import Pagination from '@/Components/Pagination.vue'
import { useString } from '@/Composables/useString'
import { useDate } from '@/Composables/useDate'
import { ElNotification } from 'element-plus'
import { Image, Plus } from 'lucide-vue-next'
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
const { ucFirst } = useString()

// --------------------------------------------------------
// date formatting
const date = useDate()

// --------------------------------------------------------
// user deletion
const deleteUser = (user: User): void => {
  if (user.id !== auth.user.id) {
    // @ts-expect-error Expected ziggy error
    router.delete(route('users.destroy', user))
  } else {
    ElNotification({
      message: 'This user cannot be deleted.',
      type: 'error',
    })
  }
}

// --------------------------------------------------------
// user creation
const createDialogVisible = ref<boolean>(false)

const toggleCreateDialog = () =>
  (createDialogVisible.value = !createDialogVisible.value)
</script>
