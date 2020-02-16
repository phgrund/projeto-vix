<template>
  <main class="user-edit">
    <h2>Atualizar usuário</h2>

    <form @submit.prevent="submit">
      <div class="input-block">
        <label for="login">Nome</label>
        <input type="text" id="login" class="form-input" v-model="user.name">
      </div>
      <div class="input-block">
        <label for="email">Email</label>
        <input type="text" id="email" class="form-input" v-model="user.email">
      </div>
      <div class="input-block">
        <label for="password">Senha</label>
        <input type="text" id="password" class="form-input" v-model="user.password">
      </div>
      <div class="input-block">
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" class="form-input" v-model="user.cpf">
      </div>
      <div class="submit-block">
        <span class="error-message">{{ error }}</span>
        <button type="submit" class="submit-button">Salvar alterações</button>
      </div>
    </form>
  </main>
</template>

<script>
  import api from '../services/api';

  export default {
    name: 'UserEdit',

    data() {
      return {
        user: {
          name: '',
          email: '',
          password: '',
          cpf: ''
        },
        error: ''
      }
    },

    methods: {
      async loadUser() {
        const res = await api.get(`/users/${this.$route.params.id}`);

        this.user = res.data;
      },

      async submit() {
        const res = await api.patch(`/users/${this.$route.params.id}`, this.user);

        if(res.status == 200) {
          this.$router.replace({
            name: 'userList'
          })
        }

        console.log(res);
      }
    },

    mounted() {
      this.loadUser();
    }
  }
</script>

<style>

</style>