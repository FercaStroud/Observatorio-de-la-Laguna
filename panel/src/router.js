import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/encuesta/nueva',
      name: 'surveyAdd',
      component: () => import('./views/surveys/add.vue')
    },
    {
      path: '/login',
      name: 'loginPage',
      component: () => import('./views/Login.vue')
    }
  ]
})
