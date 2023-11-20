<script setup>
import { defineProps, ref } from "vue";

const props = defineProps(["label", "isSelect", "selectOptions", "type", "name"]);
const modelValue = ref(props.value);
const error = ref(null);

// Verifica se há erro no campo
const checkError = () => {
  error.value = modelValue.value === null || modelValue.value === "" ? `The ${props.name} field is required.` : null;
};
</script>

<template>
  <div class="mb-3">
    <div v-if="!isSelect">
      <label :for="name" class="block mb-2">{{ label }}</label>
      <input :type="type" :name="name" :id="name" v-model="modelValue" autocomplete="on" @blur="checkError" required>
      <div v-if="error" class="text-red-500">
        {{ error }}
      </div>
    </div>
    <div v-if="isSelect">
      <label :for="name" class="block mb-2">{{ label }}</label>
      <select :id="name" :name="name" v-model="modelValue" @change="checkError" autocomplete="on" required>
        <option value="null" disabled selected>Selecione o gênero</option>
        <option v-for="(text, value) in selectOptions" :value="value">{{ text }}</option>
      </select>
      <div v-if="error" class="text-red-500">
        {{ error }}
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
