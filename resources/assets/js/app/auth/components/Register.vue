<template>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: large;">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" @submit.prevent="submit">
                    	<div class="form-group">
                            <label for="name" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" v-model="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" v-model="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	import { mapActions } from 'vuex';

	export default {
		data () {
			return {
				name: null,
				email: null,
				password: null,
				password_confirmation: null
			}
		},
		methods: {
			...mapActions ({
				register: 'auth/register'
			}),
			submit () {
				this.register({
					payload: {
						name: this.name, 
						email: this.email, 
						password: this.password, 
						password_confirmation: this.password_confirmation
					}
				});
			}
		}
	}
</script>