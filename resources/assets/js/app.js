
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VeeValidate from 'vee-validate';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import * as VueGoogleMaps from "vue2-google-maps";
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
Vue.use(Vuetify)
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyBcVQO3dxqUFjgjyWh51BKqD1Bj87-TgV8",
        libraries: "places" // necessary for places input
    }
});
Vue.use(BootstrapVue);
Vue.use(VeeValidate,{
    events: 'input|change|blur',
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//components
Vue.component('example', require('./components/Example.vue'));
Vue.component('add-more-category', require('./components/categories/AddMoreCategory.vue'));
Vue.component('add-new-restaurant', require('./components/restaurants/AddNewRestaurant.vue'));

//Registration process

Vue.component('registration-form', require('./components/restaurants/auth/RegistrationForm.vue'));

const app = new Vue({
    el: '#app'
});
