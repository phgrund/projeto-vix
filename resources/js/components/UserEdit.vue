<template>
  <main class="user-edit">
    <ButtonVoltar />

    <div class="edit-form">
      <UserForm title="Atualizar usuário" :form="this.user" :error="error" @submit="submit" />
    </div>

  </main>
</template>

<script>
  import api from '../services/api';

  import UserForm from './UserForm';
  import ButtonVoltar from './ButtonVoltar.vue';

  export default {
    name: 'UserEdit',

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
      async loadUser() {
        const res = await api.get(`/users/${this.$route.params.id}`);

        this.user = res.data;
      },

      async submit(data) {
        try {
          this.error = ''
          const res = await api.patch(`/users/${this.$route.params.id}`, data);
          this.$router.replace({
            name: 'userList'
          });
        } catch(e) {
          this.error = 'Erro ao atualizar'
        }
      }
    },

    mounted() {
      this.loadUser();
    }
  }
</script>

<style>

  .edit-form {
    display: flex;
    align-items: center;
    justify-content: center;
  }

</style>