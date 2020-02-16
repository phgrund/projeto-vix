<template>
  <form @submit.prevent="submit">
    <div class="input-block">
      <label for="name">Nome</label>
      <input type="text" id="name" class="form-input" v-model="form.name">
    </div>
    <div class="input-block">
      <label for="email">Email</label>
      <input type="email" id="email" class="form-input" v-model="form.email">
    </div>
    <div class="input-block">
      <label for="password">Senha</label>
      <input type="password" id="password" class="form-input" v-model="form.password">
    </div>
    <div class="input-block">
      <label for="cpf">CPF</label>
      <input type="text" id="cpf" class="form-input" v-model="form.cpf">
    </div>
    <div class="submit-block">
      <span class="error-message">{{ error }}</span>
      <button type="submit" class="submit-button">Salvar alterações</button>
    </div>
  </form>
</template>

<script>

  import api from '../services/api';

  export default {
    name: 'UserCreate',

    data() {
      return {
        form: {
          name: '',
          email: '',
          password: '',
          cpf: ''
        },
        error: ''
      }
    },

    methods: {
      async submit() {
        const res = await api.post('/users', this.form);

        console.log(res);
      }
    },
  }

</script>

<style>



</style>