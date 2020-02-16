<template>

  <main class="user-list">
    <ButtonCadastrar />
    <UsersTable />
  </main>

</template>

<script>

  import UsersTable from './UsersTable';
  import ButtonCadastrar from './ButtonCadastrar.vue';

  export default {
    name: 'UserList',

    components: {
      UsersTable,
      ButtonCadastrar
    }
  }
</script>

<style scoped>

  main {
    text-align: center;
  }

  .add-user {
    margin-bottom: 15px;
  }

</style>