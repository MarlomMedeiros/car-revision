<script setup>
import {router, useForm} from "@inertiajs/vue3";
import Layout from "../Layout.vue";

const form = useForm({
  name: null,
  email: null,
  document: null,
  gender: null,
  birthday: null,
  phone: null,
  address: null,
})

function submit() {
  router.post('/owners', form)
}

</script>

<template>
    <Layout>
        <div class="w-full flex flex-col p-4 space-y-4 max-w-3xl mx-auto bg-white rounded-lg shadow border border-gray-150">
          <form @submit.prevent="submit" class="w-full max-w-lg mx-auto p-8">

            <div class="mb-3">
              <label for="name" class="block mb-2">Nome</label>
              <input type="text" name="name" id="name" v-model="form.name" autocomplete="on" required>
              <div v-if="$page.props.errors.name" class="text-red-500">
                {{ $page.props.errors.name }}
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="block mb-2">E-mail</label>
              <input type="email" name="email" id="email" v-model="form.email" autocomplete="on" required>
              <div v-if="$page.props.errors.email" class="text-red-500">
                {{ $page.props.errors.email }}
              </div>
            </div>

            <div class="mb-3">
              <label for="document" class="block mb-2">CPF</label>
              <input type="text" name="document" id="document" v-model="form.document" autocomplete="on" required>
              <div v-if="$page.props.errors.document" class="text-red-500">
                {{ $page.props.errors.document }}
              </div>
            </div>

            <div class="mb-3">
              <label for="gender" class="block mb-2">Gênero</label>
              <select id="gender" name="gender" v-model="form.gender" autocomplete="on" required>
                <option value="null" disabled selected>Selecione o gênero</option>
                <option value="male">Homem</option>
                <option value="female">Mulher</option>
              </select>
              <div v-if="$page.props.errors.gender" class="text-red-500">
                {{ $page.props.errors.gender }}
              </div>
            </div>

            <div class="mb-3">
              <label for="birthday" class="block mb-2">Data de nascimento</label>
              <input type="date" name="birthday" id="birthday" v-model="form.birthday" autocomplete="on" required>
              <div v-if="$page.props.errors.birthday" class="text-red-500">
                {{ $page.props.errors.birthday }}
              </div>
            </div>

            <div class="mb-3">
              <label for="phone" class="block mb-2">Celular</label>
              <input type="text" name="phone" id="phone" v-model="form.phone" autocomplete="on" required>
              <div v-if="$page.props.errors.phone" class="text-red-500">
                {{ $page.props.errors.phone }}
              </div>
            </div>

            <div class="mb-3">
              <label for="address" class="block mb-2">Endereço</label>
              <input type="text" name="address" id="address" v-model="form.address" autocomplete="on" required>
              <div v-if="$page.props.errors.address" class="text-red-500">
                {{ $page.props.errors.address }}
              </div>
            </div>

            <button type="submit">
              Criar usuário
            </button>
          </form>
        </div>
    </Layout>
</template>

<style scoped>
input {
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 4px;
  width: 100%;
}

select {
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
