<script setup>
import {router, Link} from "@inertiajs/vue3";

defineProps({
    vehicles: {
        type: Array,
        default: () => []
    },
})

function destroy(id) {
    if (confirm('Tem certeza que deseja excluir este veículo?')) {
        router.delete(`/vehicles/${id}`)
    }
}

</script>
<template>
    <div class="w-full flex flex-col p-4 pt-0">
        <div class="flex flex-row justify-end">
            <button class="mb-4 mr-4">
                <Link href="/vehicles/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    Registrar novo veículo
                </Link>
            </button>
        </div>
        <table class="table-auto w-full">
            <tr class="bg-gray-100">
                <td class="px-4 py-2 font-bold">
                    Modelo
                </td>
                <td class="px-4 py-2 font-bold">
                    Dono
                </td>
                <td class="px-4 py-2 font-bold">
                    Marca
                </td>
                <td class="px-4 py-2 font-bold">
                    Ano
                </td>
                <td class="px-4 py-2 font-bold">
                    Placa
                </td>
                <td class="px-4 py-2 font-bold">
                    Ações
                </td>
            </tr>
            <tr class="bg-gray-200" v-for="vehicle in vehicles" :key="vehicle.id">
                <td class="px-4 py-2">
                    {{ vehicle.model }}
                </td>
                <td class="px-4 py-2">
                    {{ vehicle.owner.name }}
                </td>
                <td class="px-4 py-2">
                    {{ vehicle.brand }}
                </td>
                <td class="px-4 py-2">
                    {{ vehicle.year }}
                </td>
                <td class="px-4 py-2">
                    {{ vehicle.plate }}
                </td>
                <td class="px-4 py-2 flex flex-row space-x-4">
                    <button @click="destroy(vehicle.id)" class="text-red-500 hover:text-red-700">Excluir</button>
                    <Link :href="`/vehicles/${vehicle.id}/edit`" class="text-blue-500 hover:text-blue-700">Editar</Link>
                </td>

            </tr>
        </table>
    </div>
</template>

<style scoped>

</style>
