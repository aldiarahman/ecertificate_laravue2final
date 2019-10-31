<template>
    <div id="main">
        <header id="header">
            <navigationMenu></navigationMenu>
        </header>
        <br><br>
        <div id="content">
            <vue-page-transition name="zoom">
                <router-view></router-view>
                </vue-page-transition>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import VuePageTransition from 'vue-page-transition'

    Vue.use(VuePageTransition)

    import navigationMenu from './components/Menu.vue'
    export default {
        data() {
            return {
                //
            }
        },
        components: {
            navigationMenu
        }
    }
</script>

<style scoped>

</style>
