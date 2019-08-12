import HomePage from '../pages/home.vue';
import SurveyPage from '../pages/survey.vue';
import NotFoundPage from '../pages/404.vue';

let routes = [
  {
    path: '/',
    component: HomePage,
  },
  {
    path: '/survey',
    name: 'survey',
    component: SurveyPage,
    //component: () => import('../pages/news.vue'),
  },
  // {
  //   path: '/dynamic-route/blog/:blogId/post/:postId/',
  //   component: DynamicRoutePage,
  // },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];

export default routes;
