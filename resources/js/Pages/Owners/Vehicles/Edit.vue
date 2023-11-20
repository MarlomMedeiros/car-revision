<script setup>
import {router, useForm} from "@inertiajs/vue3";

const prop = defineProps({
  vehicle: {
    type: Object,
    default: () => {
    }
  },
})

const form = useForm({
  id: prop.vehicle.id,
  owner_id:  prop.vehicle.owner_id,
  model:  prop.vehicle.model,
  brand:  prop.vehicle.brand,
  year:  prop.vehicle.year,
  plate:  prop.vehicle.plate,
})

function submit() {
  router.put(`/owners/${prop.vehicle.owner_id}/vehicles/${prop.vehicle.id}`, form)
}

</script>

<template>
  <div class="w-full flex flex-col p-4 space-y-4 max-w-3xl mx-auto bg-white rounded-lg shadow border border-gray-150">
    <form @submit.prevent="submit" class="w-full max-w-lg mx-auto p-8">
      <div class="mb-6">
        <div v-if="$page.props.errors.model" class="text-red-500 mb-2">
          {{ $page.props.errors.model }}
        </div>
        <label for="model" class="block mb-2">Modelo</label>
        <input type="text" name="model" id="model" v-model="form.model">
      </div>
      <div class="mb-6">
        <div v-if="$page.props.errors.brand" class="text-red-500 mb-2">
          {{ $page.props.errors.brand }}
        </div>
        <label for="brand" class="block mb-2">Marca</label>
        <input type="text" name="brand" id="brand" v-model="form.brand">
      </div>
      <div class="mb-6">
        <div v-if="$page.props.errors.year" class="text-red-500 mb-2">
          {{ $page.props.errors.year }}
        </div>
        <label for="year" class="block mb-2">Ano</label>
        <input type="number" name="year" id="year" v-model="form.year">
      </div>
      <div class="mb-6">
        <div v-if="$page.props.errors.plate" class="text-red-500 mb-2">
          {{ $page.props.errors.plate }}
        </div>
        <label for="plate" class="block mb-2">Placa</label>
        <input type="text" name="plate" id="plate" v-model="form.plate">
      </div>
      <button type="submit">
        Editar veículo
      </button>
    </form>
  </div>
</template>

<style scoped>
input {
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 4px;
  width: 100%;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

button {
  background: #ccc;
  border: 0;
  padding: 10px 15px;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background: #ddd;
}
</style>
