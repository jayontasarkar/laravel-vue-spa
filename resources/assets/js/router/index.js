import Vue from 'vue';
import Router from 'vue-router';

import { routes as routes } from '../app/index';

Vue.use(Router);

const router = new Router({
	mode:   'history',
	routes:  routes,
	linkActiveClass: "active"
});

// BeforeEach hook

export default router;
