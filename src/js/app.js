// Import Vue
import Vue from 'vue';
import Framework7 from 'framework7/framework7.esm.bundle.js';
import Framework7Vue from 'framework7-vue/framework7-vue.esm.bundle.js';
import 'framework7/css/framework7.bundle.css';

import '../css/icons.css';
import '../css/app.scss';
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate';
import vueResource from 'vue-resource'
import Ripple from 'vue-ripple-directive'

Ripple.color = 'rgba(231, 75, 126, 0.35)';
Ripple.zIndex = 55;
Vue.directive('ripple', Ripple);


// Import App Component
import App from '../components/app.vue';

Vue.use(Vuex)
Vue.use(vueResource)
Framework7.use(Framework7Vue);

const store = new Vuex.Store({
  plugins: [createPersistedState()],
  modules: {
    application: {
      //namespaced: true,
      state: {
        isLoading: false,
        drawer: {
          left: false,
          right: false,
          login: true,
        },
        lastItemIndex: null,
        nextItemIndex: null,
        tempPostItems:[], //
        postItems: [], // all post / no limit
        config: {
          //api: 'https://app.observatoriodelalaguna.org.mx/api/public/',
          api: 'http://localhost:8000/',
          //api: 'http://192.168.1.73/public/',
        },
      },
      mutations: {

      },
      getters: {}
    },
  }
})

// Init App
new Vue({
  el: '#app',
  store,
  render: (h) => h(App),
  // Register App Component
  components: {
    app: App
  },
});

