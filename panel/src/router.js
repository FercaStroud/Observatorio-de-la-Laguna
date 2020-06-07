import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'login',
            component: () => import('./views/Login.vue')
        },
        {
            path: '/infografias/nueva/',
            name: 'addInfographic',
            component: () => import('./components/infographics/add.vue')
        },
        {
            path: '/infografias/lista/',
            name: 'listInfographic',
            component: () => import('./components/infographics/add.vue')
        },
        {
            path: '/encuesta/nueva',
            name: 'addSurvey',
            component: () => import('./components/surveys/add.vue')
        },
        {
            path: '/encuesta/lista',
            name: 'listSurveys',
            component: () => import('./components/surveys/list.vue')
        },
        {
            path: '/noticia/nueva',
            name: 'addNews',
            component: () => import('./components/news/add.vue')
        },
        {
            path: '/noticia/lista',
            name: 'listNews',
            component: () => import('./components/news/list.vue')
        },
        {
            path: '/indicador/nuevo',
            name: 'addDocument',
            component: () => import('./components/documents/add.vue')
        },
        {
            path: '/indicadores/lista',
            name: 'listDocument',
            component: () => import('./components/documents/list.vue')
        },
    ]
})
