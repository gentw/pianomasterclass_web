import Vue from 'vue'
import Vuex from 'vuex';
import Resource from 'vue-resource'
import Router from 'vue-router'
import * as VueGoogleMaps from 'vue2-google-maps'
import VueMoment from 'vue-moment'

// VUE MULTILANGUAGE
import vuexI18n from 'manjakos-vuex18n';

import App from './components/App.vue'
import Home from './components/Home.vue'
import PageComponent from './components/PageComponent.vue'

const store = new Vuex.Store();
Vue.use(vuexI18n.plugin, store);
const DEFAULT_LANGUAGE = 'en';

// Install plugins
Vue.use(Router)
Vue.use(Resource)
Vue.use(VueMoment)


Vue.use(VueGoogleMaps, {
  load: 'AIzaSyBJFggZoYEll4HUmYwXbPXv48-7VRIZ_T4'
})

const translationsEn = require('../lang/en.json');
const translationsEs = require('../lang/es.json');
const translationsFr = require('../lang/fr.json');
const translationsAe = require('../lang/ae.json');
const translationsChi = require('../lang/chi.json');

// add translations directly to the application
Vue.i18n.add('en', translationsEn);
Vue.i18n.add('es', translationsEs);
Vue.i18n.add('fr', translationsFr);
Vue.i18n.add('ae', translationsAe);
Vue.i18n.add('chi', translationsChi);

// Vue.localStorage.set('lang', DEFAULT_LANGUAGE)

Vue.filter('truncate', function (string, value) {
  return string.substring(0, value) + '...';
})

// route config
let routes = [
  {
    path: '/',
    name: 'home',
    redirect: '/en/home',
    component: Home,
    children: [
      {
        path: ':lang/:slug',
        name: 'mainchilds',
        component: Home
      }
    ],
  },
  {
    path: '/:lang/:parent/:id/:slug',
    name: 'pagecomponent',
    component: PageComponent
  },
  { path: '*', redirect: '/' }
]

// Set up a new router
let router = new Router({
  mode: 'history',
  routes: routes
})

router.beforeEach(function (to, from, next) {
  Vue.config.lang = to.params.lang
  Vue.i18n.set('en');

  window.scrollTo(0, 0)
  next();

});

// Start up our app
new Vue({
  store,
  router: router,
  render: h => h(App)
}).$mount('#app')
