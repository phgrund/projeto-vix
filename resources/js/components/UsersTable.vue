<template>

  <table>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>CPF</th>
      <th>Editar</th>
      <th>Deletar</th>
    </tr>
    <tr v-for="user in users">
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td>{{ user.cpf }}</td>
      <td><FontAwesomeIcon @click="editUser(user.id)" icon="pencil-alt" class="table-icon edit-icon" /></td>
      <td><FontAwesomeIcon @click="deleteUser(user.id)" icon="trash" class="table-icon delete-icon" /></td>
    </tr>
  </table>

</template>

<script>

  import api from '../services/api';

  export default {
    data() {
      return {
        users: []
      }
    },

    methods: {
      async loadUsers() {
        const res = await api.get('/users');

        this.users = res.data;
      },

      addUser() {
        this.$router.replace({
          path: 'users/create'
        })
      },

      editUser(id) {
        this.$router.replace({
          path: `users/edit/${id}`
        })
      },

      async deleteUser(id) {
        const res = await api.delete(`/users/${id}`);

        this.loadUsers();
      }
    },

    mounted() {
      this.loadUsers();
    }
  }

</script>

<style>

  table {
    border-collapse: collapse;
    margin: 0 auto;
  }

  table, th, td {
    border: 1px solid #fff;
    padding: 10px;
  }

  th {
    background-color: #121212;
  }

  tr:hover {
    background-color: #282828;
  }

  td:nth-child(4),
  td:nth-child(5) {
    text-align: center;
  }

  .table-icon {
    text-align: center;
    transition: 0.2s all;
    cursor: pointer;
  }

  .edit-icon:hover {
    color: #3b9aec;
  }

  .delete-icon:hover {
    color: #f00;
  }

</style>