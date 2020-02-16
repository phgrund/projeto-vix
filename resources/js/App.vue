<template>

  <router-view />

</template>

<script>

  export default {
    name: 'App'
  }

</script>

<style>

  @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    font-family: 'Roboto', sans-serif;
  }

  body {
    background-color: #1f1f1f;
    color: #fff;
  }

  .input-block {
    margin-top: 10px;
  }

  .submit-block {
    margin-top: 20px;
    text-align: center;
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

  .form-title {
    text-align: center;
    margin-bottom: 20px;
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
