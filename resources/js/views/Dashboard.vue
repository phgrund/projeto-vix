<template>
  <div class="dashboard">
    <Navbar />
    <div class="container">
      <router-view />
    </div>
  </div>
</template>

<script>

import { mapGetters } from 'vuex';
import api from '../services/api';

import Navbar from '../components/Navbar';

export default {
  name: 'Dashboard',

  components: {
    Navbar
  },

  data() {
    return {
      users: []
    }
  },

  methods: {
    async getUsers() {
      const res = await api.get('/users');

      this.users = res.data;
    }
  },

  mounted() {
    this.getUsers();
  }
}

</script>

<style scoped>
  .container {
    padding: 20px;
  }

</style>
