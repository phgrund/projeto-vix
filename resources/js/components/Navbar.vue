<template>
  <nav>
    <ul>
      <li>
        <router-link
          :to="{ path: '/dashboard' }"
        >
          Dashboard
        </router-link>
      </li>
      <li>
        <router-link
          :to="{ path: '/dashboard/users' }"
        >
          Usuários
        </router-link>
      </li>
      <li>
        <a href="#" @click.prevent="logout">Sair</a>
      </li>
    </ul>
  </nav>
</template>

<script>

  import { mapActions } from 'vuex';
  import api from '../services/api';
  import router from '../router';

  export default {
    name: 'Navbar',

    methods: {
      ...mapActions({
        logoutAction: 'auth/logout'
      }),

      async logout() {
        await api.post('/auth/logout');

        router.replace({
          path: '/'
        });
      }
    }
  }

</script>

<style scoped>

  nav {
    width: 100%;
  }

  ul {
    overflow: hidden;
    background-color: #282828;
    list-style-type: none;
  }

  li {
    float: left;
    text-align: center;
  }

  a {
    display: block;
    color: #fff;
    font-size: 20px;
    text-decoration: none;
    padding: 14px 16px;
    transition: 0.3s all;
  }

  a:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

</style>
