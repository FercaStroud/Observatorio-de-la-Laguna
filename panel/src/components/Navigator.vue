<template>
    <div style="background-color: #ffffff">
        <md-menu md-align-trigger>
            <md-button md-menu-trigger>Encuestas</md-button>

            <md-menu-content>
                <md-menu-item>
                    <router-link to="/encuesta/nueva/">Nueva Encuesta</router-link>
                </md-menu-item>
                <md-menu-item>
                    <router-link to="/encuesta/lista/">Ver todas las encuestas</router-link>
                </md-menu-item>
            </md-menu-content>
        </md-menu>

        <md-menu md-align-trigger>
            <md-button md-menu-trigger>Noticias</md-button>

            <md-menu-content>
                <md-menu-item>
                    <router-link to="/noticia/nueva/">Nueva Noticia</router-link>
                </md-menu-item>
                <md-menu-item>
                    <router-link to="/noticia/lista/">Ver todas las noticias</router-link>
                </md-menu-item>
            </md-menu-content>
        </md-menu>

        <md-menu md-align-trigger>
            <md-button md-menu-trigger>Cerrar sesión</md-button>
        </md-menu>

    </div>
</template>

<script>
    export default {
        name: "Navigator"
    }
</script>

<style scoped>

</style>