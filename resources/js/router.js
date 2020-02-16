import Vue from 'vue';
import VueRouter from 'vue-router';

import Welcome from './views/Welcome.vue';
import Dashboard from './views/Dashboard.vue';

import UserProfile from './components/UserProfile.vue';
import UserList from './components/UserList.vue';
import UserEdit from './components/UserEdit.vue';
import UserCreate from './components/UserCreate.vue';

import store from './store';

Vue.use(VueRouter);

export default new VueRouter({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Welcome
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard,
      beforeEnter(to, from, next) {
        if(!store.getters['auth/authenticated']) {
          return next({
            path: '/'
          });
        }
        next();
      },
      children: [
        {
          path: '',
          component: UserProfile
        },
        {
          path: 'users',
          name: 'userList',
          component: UserList
        },
        {
          path: 'users/create',
          name: 'userCreate',
          component: UserCreate
        },
        {
          path: 'users/edit/:id',
          name: 'userEdit',
          component: UserEdit
        }
      ]
    }
  ],
  mode: 'history'
});
