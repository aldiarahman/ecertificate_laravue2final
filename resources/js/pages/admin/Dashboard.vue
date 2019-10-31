<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">User</div>

            <div class="card-body">
                <div>
                    <h3>List User</h3>
                    <div class="alert alert-danger" v-if="has_error">
                        <p>Error.</p>
                    </div>
                    <router-link :to="{ name: 'createuser' }" class="btn btn-success mb-3">Tambah User</router-link>
                    <table class="table">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        <tr v-for="user in users" v-bind:key="user.id" style="margin-bottom: 5px;">
                            <th scope="row">{{ user.id }}</th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <router-link :to="{name: 'edituser', params: { id: user.id }}" type="button" class="btn btn-primary">Edit</router-link>
                                <button type="button" class="btn btn-danger" @click.prevent="deleteUser(user.id)">Delete</button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                has_error: false,
                users: null
            }
        },

        mounted() {
            this.getUsers()
        },

        methods: {
            getUsers() {
                this.$http({
                    url: `users`,
                    method: 'GET'
                })
                    .then((res) => {
                        this.users = res.data.users
                    }, () => {
                        this.has_error = true
                    })
            },
            deleteUser(id) {
                let uri = 'http://127.0.0.1:8000/api/deleteuser/'+id;
                this.axios.delete(uri).then(response => {
                    let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                    this.users.splice(i, 1);
                });
            }
        }
    }
</script>
