import HomePage from '../pages/home.vue';
import NewsPage from '../pages/news.vue';
import NotFoundPage from '../pages/404.vue';

let routes = [
  {
    path: '/',
    component: HomePage,
  },
  {
    path: '/news',
    name: 'news',
    component: NewsPage,
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
