<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
  title: String,
  button_text: String,
  route: String,
  empty_message: String,
  headers: Array,
  columns: Array,
  destroy: Function,
  edit: String,
  show: String,
  items: Object,
})
</script>

<template>
  <div>
    <div class="bg-white rounded-lg shadow border border-gray-150 md:p-4 mx-auto md:w-[90vw] md:h-[50vh] w-full h-full p-2">
      <div class="flex flex-row justify-between">
        <div class="flex flex-row">
          <a class="text-2xl font-bold text-black" v-text="title">
          </a>
        </div>
        <div class="mb-4 mr-4">
          <Link :href="`${route}/create`" v-text="button_text"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
          </Link>
        </div>
      </div>

      <div v-if="items.length === 0" v-text="empty_message"
           class="text-center text-gray-500 bg-gray-200 p-4 rounded-lg shadow border border-gray-150 md:w-1/4 mx-auto">
      </div>
      <table class="w-full" v-if="items.length > 0">
        <tr class="bg-gray-100">
          <slot name="headers"/>
          <th class="px-4 py-2 font-bold">
            Ações
          </th>
        </tr>
        <tr class="bg-gray-200" v-for="item in items">
          <slot name="columns" :item="item"/>
          <td class="px-4 py-2 flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
            <button @click="destroy(item.id)" class="text-red-500 hover:text-red-700">Excluir</button>
            <Link :href="`${route}/${item.id}/edit`" class="text-blue-500 hover:text-blue-700">Editar</Link>
            <Link :href="`${route}/${item.id}`" class="text-blue-500 hover:text-blue-700">Detalhes</Link>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<style scoped>

</style>
