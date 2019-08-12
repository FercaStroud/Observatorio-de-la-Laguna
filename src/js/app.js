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
        postItems: [
         /*{
              post_id: 2,
              post_author: "Observatorio de La Laguna",
              post_title: "Sistema de Derecho confiable y objetivo en Gómez Palacio 2016",
              post_content: 'Durante 2016 el objetivo y el <strong>sistema de derecho confiable</strong> destacan a nivel nacional las ciudades de Campeche, Aguascalientes y Saltillo en los primeros 3 lugares respectivamente. <strong>Gómez Palacio</strong> muestra un nivel medio bajo, llegando al lugar<strong> 42</strong> de 78. <h5><span lang="ES-MX">Fuente: IMCO, Índice de competitividad urbana 2016, subíndice Sistema de derecho confiable y eficiente. Este indicador considera, duración juicio de amparo directos, número de notarios, superficie urbana en tierra ejidal autos robados, muertes por homicidio, monto de robo de mercancías y percepción de inseguridad.</span></h5>',
              post_date: "2018-05-03 03:34:19",
              post_url: "http://observatoriodelalaguna.org.mx/?p=559",
              post_type: "",
              post_mime_type: "",
          },*/
        ],
        config: {
          api: 'https://app.observatoriodelalaguna.org.mx/public/',
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

