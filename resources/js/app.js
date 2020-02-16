require('./bootstrap');

import Vue from 'vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPencilAlt, faTrash, faPlus } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import router from './router';
import store from './store';
import App from './App.vue';

require('./store/subscriber');

library.add({
  faPencilAlt,
  faTrash,
  faPlus
});


Vue.component('FontAwesomeIcon', FontAwesomeIcon);

store.dispatch('auth/attempt', localStorage.getItem('token')).then(() => {
  new Vue({
      router,
      store,
      render: h => h(App)
  }).$mount('#app');
});
