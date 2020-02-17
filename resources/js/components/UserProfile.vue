<template>
  <main class="user-profile">
    <h2>Seus dados</h2>
    <div class="user-info">
      <h3>Nome</h3>
      <span>{{ user.name }}</span>
    </div>
    <div class="user-info">
      <h3>Email</h3>
      <span>{{ user.email }}</span>
    </div>
    <div class="user-info">
      <h3>CPF</h3>
      <span>{{ user.cpf }}</span>
    </div>
  </main>
</template>

<script>

import { mapGetters } from 'vuex';

export default {
  name: 'UserProfile'
}

</script>

<style>

  .user-info {
    margin-top: 10px;
  }

</style>
