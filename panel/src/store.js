import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    config: {
      //api: 'https://app.observatoriodelalaguna.org.mx/api/public/',
      api: 'http://localhost:8000/',
      //api: 'http://192.168.1.73/public/',
    },
  },
  mutations: {

  },
  actions: {

  }
})
