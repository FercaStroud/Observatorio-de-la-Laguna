import HomePage from '../pages/home.vue';
import SurveyPage from '../pages/survey.vue';
import NewsPage from '../pages/news.vue';
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
  },
  {
    path: '/news',
    name: 'news',
    component: NewsPage,
  },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];

export default routes;
