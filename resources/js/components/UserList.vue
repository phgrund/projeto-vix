<template>

  <main class="user-list">
    <ButtonCadastrar />
    <UsersTable />
  </main>

</template>

<script>

  import { mapGetters } from 'vuex';

  import UsersTable from './UsersTable';
  import ButtonCadastrar from './ButtonCadastrar.vue';

  export default {
    name: 'UserList',

    components: {
      UsersTable,
      ButtonCadastrar
    },

    computed: {
      ...mapGetters({
        user: 'auth/user'
      })
    }
  }
</script>

<style scoped>

  .user-list {
    text-align: center;
    max-width: 100%;
    overflow-x:auto;
  }

  .add-user {
    margin-bottom: 15px;
  }

</style>