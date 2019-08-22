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
      component: () => import('./components/surveys/add.vue')
    },
    {
      path: '/login',
      name: 'loginPage',
      component: () => import('./views/Login.vue')
    },
      {
          path: '/encuesta/lista',
          name: 'surveyList',
          component: () => import('./components/surveys/list.vue')
      },
      {
          path: '/noticia/nueva',
          name: 'newsAdd',
          component: () => import('./components/news/add.vue')
      },
      {
          path: '/noticia/lista',
          name: 'newsList',
          component: () => import('./components/news/list.vue')
      }
  ]
})
