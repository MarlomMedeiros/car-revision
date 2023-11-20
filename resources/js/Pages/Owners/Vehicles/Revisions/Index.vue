<script setup>
import {router, Link} from "@inertiajs/vue3";

const prop = defineProps({
  vehicle: {
    type: Object,
    default: () => []
  },
})

function destroy(revisions) {
  if (confirm('Tem certeza que deseja excluir esta revisão?')) {
    router.delete(`/owners/${prop.vehicle.owner_id}/vehicles/${prop.vehicle.id}/revisions/${revisions.id}`)
  }
}

</script>
<template>
  <div class="bg-white rounded-lg shadow border border-gray-150 md:p-4 mx-auto md:w-[90vw] md:h-[50vh] w-full h-full p-2">
    <div class="flex flex-row justify-between">
      <div class="flex flex-row">
        <a class="text-2xl font-bold text-black">
          Revisões
        </a>
      </div>
      <div class="mb-4 mr-4">
        <Link :href="`/owners/${vehicle.owner.id}/vehicles/${vehicle.id}/revisions/create`"
              :data="vehicle"
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
          Registrar uma nova revisão
        </Link>
      </div>
    </div>


    <div v-if="vehicle.revisions.length === 0"
         class="text-center text-gray-500 bg-gray-200 p-4 rounded-lg shadow border border-gray-150 md:w-1/4 mx-auto">
      Nenhuma revisão registrada
    </div>

    <table class="table-auto w-full" v-if="vehicle.revisions.length > 0">
      <tr class="bg-gray-100">
        <td class="px-4 py-2 font-bold">
          Descrição
        </td>
        <td class="px-4 py-2 font-bold">
          Custo
        </td>
        <td class="px-4 py-2 font-bold">
          Data
        </td>
        <td class="px-4 py-2 font-bold">
          Ações
        </td>
      </tr>
      <tr class="bg-gray-200" v-for="revision in vehicle.revisions">
        <td class="px-4 py-2">
          {{ revision.description }}
        </td>
        <td class="px-4 py-2">
          R$ {{ revision.cost }}
        </td>
        <td class="px-4 py-2">
          {{ revision.date }}
        </td>
        <td class="px-4 py-2 flex flex-row space-x-4">
          <button @click="destroy(revision)" class="text-red-500 hover:text-red-700">Deletar</button>
          <Link :href="`/owners/${vehicle.owner_id}/vehicles/${vehicle.id}/revisions/${revision.id}/edit`"
                class="text-blue-500 hover:text-blue-700">Editar
          </Link>
          <Link :href="`/owners/${vehicle.owner_id}/vehicles/${vehicle.id}/revisions/${revision.id}`"
                class="text-blue-500 hover:text-blue-700">Visualizar
          </Link>
        </td>

      </tr>
    </table>
  </div>
</template>

<style scoped>

</style>
