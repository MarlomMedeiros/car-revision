<script setup>
import { router, useForm } from "@inertiajs/vue3";
import { defineProps, ref } from "vue";

const props = defineProps(["items", "title", "button_text", "submit_route", "form"]);
const model = ref({});

function submit() {
  router.post(props.submit_route, model.value);
}
</script>

<template>
  <div class="w-full flex flex-col p-4 space-y-4 max-w-3xl mx-auto bg-white rounded-lg shadow border border-gray-150">
    <form @submit.prevent="submit" class="w-full max-w-lg mx-auto p-8">
      <slot name="formItems" :items="items" :form="form" :model="model"/>
      <button type="submit" v-text="button_text"/>
    </form>
  </div>
</template>

<style scoped>

</style>
