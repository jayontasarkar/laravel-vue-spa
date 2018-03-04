import router from './router';
import store from './vuex';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/App.vue'));
Vue.component('navigation', require('./components/Navigation.vue'));

const app = new Vue({
    el: '#app',
    store: store,
    router: router
});
