<script setup>
import {router, Link} from "@inertiajs/vue3";

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
  <div class="bg-white rounded-lg shadow border border-gray-150 md:p-4 mx-auto md:w-[90vw] md:h-[50vh] w-full h-full p-2">
    <div class="flex flex-row justify-between">
      <div class="flex flex-row">
        <a class="text-2xl font-bold text-black">
          Usuários
        </a>
      </div>
      <div class="mb-4 mr-4">
        <Link href="/owners/create"
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
          Registrar um novo usuário
        </Link>
      </div>
    </div>

    <div v-if="owners.length === 0"
         class="text-center text-gray-500 bg-gray-200 p-4 rounded-lg shadow border border-gray-150 md:w-1/4 mx-auto">
      Nenhum usuário registrado
    </div>
    <table class="table-auto w-full" v-if="owners.length > 0">
      <tr class="bg-gray-100">
        <td class="px-4 py-2 font-bold">
          Nome
        </td>
        <td class="px-4 py-2 font-bold hidden md:contents">
          E-mail
        </td>
        <td class="px-4 py-2 font-bold">
          Veículos
        </td>
        <td class="px-4 py-2 font-bold">
          Ações
        </td>
      </tr>
      <tr class="bg-gray-200 " v-for="owner in owners" :key="owner.id">
        <td class="px-4 py-2">
          {{ owner.name }}
        </td>
        <td class="px-4 py-2 hidden md:contents">
          {{ owner.email }}
        </td>
        <td class="px-4 py-2">
          {{ owner.vehicles.length }}
        </td>
        <td class="px-4 py-2 flex flex-row space-x-4">
          <button @click="destroy(owner.id)" class="text-red-500 hover:text-red-700">Excluir</button>
          <Link :href="`/owners/${owner.id}/edit`" class="text-blue-500 hover:text-blue-700">Editar</Link>
          <Link :href="`/owners/${owner.id}`" class="text-blue-500 hover:text-blue-700">Detalhes</Link>
        </td>

      </tr>
    </table>
  </div>
</template>

<style scoped>

</style>
