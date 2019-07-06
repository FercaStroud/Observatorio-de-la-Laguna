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

Ripple.color = 'rgba(255, 255, 255, 0.35)';
Ripple.zIndex = 55;
Vue.directive('ripple', Ripple);


// Import App Component
import App from '../components/app.vue';

// Init Framework7-Vue Plugin
Framework7.use(Framework7Vue);

// Init App
new Vue({
  el: '#app',
  render: (h) => h(App),

  // Register App Component
  components: {
    app: App
  },
});