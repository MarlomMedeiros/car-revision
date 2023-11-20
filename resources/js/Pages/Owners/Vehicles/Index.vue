<script setup>
import {router, Link} from "@inertiajs/vue3";
import Table from "@/Pages/components/Table.vue";

const prop = defineProps({
  owner: {
    type: Object,
    default: () => []
  },
})

function destroy(vehicle) {
  if (confirm('Tem certeza que deseja excluir este veículo?')) {
    router.delete(`${prop.owner.id}/vehicles/${vehicle}`)
  }
}

</script>
<template>
    <Table :title="'Veículos'"
         :button_text="'Registrar um novo veículo'"
         :route="`/owners/${owner.id}/vehicles`"
         :empty_message="'Nenhum veículo registrado'"
         :items="owner.vehicles"
         :destroy="destroy">

    <template v-slot:headers>
      <td class="px-4 py-2 font-bold">
        Modelo
      </td>
      <td class="px-4 font-bold hidden md:table-cell">
        Marca
      </td>
      <td class="px-4 py-2 font-bold">
        Ano
      </td>
      <td class="px-4 py-2 font-bold">
        Placa
      </td>
    </template>

    <template v-slot:columns="{item}">
      <td class="px-4 py-2">
        {{ item.model }}
      </td>
      <td class="px-4 py-2 hidden md:table-cell">
        {{ item.brand }}
      </td>
      <td class="px-4 py-2">
          {{ item.year }}
      </td>
      <td class="px-4 py-2">
          {{ item.plate }}
      </td>
    </template>
  </Table>
</template>

<style scoped>

</style>
