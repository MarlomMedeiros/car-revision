<script setup>
import {router, Link} from "@inertiajs/vue3";
import Layout from "../Layout.vue";
import Table from "../components/Table.vue";

defineProps({
  owners: {
    type: Object,
    default: () => []
  },
})

function destroy(id) {
  if (confirm('Tem certeza que deseja deletar este usuário?\nTodos os veículos e revisões associados a ele também serão excluídos.')) {
    router.delete(`/owners/${id}`)
  }
}

</script>
<template>
    <Layout>
      <Table :title="'Usuários'"
             :button_text="'Registrar um novo usuário'"
             :route="'/owners'"
             :empty_message="'Nenhum usuário registrado'"
             :items="owners"
             :destroy="destroy">

            <template v-slot:headers>
              <td class="px-4 py-2 font-bold">
                Nome
              </td>
              <td class="px-4 font-bold hidden md:table-cell">
                E-mail
              </td>
              <td class="px-4 py-2 font-bold">
                Veículos
              </td>
            </template>

            <template v-slot:columns="{item}">
              <td class="px-4 py-2">
                {{ item.name }}
              </td>
              <td class="px-4 py-2 hidden md:table-cell">
                {{ item.email }}
              </td>
              <td class="px-4 py-2">
                {{ item.vehicles.length }}
              </td>
            </template>
      </Table>
    </Layout>
</template>

<style scoped>

</style>
