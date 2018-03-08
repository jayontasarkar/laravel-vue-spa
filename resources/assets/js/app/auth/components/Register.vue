<template>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: large;">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" @submit.prevent="submit">
                    	<div class="form-group" :class="{ 'has-error': errors.name }">
                            <label for="name" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" v-model="name">
                                <span class="help-block" v-if="errors.name">
                                    {{ errors.name[0] }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.email }">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" required>
                                <span class="help-block" v-if="errors.email">
                                    {{ errors.email[0] }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.password }">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password">
                                <span class="help-block" v-if="errors.password">
                                    {{ errors.password[0] }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" :class="{ 'has-error': errors.password_confirmation }">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" v-model="password_confirmation">
                                <span class="help-block" v-if="errors.password_confirmation">
                                    {{ errors.password_confirmation[0] }}
                                </span>
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
				password_confirmation: null,
                errors: []
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
					},
                    context: this
				}).then(() => {
                    this.$router.replace({ name: 'home' })
                });
			}
		}
	}
</script>