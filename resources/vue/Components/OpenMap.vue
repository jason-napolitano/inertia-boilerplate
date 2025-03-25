<template>
  <Map.OlMap
    v-if="props.address && props.address != ''"
    :loadTilesWhileInteracting="true"
    :loadTilesWhileAnimating="true"
    v-loading="!center.length"
    class="h-[29rem]"
  >
    <Map.OlView
      :projection="projection"
      class="min-h-80"
      :center="center"
      :zoom="zoom"
      ref="view"
    />
    <Layers.OlTileLayer>
      <Sources.OlSourceOsm />
    </Layers.OlTileLayer>

    <MapControls.OlZoomsliderControl v-if="props.showZoomBar" />
  </Map.OlMap>
  <div class="no-map" v-else>
    <el-icon>
      <DeleteLocation />
    </el-icon>
  </div>
</template>

<script setup lang="ts">
// --------------------------------------------------------
// imports
import { Layers, Map, MapControls, Sources } from 'vue3-openlayers'
import { OpenStreetMapProvider } from 'leaflet-geosearch'
import { DeleteLocation } from '@element-plus/icons-vue'
import { onBeforeMount, ref } from 'vue'

// --------------------------------------------------------
// props
interface ComponentProps {
  showZoomBar?: boolean
  address?: string
}

const props = withDefaults(defineProps<ComponentProps>(), {
  showZoomBar: true,
})

// --------------------------------------------------------
// map references
const projection = ref('EPSG:4326')
const center = ref<number[]>([])
const zoom = ref<number>(17.5)

// --------------------------------------------------------
// reverse geolocation
onBeforeMount(async () => {
  // instantiate the provider
  const provider: OpenStreetMapProvider = new OpenStreetMapProvider()

  // generate the results
  let results = await provider.search({ query: props.address })

  // assign the center reference of the map
  center.value = [results[0].x, results[0].y]
})
</script>

<style scoped>
.no-map {
  @apply border-stone-200
    text-stone-400
    justify-center
    bg-stone-100
    w-full
    items-center
    text-6xl
    rounded
    border
    flex;
}
</style>
