<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>notification_important</md-icon>
                Indicadores - Nuevo
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
               Agregar Indicador
            </h2>
            <div class="md-layout md-gutter md-alignment-center">
                <div class="md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
                    <md-field style="background-color: #ffffff">
                        <label>Título del documento</label>
                        <md-input type="text" style="border-bottom: 1px solid black" v-model="textarea"></md-input>
                    </md-field>
                    <md-field style="background-color: #ffffff">
                        <md-input type="file" style="border-bottom: 1px solid black" ></md-input>
                    </md-field>
                    <md-button class="md-primary">Añadir</md-button>
                </div>
            </div>
        </md-app-content>
    </md-app>
</template>

<script>
    import Navigator from "../Navigator";
    export default {
        name: "addDocument",
        components: {Navigator}
    }
</script>

<style scoped>

</style>