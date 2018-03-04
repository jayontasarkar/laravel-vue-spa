<template>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<router-link :to="{ name: 'home' }" class="navbar-brand">MY&nbsp;SPA</router-link>
			</div>
	
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right" v-if=" !user.authenticated ">
					<li><router-link :to="{ name: 'login' }">Login</router-link></li>
					<li><router-link :to="{ name: 'register' }">Register</router-link></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" v-else>
					<li><router-link :to="{ name: 'timeline' }">My Timeline</router-link></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							{{ user.data.email }}
							 <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Settings</a></li>
							<li class="divider"></li>
							<li><a href="#">Profile</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</template>

<script>
	import { mapGetters } from 'vuex';

	export default {
		computed: mapGetters({
			user: 'auth/user'
		})
	}
</script>