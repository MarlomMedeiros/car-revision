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
        router.delete(`${this.prop.owner.id}/vehicles/${vehicle.id}`, { data: vehicle })
    }
}

</script>
<template>
    <div class="bg-white rounded-lg shadow border border-gray-150 p-4 mx-auto w-[90vw] h-[50vh]">
        <div class="flex flex-row justify-between">
            <div class="flex flex-row">
                <a class="text-2xl font-bold text-black">
                    Veículos
                </a>
            </div>
            <div class="mb-4 mr-4">
                <Link :href="`/owners/${prop.owner.id}/vehicles/create`" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    Registrar um novo veículo
                </Link>
            </div>
        </div>


        <div v-if="prop.owner.vehicles.length === 0" class="text-center text-gray-500 bg-gray-200 p-4 rounded-lg shadow border border-gray-150 w-1/4 mx-auto">
            Nenhum veículo registrado
        </div>

        <table class="table-auto w-full" v-if="prop.owner.vehicles.length > 0">
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
            <tr class="bg-gray-200" v-for="vehicle in prop.owner.vehicles">
                <td class="px-4 py-2">
                    {{ vehicle.model }}
                </td>
                <td class="px-4 py-2">
                    {{ owner.name }}
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
                    <button @click="destroy(vehicle)" class="text-red-500 hover:text-red-700">Excluir</button>
                    <Link :href="`/owners/${prop.owner.id}/vehicles/${vehicle.id}/edit`" :data="vehicle"
                          class="text-blue-500 hover:text-blue-700">Editar</Link>
                </td>

            </tr>
        </table>
    </div>
</template>

<style scoped>

</style>
