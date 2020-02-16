<template>
  <div class="welcome">

    <main>
      <h2>Bem-vindo(a)</h2>

      <form @submit.prevent="submit">
        <div class="input-block">
          <label for="email">Email:</label>
          <input type="email" id="email" class="form-input" v-model="form.email">
        </div>
        <div class="input-block">
          <label for="password">Senha:</label>
          <input type="password" id="password" class="form-input" v-model="form.password">
        </div>
        <div class="submit-block">
          <span class="error-message">{{ error }}</span>
          <button type="submit" class="submit-button">Logar</button>
        </div>
      </form>
    </main>
  </div>
</template>

<script>

import { mapActions } from 'vuex';

export default {
  name: 'Welcome',

  data() {
    return {
      form: {
        email: '',
        password: ''
      },
      error: ''
    }
  },

  methods: {
    ...mapActions({
      login: 'auth/login'
    }),

    async submit() {
      try {
        await this.login(this.form);
        this.$router.replace({
          path: '/dashboard'
        })
      } catch(e) {
        this.error = 'Login ou senha incorretos'
      }
    }
  }
}

</script>

<style scoped>

  .welcome {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  main {
    max-width: 25%;
  }

  main > h2 {
    text-align: center;
  }

</style>
