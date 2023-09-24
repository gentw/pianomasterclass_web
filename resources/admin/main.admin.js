import Vue from 'vue'
import Resource from 'vue-resource'
import Router from 'vue-router'



// COMPONENTS
import App from './components/App.vue'
import DashboardComponent from './components/DashboardComponent.vue'

// CONFIGURATION COMPONENTS
import ConfigurationComponent from './components/configuration/ConfigurationComponent.vue'
import AddPageTypeComponent from './components/configuration/components/AddPageTypeComponent.vue'
import AddPageTypeCategoryComponent from './components/configuration/components/AddPageTypeCategoryComponent.vue'

//MODULES COMPONENT 
import ModulesComponent from './components/modules/ModulesComponent.vue'
import AddEntryComponent from './components/modules/components/AddEntryComponent.vue'
import ManyEntriesComponent from './components/modules/components/ManyEntriesComponent.vue'

// USERS
import UsersComponent from './components/users/UsersComponent.vue'

// HELPERS
import Ckeditor from './components/helpers/TextEditor.vue'

// SERVICES
import notification from './services/notification';

// Install plugins
Vue.use(Router)
Vue.use(Resource)


var routes = [
    {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: DashboardComponent
    },
    {
      path: '/admin/configuration',
      name: 'configuration',
      component: ConfigurationComponent
    },
    {
      path: '/admin/users',
      name: 'users',
      component: UsersComponent
    },
    {
      path: '/admin/configuration/add-page-type/:id',
      name: 'pagetypeadd',
      component: AddPageTypeComponent
    },
    {
      path: '/admin/configuration/add-page-type-categories/:id',
      name: 'pagetypecategoryadd',
      component: AddPageTypeCategoryComponent
    },
    {
      path: '/admin/modules/:slug',
      name: 'modules',
      component: ModulesComponent
    },
    {
      path: '/admin/entry/:slug',
      name: 'entry',
      component: AddEntryComponent
    },
    {
      path: '/admin/modules/:manySlug/:manyId',
      name: 'manyentries',
      component: ManyEntriesComponent
    },
        {
      path: '/admin/modules/:manySlug/:manyId/:entityId',
      name: 'manyentries',
      component: ManyEntriesComponent
    }

]

// Set up a new router
var router = new Router({
  mode: 'history',
  routes: routes
})


new Vue({
  router: router,
  render: h => h(App)
}).$mount('#admin')

