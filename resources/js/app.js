
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');


//Components
import Profile from './components/Profile.vue';
import Dashboard from './components/Dashboard.vue';
import Users from './components/Users.vue';
import RelatorioUsuarios from './components/Relatorios/RelatorioUsuarios.vue';

window.Vue = require('vue');
import Moment from 'moment';
import { Form, HasError, AlertError } from 'vform';

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);


import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('pagination', require('laravel-vue-pagination'));

import Developer from './components/Developer.vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })

let routes = [
    { path: '/dashboard', component: Dashboard },
    { path: '/developer', component: Developer },
    { path: '/users', component: Users },
    { path: '/profile', component: Profile },
    { path: '/relatorioUsuarios', component: RelatorioUsuarios },
    { path: '*', component: require('./components/NotFound.vue')}

  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(created){ 
    return Moment(created).format('MMMM Do YYYY'); 
}); 

window.Fire =  new Vue();

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
    'not-found',
    require('./components/NotFound.vue')
);
Vue.component(
    'sidebar-user',
    require('./components/layout/SidebarUser.vue')
);


const app = new Vue({
    el: '#app',
    router,
    data:{
        search:'',
    },
    methods:{
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        }, 500),

        printme(){
            window.print();
        }
    },
    
});
