import Vue from 'vue';
import VueRouter from 'vue-router';

import Welcome from './views/Welcome.vue';
import Dashboard from './views/Dashboard.vue';

Vue.use(VueRouter);

export default new VueRouter({
  routes: [
    {
      path: '/',
      component: Welcome
    },
    {
      path: '/dashboard',
      component: Dashboard
    }
  ],
  mode: 'history'
});
