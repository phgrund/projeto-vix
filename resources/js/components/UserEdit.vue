<template>
  <main class="user-edit">
    <ButtonVoltar />

    <div class="edit-form">
      <UserForm title="Atualizar usuário" :form="this.user" @submit="submit" />
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
        }
      }
    },

    methods: {
      async loadUser() {
        const res = await api.get(`/users/${this.$route.params.id}`);

        this.user = res.data;
      },

      async submit(data) {
        try {
          const res = await api.patch(`/users/${this.$route.params.id}`, data);
          this.$router.replace({
            name: 'userList'
          });
        } catch(e) {
          console.error(e);
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