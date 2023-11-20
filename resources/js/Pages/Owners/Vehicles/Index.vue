<script setup>
import {router, Link} from "@inertiajs/vue3";

const prop = defineProps({
  owner: {
    type: Object,
    default: () => []
  },
})

function destroy(vehicle) {
  if (confirm('Tem certeza que deseja excluir este veículo?')) {
    router.delete(`${prop.owner.id}/vehicles/${vehicle.id}`)
  }
}

</script>
<template>
  <div class="bg-white rounded-lg shadow border border-gray-150 md:p-4 mx-auto md:w-[90vw] md:h-[50vh] w-full h-full p-2">
    <div class="flex flex-row justify-between">
      <div class="flex flex-row">
        <a class="text-2xl font-bold text-black">
          Veículos
        </a>
      </div>
      <div class="mb-4 mr-4">
        <Link :href="`/owners/${owner.id}/vehicles/create`"
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
          Registrar um novo veículo
        </Link>
      </div>
    </div>


    <div v-if="owner.vehicles.length === 0" class="text-center text-gray-500 bg-gray-200 p-4 rounded-lg shadow border border-gray-150 md:w-1/4 mx-auto">
      Nenhum veículo registrado
    </div>

    <table class="table-auto w-full" v-if="owner.vehicles.length > 0">
      <thead>
      <tr class="bg-gray-100">
        <th class="px-4 py-2 font-bold text-center">
          Modelo
        </th>
        <th class="hidden md:table-cell px-4 py-2 font-bold text-center">
          Marca
        </th>
        <th class="hidden md:table-cell px-4 py-2 font-bold text-center">
          Ano
        </th>
        <th class="px-4 py-2 font-bold text-center">
          Placa
        </th>
        <th class="px-4 py-2 font-bold text-center">
          Ações
        </th>
      </tr>
      </thead>
      <tbody>
      <tr class="bg-gray-200" v-for="vehicle in owner.vehicles">
        <td class="px-4 py-2 text-center">
          {{ vehicle.model }}
        </td>
        <td class="hidden md:table-cell px-4 py-2 text-center">
          {{ vehicle.brand }}
        </td>
        <td class="hidden md:table-cell px-4 py-2 text-center">
          {{ vehicle.year }}
        </td>
        <td class="px-4 py-2 text-center">
          {{ vehicle.plate }}
        </td>
        <td class="px-4 py-2 flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
          <button @click="destroy(vehicle)" class="text-red-500 hover:text-red-700">Deletar</button>
          <Link :href="`/owners/${owner.id}/vehicles/${vehicle.id}/edit`" class="text-blue-500 hover:text-blue-700">Editar</Link>
          <Link :href="`/owners/${owner.id}/vehicles/${vehicle.id}`" class="text-blue-500 hover:text-blue-700">Ver</Link>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>
