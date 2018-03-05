import router from './router';
import store from './vuex';

import localforage from 'localforage';
localforage.config({
	driver: localforage.LOCALSTORAGE,
	storeName: 'codebite'
});

require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/App.vue'));
Vue.component('navigation', require('./components/Navigation.vue'));

const app = new Vue({
    el: '#app',
    store: store,
    router: router
});
