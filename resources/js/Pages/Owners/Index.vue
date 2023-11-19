<script setup>
import {router, Link} from "@inertiajs/vue3";

defineProps({
    owners: {
        type: Array,
        default: () => []
    },
})

function destroy(id) {
    if (confirm('Tem certeza que deseja excluir este usuário?\nTodos os veículos e revisões associados a ele também serão excluídos.')) {
        router.delete(`/owners/${id}`)
    }
}

</script>
<template>
    <div class="w-full flex flex-col p-4 pt-0">
        <div class="flex flex-row justify-end">
            <button class="mb-4 mr-4">
                <Link href="/owners/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    Registrar um novo usuário
                </Link>
            </button>
        </div>
        <table class="table-auto w-full">
            <tr class="bg-gray-100">
                <td class="px-4 py-2 font-bold">
                    Nome
                </td>
                <td class="px-4 py-2 font-bold">
                    E-mail
                </td>
                <td class="px-4 py-2 font-bold">
                    Veículos
                </td>
                <td class="px-4 py-2 font-bold">
                    Ações
                </td>
            </tr>
            <tr class="bg-gray-200" v-for="owner in owners" :key="owner.id">
                <td class="px-4 py-2">
                    {{ owner.name }}
                </td>
                <td class="px-4 py-2">
                    {{ owner.email }}
                </td>
                <td class="px-4 py-2">
                    2
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
