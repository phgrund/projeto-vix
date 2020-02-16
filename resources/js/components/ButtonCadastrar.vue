<template>
  <router-link class="new-user-link" :to="{ path: 'users/create' }">
    <FontAwesomeIcon icon="plus" />
    Cadastrar novo usuário
  </router-link>
</template>

<script>

  export default {
    name: 'ButtonCadastrar',
  }

</script>

<style>

  .new-user-link {
    display: inline-block;
    padding: 10px 5px;
    border: 1px solid #fff;
    border-radius: 10px;
    margin-bottom: 15px;
    text-decoration: none;
    color: #fff;
    transition: 0.2s all;
  }

  .new-user-link:hover {
    color: #30fc03;
    border-color: #30fc03;
    background-color: rgba(255, 255, 255, 0.05);
  }

</style>