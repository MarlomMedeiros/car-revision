<script setup>
import { router, useForm } from "@inertiajs/vue3";

defineProps({
  owner: {
    type: Object,
    default: () => {}
  },
})
</script>

<template>
  <div>
    <h1>Detalhes do proprietário</h1>
    {{ owner.name }}
    {{ owner.email }}
    {{ owner.document }}
    {{ owner.phone }}
    {{ owner.address }}
  </div>
</template>

<style scoped>

</style>
