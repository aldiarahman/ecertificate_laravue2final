<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah User</div>

                    <div class="card-body">

                        <form @submit.prevent="addUser">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" v-model="user.name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Alamat E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="user.email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="user.password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                                <div class="col-md-6">
                                    <select id="role" v-model="user.role" class="form-control" name="role">
                                        <option disabled value="">Pilih Role</option>
                                        <option value="1">User</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah
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
        data(){
            return {
                user:{}
            }
        },
        methods: {
            addUser(){
                let uri = 'http://127.0.0.1:8000/api/createuser';
                this.axios.post(uri, this.user).then((response) => {
                    this.$router.push({name: 'admin.dashboard'});
                });
            }
        }
    }
</script>

<style scoped>

</style>
