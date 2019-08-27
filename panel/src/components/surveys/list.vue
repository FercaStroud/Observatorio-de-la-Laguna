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
                <md-progress-spinner
                        v-if="loading"
                        style="stroke:#e74b7e !important;"
                        :md-diameter="20"
                        :md-stroke="10" md-mode="indeterminate"></md-progress-spinner>
                Todas las Encuestas
            </h2>
            <div class="md-layout md-gutter md-alignment-center">
                <div class="md-layout-item">
                    <md-card style="margin-top: 20px" class="md-accent" md-with-hover v-for="(item, index) in items" :key="index">
                        <md-ripple>
                            <md-card-header>
                                <div class="md-title">{{item.title}}</div>
                            </md-card-header>

                            <md-card-content>
                                {{item.description}}

                                <div>
                                    <md-button>
                                        <md-icon>list_alt</md-icon>
                                        Ver Respuestas
                                    </md-button>
                                </div>
                            </md-card-content>

                            <md-card-actions>
                                <md-button>
                                    <md-icon>playlist_add</md-icon>
                                    Agregar Respuesta
                                </md-button>
                                <md-button>
                                    <md-icon>cloud_download</md-icon>
                                    Resultados
                                </md-button>
                                <md-button v-if="item.status" @click="changeStatus(item.id, item.status)">
                                    <md-icon>pause_circle_filled</md-icon>
                                    Deshabilitar
                                </md-button>
                                <md-button v-else @click="changeStatus(item.id, item.status)">
                                    <md-icon>play_circle_filled</md-icon>
                                    Habilitar
                                </md-button>
                                <md-button @click="deleteItemById(item.id)">
                                    <md-icon>delete_forever</md-icon>
                                    Eliminar
                                </md-button>
                            </md-card-actions>
                        </md-ripple>
                    </md-card>
                </div>
            </div>
            <md-dialog-confirm style="background-color: white; z-index: 6 !important;"
                               :md-active.sync="isActiveDialogConfirm"
                               md-title="¿Está seguro?"
                               md-content="Se eliminará de forma permanente."
                               md-confirm-text="Confirmar"
                               md-cancel-text="Cancelar"
                               @md-cancel="onCancel"
                               @md-confirm="onConfirm"/>
            <md-snackbar :style="[{backgroundColor: bgSnackbar, color: cSnackbar}]" :md-duration="10000"
                         :md-active.sync="showSnackbar" md-persistent>
                <span style="font-weight: bold; font-size: 1.2em">{{snackBarMessage}}</span>
                <md-button style="background-color: white; color:black" @click="showSnackbar = false">Cerrar</md-button>
            </md-snackbar>
        </md-app-content>
    </md-app>
</template>

<script>
    import Navigator from "../Navigator";

    export default {
        name: "listSurveys",
        data() {
            return {
                showSnackbar: false,
                snackBarMessage: '',
                selectedItemId: null,
                isActiveDialogConfirm: false,
                bgSnackbar: '',
                cSnackbar: '',
                loading: false,
                items: []
            }
        },
        created: function () {
        },
        mounted: function () {
            this.getItemsFromServer()
        },
        methods: {
            changeStatus(id, status) {
                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'survey/status/', {
                    id: id, status: !status
                }).then(response => {
                    this.loading = false;
                    this.getItemsFromServer();
                    this.showSnackbar = true
                    this.bgSnackbar = '#50ac66'
                    this.cSnackbar = '#ffffff'
                    this.snackBarMessage = 'Estatus cambiado con éxito.'
                }, response => {
                    // error callback
                    console.log(response, 'error on deleteNewsById/Confirm()');
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                });
            },
            deleteItemById(id) {
                this.selectedItemId = id
                this.isActiveDialogConfirm = true
            },
            onConfirm() {
                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'survey/delete', {
                    id: this.selectedItemId
                }).then(response => {
                    this.loading = false;
                    this.getItemsFromServer();
                    this.showSnackbar = true
                    this.bgSnackbar = '#50ac66'
                    this.cSnackbar = '#ffffff'
                    this.snackBarMessage = 'Elemento eliminado con éxito.'
                }, response => {
                    // error callback
                    console.log(response, 'error on deleteNewsById/Confirm()');
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                });
            },
            onCancel() {
            },
            getItemsFromServer() {
                this.items = []

                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'surveys').then(response => {
                    this.items = response.body;
                    if (this.items.length === 0) {
                        this.showSnackbar = true
                        this.bgSnackbar = '#50ac66'
                        this.cSnackbar = '#ffffff'
                        this.snackBarMessage = 'Éxito, sin datos para mostrar.'
                    }
                    this.loading = false;
                }, response => {
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                    // error callback
                    console.log(response, 'error on getItemsFromServer / documents');
                    this.loading = false;
                });
            },
        },
        components: {Navigator}
    }
</script>

<style scoped>
    .md-card.md-with-hover {
        background-color: white;
    }
</style>