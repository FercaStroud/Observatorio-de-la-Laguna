import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import VueMaterial from 'vue-material'
import vueResource from 'vue-resource'
import 'vue-material/dist/vue-material.min.css'

import './assets/scss/styles.scss'

Vue.use(VueMaterial)
Vue.use(vueResource)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
