<script setup>
import Vehicles from "./Vehicles/Index.vue";

defineProps({
  owner: {
    type: Object,
    default: () => {
    }
  },
})
</script>

<template>
  <div class="bg-white rounded-lg shadow border border-gray-150 p-4 mx-auto w-[90vw] mb-4">
    <div>
      Nome: {{ owner.name }}
    </div>
    <div>
      E-mail: {{ owner.email }}
    </div>
    <div>
      CPF: {{ owner.document }}
    </div>
  </div>
  <Vehicles :owner="owner"/>
</template>

<style scoped>

</style>
