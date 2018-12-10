
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Moment from 'moment';
import VueRouter from 'vue-router';
import { Form, HasError, AlertError } from 'vform';
import Profile from './components/Profile.vue';
import Dashboard from './components/Dashboard.vue';
import Users from './components/Users.vue';
import Developer from './components/Developer.vue';
import VueProgressBar from 'vue-progressbar'
import swal from 'sweetalert2';

window.swal =  swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast =  toast;
window.Vue = require('vue');
window.Form = Form;
window.Fire = new Vue();

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter);
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '4px'
})
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(created){ 
    return Moment(created).format('MMMM Do YYYY'); 
}); 

let routes = [
    {
        path: '/dashboard',
        component: Dashboard,
    },
    {
        path: '/profile',
        component: Profile,
    },
    {
        path: '/users',
        component: Users,
    },
    {
        path: '/developer',
        component: Developer,
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
});

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

const app = new Vue({
    el: '#app',
    router,
});
