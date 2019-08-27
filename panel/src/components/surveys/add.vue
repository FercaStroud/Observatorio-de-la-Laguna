<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>add_circle</md-icon>
                Encuesta - Nueva
            </span>
        </md-app-toolbar>

        <md-app-drawer md-permanent="full" style="height: 100vh;" class="menu-container">
            <md-toolbar class="md-transparent" md-elevation="0">
                <img src="../../assets/images/observatorio-logo-completo.png">
            </md-toolbar>
            <Navigator/>
        </md-app-drawer>
        <md-app-content>
            <h2 style="">
                Agregar Encuesta
            </h2>
            <div class="md-layout md-gutter md-alignment-center">
                <div class="md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">

                    <md-field style="background-color: #ffffff">
                        <label>Nombre de la encuesta</label>
                        <md-input style="border-bottom: 1px solid black" v-model="regular" md-counter="30"></md-input>
                    </md-field>
                    <md-field style="background-color: #ffffff">
                        <label>descripción</label>
                        <md-textarea style="border-bottom: 1px solid black" v-model="textarea"></md-textarea>
                    </md-field>
                    <md-field md-inline style="background-color: #4693a9">
                        <label>Pregunta</label>
                        <md-input v-model="inline"></md-input>
                    </md-field>
                    <md-field md-inline style="background-color: #ffffff">
                        <label>Escribir respuesta</label>
                        <md-input v-model="inline"></md-input>
                    </md-field>
                    <md-button class="md-primary">Publicar encuesta</md-button>
                </div>
            </div>
        </md-app-content>
    </md-app>
</template>

<script>
    import Navigator from "../Navigator";
    export default {
        name: "addSurvey",
        components: {Navigator}
    }
</script>

<style scoped>

</style>