<script setup>
import Revisions from "./Revisions/Index.vue";

defineProps({
  vehicle: {
    type: Object,
    default: () => {
    }
  },
})

</script>

<template>
  <div class="bg-white rounded-lg shadow border border-gray-150 p-4 mx-auto w-[90vw] mb-4">
    <div>
      Marca: {{ vehicle.brand }}
    </div>
    <div>
      Modelo: {{ vehicle.model }}
    </div>
    <div>
      Ano: {{ vehicle.year }}
    </div>
    <div>
      Placa: {{ vehicle.plate }}
    </div>
  </div>
  <Revisions :vehicle="vehicle"/>
</template>

<style scoped>

</style>
