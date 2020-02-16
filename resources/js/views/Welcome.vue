<template>
  <div class="app">

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

  .app {
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

  .input-block {
    margin-top: 10px;
    width: 100%;
  }

  .submit-block {
    text-align: center;
    margin-top: 20px;
  }

  .submit-block > button {
    width: 75%;
  }

  .error-message {
    color: #d8000c;
    display: block;
  }

  .form-input {
    display: block;
    margin-top: 5px;
    padding: 5px 10px;
    color: #fff;
    background-color: transparent;
    border: none;
    border-bottom: solid 1px #fff;
  }

  .form-input:focus {
    outline-width: 0;
  }

  .submit-button {
    color: #fff;
    font-size: 16px;
    background-color: transparent;
    margin-top: 5px;
    padding: 5px 15px;
    border: 1px solid #fff;
    border-radius: 10px;
    transition: 0.5s all;
  }

  .submit-button:hover {
    background-color: rgba(255, 255, 255, 0.05);
    transform: scale(1.1);
  }

</style>
