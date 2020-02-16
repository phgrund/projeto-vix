import api from '../services/api';

export default {
  namespaced: true,

  state: {
    token: null,
    user: null
  },

  getters: {
    authenticated(state){
      return state.token && state.user
    },

    user(state) {
      return state.user;
    }
  },

  mutations: {
    SET_TOKEN(state, token) {
      state.token = token;
    },
    SET_USER(state, data) {
      state.user = data;
    }
  },

  actions: {
    async login({ dispatch }, credentials) {
      const res = await api.post('/auth/login', credentials);

      return dispatch('attempt', res.data.token);
    },

    async attempt({ commit }, token) {
      if(token) {
        commit('SET_TOKEN', token);
      }

      // if(!state.token) return;

      try {
        let res = await api.get('/auth/me');

        commit('SET_USER', res.data);
      } catch(e) {
        commit('SET_USER', null);
        commit('SET_TOKEN', null);
      }
    },

    async logout({ commit }) {
      await api.post('auth/logout');

      commit('SET_USER', null);
      commit('SET_TOKEN', null);
    }
  }
}
