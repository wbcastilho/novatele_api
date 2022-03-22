/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('form-login', require('./components/forms/FormLogin.vue').default);
Vue.component('form-organization', require('./components/forms/FormOrganization.vue').default);

Vue.component('button-delete', require('./components/buttons/ButtonDelete.vue').default);
Vue.component('button-reactivate', require('./components/buttons/ButtonReactivate.vue').default);
Vue.component('button-user', require('./components/buttons/ButtonUser.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

require('admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min');

require('admin-lte/bower_components/fastclick/lib/fastclick');

require('admin-lte');
