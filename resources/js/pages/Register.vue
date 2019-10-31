<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
                            <p v-if="error == 'registration_validation_error'">Kesalahan validasi.</p>
                            <p v-else>Kesalahan, tidak bisa mendaftar saat ini. Jika masalah tetap ada, silakan hubungi administrator.</p>
                        </div>

                        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">

                            <div class="form-group row" v-bind:class="{ 'has-error': has_error && errors.name }">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" v-model="name">

                                    <span class="invalid-feedback" role="alert" v-if="has_error && errors.name">
                                        <strong>{{ errors.name }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row" v-bind:class="{ 'has-error': has_error && errors.email }">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Alamat E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="email">

                                    <span class="invalid-feedback" role="alert" v-if="has_error && errors.email">
                                        <strong>{{ errors.email }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="password">

                                    <span class="invalid-feedback" role="alert" v-if="has_error && errors.password">
                                        <strong>{{ errors.password }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                has_error: false,
                error: '',
                errors: {},
                success: false
            }
        },
        methods: {
            register() {
                var app = this
                this.$auth.register({
                    data: {
                        name: app.name,
                        email: app.email,
                        password: app.password,
                        password_confirmation: app.password_confirmation
                    },
                    success: function () {
                        app.success = true
                        this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
                    },
                    error: function (res) {
                        console.log(res.response.data.errors)
                        app.has_error = true
                        app.error = res.response.data.error
                        app.errors = res.response.data.errors || {}
                    }
                })
            }
        }
    }
</script>
