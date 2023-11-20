<script setup>
import {router, useForm} from "@inertiajs/vue3";

const prop = defineProps({
  revision: {
    type: Object,
    default: () => {
    }
  },
})

const form = useForm({
  owner_id: prop.revision.vehicle.owner.id,
  vehicle_id: prop.revision.vehicle_id,
  description: prop.revision.description,
  cost: prop.revision.cost,
  date: prop.revision.date,
})

function submit() {
  router.put(`/owners/${prop.revision.vehicle.owner.id}/vehicles/${prop.revision.vehicle.id}/revisions/${prop.revision.id}`, form)
}

</script>

<template>
  <div class="w-full flex flex-col p-4 space-y-4 max-w-3xl mx-auto bg-white rounded-lg shadow border border-gray-150">
    <form @submit.prevent="submit" class="w-full max-w-lg mx-auto p-8">
      <div class="mb-6">
        <div v-if="$page.props.errors.description" class="text-red-500 mb-2">
          {{ $page.props.errors.description }}
        </div>
        <label for="description" class="block mb-2">Descrição</label>
        <input type="text" name="description" id="description" v-model="form.description">
      </div>
      <div class="mb-6">
        <div v-if="$page.props.errors.cost" class="text-red-500 mb-2">
          {{ $page.props.errors.cost }}
        </div>
        <label for="cost" class="block mb-2">Custo</label>
        <input type="number" name="cost" id="cost" v-model="form.cost">
      </div>
      <div class="mb-6">
        <div v-if="$page.props.errors.date" class="text-red-500 mb-2">
          {{ $page.props.errors.date }}
        </div>
        <label for="date" class="block mb-2">Data</label>
        <input type="date" name="date" id="date" v-model="form.date">
      </div>
      <button type="submit">
        Editar revisão
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
