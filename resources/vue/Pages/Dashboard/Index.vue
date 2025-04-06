<template>
  <DashboardLayout title="Dashboard Index">
    <section>
      <el-divider>Application Information</el-divider>

      <div class="grid grid-cols-3 gap-2">
        <Card :icon="MonitorDot">
          <template #header>Client</template>
          Vue {{ version }}
        </Card>
        <Card :icon="Server">
          <template #header>Server</template>
          PHP {{ props.server.version }}
        </Card>
        <Card :icon="Database">
          <template #header>Database</template>
          {{ props.server.database['driver'] }}
          {{ props.server.database['version'] }}
        </Card>
      </div>
    </section>
  </DashboardLayout>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { MonitorDot, Server, Database } from 'lucide-vue-next'
import Card from '@/Components/Card.vue'
import { version } from 'vue'

// --------------------------------------------------------
// component props

type server = {
  software: string | number
  database: {
    version: string
    driver: string
  }
}

const props = defineProps<{
  server: server
}>()
</script>
