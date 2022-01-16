import router from './router.js'

require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue'

import '../sass/index.css';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';

import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8000/api';
// axios.defaults.headers.common = {'Authorization': `Bearer ${localStorage.getItem('token')}`};

Vue.component('pagination', require('laravel-vue-pagination'));

new Vue({
    el: '#app',

    router,

    components: {App}
});
