<script setup>
import {ref, onMounted, onUpdated} from "vue";
import Layout from "../Layout.vue";
import Form from "../components/Form/Form.vue";
import FormItem from "../components/Form/FormItem.vue";

const form = ref({
  name: null,
  email: null,
  document: null,
  gender: null,
  birthday: null,
  phone: null,
  address: null,
});

onUpdated(() => {
  console.log(form.value);
});

</script>

<template>
  <Layout>
    <Form :title="'Criar usuário'" :button_text="'Criar usuário'" submit_route="/owners" :form="form">
      <template v-slot:formItems>
        <FormItem :label="'Nome'" name="name" v-model="form.name" />
        <FormItem :label="'E-mail'" name="email" v-model="form.email" />
        <FormItem :label="'CPF'" name="document" v-model="form.document" />
        <FormItem
            :label="'Gênero'"
            name="gender"
            v-model="form.gender"
            :selectOptions="{ male: 'Homem', female: 'Mulher' }"
            :is-select="true"
        />
        <FormItem :label="'Data de nascimento'" name="birthday" type="date" v-model="form.birthday" />
        <FormItem :label="'Celular'" name="phone" type="number" v-model="form.phone" />
        <FormItem :label="'Endereço'" name="address" v-model="form.address" />
      </template>
    </Form>
  </Layout>
</template>

<style scoped>

</style>
