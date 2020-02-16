<template>
  <form @submit.prevent="submit">

    <h2 class="form-title">{{ title }}</h2>

    <div class="input-block">
      <label for="name">Nome</label>
      <input type="text" id="name" class="form-input" v-model="form.name" autocomplete="off">
    </div>

    <div class="input-block">
      <label for="email">Email</label>
      <input type="email" id="email" class="form-input" v-model="form.email" autocomplete="off">
    </div>

    <div class="input-block">
      <label for="password">Senha</label>
      <input type="password" id="password" class="form-input" v-model="form.password" autocomplete="off">
    </div>

    <div class="input-block">
      <label for="cpf">CPF</label>
      <input type="text" id="cpf" class="form-input" v-model="form.cpf" autocomplete="off">
    </div>

    <div class="submit-block">
      <span class="error-message">{{ error }}</span>
      <button type="submit" class="submit-button">Salvar</button>
    </div>
  </form>
</template>

<script>

  export default {
    name: 'UserForm',

    data() {
      return {
        error: ''
      }
    },

    props: {
      form: {
        name: '',
        email: '',
        password: '',
        cpf: ''
      },
      title: ''
    },

    methods: {
      submit() {
        if(this.form.password == '')
          this.form.password = undefined;

        this.$emit('submit', this.form);
      }
    }
  }

</script>

<style scoped>



</style>