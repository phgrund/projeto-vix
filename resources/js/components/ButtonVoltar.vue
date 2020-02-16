<template>
  <router-link class="back-button" :to="{ path: '/dashboard/users' }">
    <FontAwesomeIcon icon="arrow-left" />
    Voltar à lista de usuários
  </router-link>
</template>

<script>

  export default {
    name: 'ButtonVoltar',
  }

</script>

<style scoped>

  .back-button {
    display: inline-block;
    padding: 10px 5px;
    border: 1px solid #fff;
    border-radius: 10px;
    margin-bottom: 15px;
    text-decoration: none;
    color: #fff;
    transition: 0.2s all;
  }

  .back-button:hover {
    color: #ebebeb;
    background-color: rgba(255, 255, 255, 0.05);
  }

</style>