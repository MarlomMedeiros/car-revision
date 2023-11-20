<script setup>
import Revisions from "./Revisions/Index.vue";
import Layout from "../../Layout.vue";
defineProps({
  vehicle: {
    type: Object,
    default: () => {
    }
  },
})

</script>

<template>
  <Layout>
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
  </Layout>
</template>

<style scoped>

</style>
