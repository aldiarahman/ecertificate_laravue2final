<template>
    <div class="content">
        <div class="title m-b-md tengah">
            <vue-typer text='ARS e-Certificate'
                       :repeat='Infinity'
                       :shuffle='false'
                       initial-action='typing'
                       :erase-delay='550'
                       erase-style='select-all'
                       :erase-on-complete='false'
                       caret-animation='expand'
            ></vue-typer>
        </div>
    </div>
</template>

<script>
    //improt locally
    import { VueTyper } from 'vue-typer'

    export default {
        components: {
            VueTyper
        },
        name : "Home"
    }
</script>

<style scoped>
    .tengah {
        margin: auto;
        position: absolute;
        top: 0; left: 0; bottom: 0; right: 0;
        height: 300px;
    }
</style>


