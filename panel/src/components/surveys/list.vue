<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>add_circle</md-icon>
                Encuestas - Lista
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
                Todas las Encuestas
            </h2>
            <div class="md-layout md-gutter md-alignment-center">
                <div class="md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
                    <md-card class="md-accent" md-with-hover>
                        <md-ripple>
                            <md-card-header>
                                <div class="md-title">Nombre de la encuesta</div>
                            </md-card-header>

                            <md-card-content>
                                Descripción de la encuesta
                            </md-card-content>

                            <md-card-actions>
                                <md-button>
                                    <md-icon>cloud_download</md-icon>
                                    Resultados
                                </md-button>
                                <md-button>
                                    <md-icon>pause_circle_filled</md-icon>
                                    Deshabilitar
                                </md-button>
                                <md-button>
                                    <md-icon>play_circle_filled</md-icon>
                                    Habilitar
                                </md-button>
                                <md-button>
                                    <md-icon>delete_forever</md-icon>
                                    Eliminar
                                </md-button>
                            </md-card-actions>
                        </md-ripple>
                    </md-card>
                </div>
            </div>
        </md-app-content>
    </md-app>
</template>

<script>
    import Navigator from "../Navigator";

    export default {
        name: "listSurveys",
        components: {Navigator}
    }
</script>

<style scoped>
    .md-card.md-with-hover {
        background-color: white;
    }
</style>