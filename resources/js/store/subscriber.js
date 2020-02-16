import store from './index';
import api from '../services/api';

store.subscribe((mutation) => {
  switch(mutation.type) {
    case 'auth/SET_TOKEN':
      const { payload } = mutation;
      if(payload) {
        api.defaults.headers.common['Authorization'] = `Bearer ${payload}`;
        localStorage.setItem('token', payload);
      }
      else {
        api.defaults.headers.common['Authorization'] = null;
        localStorage.removeItem('token');
      }
      break;
  }
});
