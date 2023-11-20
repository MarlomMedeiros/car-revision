<script setup>

const prop = defineProps({
  revision: {
    type: Object,
    default: () => {
    }
  },
})
</script>

<template>
  <div class="bg-white rounded-lg shadow border border-gray-150 p-4 mx-auto w-[90vw] mb-4 text-center">
    <div class="flex justify-center items-start">

      <div class="mx-8 text-left">
        <div class="font-bold">
          Veículo
        </div>
        <div>
          Marca: {{ revision.vehicle.brand }}
        </div>
        <div>
          Modelo: {{ revision.vehicle.model }}
        </div>
        <div>
          Ano: {{ revision.vehicle.year }}
        </div>
        <div>
          Placa: {{ revision.vehicle.plate }}
        </div>
      </div>

      <div class="mx-8 text-left">
        <div class="font-bold">
          Revisão
        </div>
        <div>
          Data: {{ revision.date }}
        </div>
        <div>
          Descrição: {{ revision.description }}
        </div>
        <div>
          Custo: {{ revision.cost }}
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>

</style>
