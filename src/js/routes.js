import HomePage from '../pages/home.vue';
import SurveyPage from '../pages/survey.vue';
import NewsPage from '../pages/news.vue';
import DocumentsPage from '../pages/documents.vue';
import IndicatorsPage from '../pages/indicators.vue';
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
    path: '/documents',
    name: 'documents',
    component: DocumentsPage,
  },
  {
    path: '/indicators',
    name: 'indicators',
    component: IndicatorsPage,
  },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];

export default routes;
