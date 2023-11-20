<script setup>
import {router} from "@inertiajs/vue3";
import Table from "../../../components/Table.vue";

const prop = defineProps({
  vehicle: {
    type: Object,
    default: () => []
  },
})

function destroy(revisions) {
  if (confirm('Tem certeza que deseja excluir esta revisão?')) {
    router.delete(`/owners/${prop.vehicle.owner_id}/vehicles/${prop.vehicle.id}/revisions/${revisions}`)
  }
}

</script>
<template>
  <Table :title="'Revisões'"
         :button_text="'Registrar uma nova revisão'"
         :route="`/owners/${prop.vehicle.owner_id}/vehicles/${vehicle.id}/revisions`"
         :empty_message="'Nenhuma revisão registrada'"
         :items="vehicle.revisions"
         :destroy="destroy">

    <template v-slot:headers>
      <td class="px-4 py-2 font-bold">
        Descrição
      </td>
      <td class="px-4 font-bold hidden md:table-cell">
        Custo
      </td>
      <td class="px-4 py-2 font-bold">
        Data
      </td>
    </template>

    <template v-slot:columns="{item}">
      <td class="px-4 py-2">
        {{ item.description }}
      </td>
      <td class="px-4 py-2 hidden md:table-cell">
        {{ item.cost }}
      </td>
      <td class="px-4 py-2">
        {{ item.date }}
      </td>
    </template>
  </Table>
</template>

<style scoped>

</style>
