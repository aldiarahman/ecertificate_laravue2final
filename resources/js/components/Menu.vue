<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand"><router-link :to="{name: 'home'}">
            <h1><span class="badge badge-light">ARS</span></h1>
        </router-link></a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!--UNLOGGED-->
                <li v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                    <router-link  :to="{ name : route.path }" :key="key" type="button" class="btn btn-secondary">
                        {{route.name}}
                    </router-link>
                    &nbsp;
                </li>
                <!--LOGGED USER-->
                <li v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link  :to="{ name : route.path }" :key="key" type="button" class="btn btn-secondary">
                        {{route.name}}
                    </router-link>
                    &nbsp;
                </li>
                <!--LOGGED ADMIN-->
                <li v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path">
                    <router-link  :to="{ name : route.path }" :key="key" type="button" class="btn btn-secondary">
                        {{route.name}}
                    </router-link>
                    &nbsp;
                </li>

                <!--LOGOUT-->
                <li v-if="$auth.check()">
                    <button type="button" class="btn btn-secondary" @click.prevent="$auth.logout()">Logout</button>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>
    export default {
        data() {
            return {
                routes: {
                    // UNLOGGED
                    unlogged: [
                        {
                            name: 'Register',
                            path: 'register'
                        },
                        {
                            name: 'Login',
                            path: 'login'
                        }
                    ],          // LOGGED USER
                    user: [
                        {
                            name: 'Dashboard',
                            path: 'dashboard'
                        }
                    ],
                    // LOGGED ADMIN
                    admin: [
                        {
                            name: 'Data User',
                            path: 'admin.dashboard'
                        },
                        {
                            name: 'Data Kegiatan',
                            path: 'listkegiatan'
                        },
                    ]
                }
            }
        },
        mounted() {
            //
        }
    }
</script>

