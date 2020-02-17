<template>
  <main class="user-create">
    <ButtonVoltar />

    <div class="create-form">
      <UserForm title="Cadastrar usuário" :form="this.user" :error="error" @submit="submit" />
    </div>

  </main>
</template>

<script>

  import api from '../services/api';

  import UserForm from './UserForm';
  import ButtonVoltar from './ButtonVoltar';

  export default {
    name: 'UserCreate',

    components: {
      UserForm,
      ButtonVoltar
    },

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
      async submit(data) {
        try {
          this.error = ''
          const res = await api.post('/users', data);
          this.$router.replace({
            name: 'userList'
          });
        } catch(e) {
          this.error = 'Erro ao cadastrar.'
        }
      }
    },
  }

</script>

<style>

  .create-form {
    display: flex;
    align-items: center;
    justify-content: center;
  }

</style>