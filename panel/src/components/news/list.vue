<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>poll</md-icon>
                Noticias - Listado
            </span>
        </md-app-toolbar>
        <md-app-drawer md-permanent="full" style="height: 100vh;" class="menu-container">
            <md-toolbar class="md-transparent" md-elevation="0">
                <img alt="" src="../../assets/images/observatorio-logo-completo.png">
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
                Todas las noticias
            </h2>
            <md-list class="md-triple-line">
                <md-list-item style="border-bottom: 1px solid #569cb0;"
                    v-for="(item, index) in news" :key="index">
                    <md-avatar style="border-radius: 0px !important;">
                        <img style="width: 100%;" src="../../assets/images/logo-sin-texto.png" alt="logo">
                    </md-avatar>
                    <div class="md-list-item-text" style="white-space: initial;">
                        <p>{{item.text}}</p>
                    </div>
                    <md-button class="md-icon-button md-list-action" @click="deleteNewsById(item.id)">
                        <md-icon class="delete-button">delete_forever</md-icon>
                        <md-tooltip md-direction="bottom">
                            <span style="color:#ed1d8e">Eliminar</span>
                        </md-tooltip>
                    </md-button>
                </md-list-item>
            </md-list>
            <md-dialog-confirm style="background-color: white; z-index: 6 !important;"
                    :md-active.sync="isActiveDialogConfirm"
                    md-title="¿Está seguro?"
                    md-content="Se eliminará de forma permanente."
                    md-confirm-text="Confirmar"
                    md-cancel-text="Cancelar"
                    @md-cancel="onCancel"
                    @md-confirm="onConfirm" />
            <md-snackbar :style="[{backgroundColor: bgSnackbar, color: cSnackbar}]" :md-duration="10000" :md-active.sync="showSnackbar" md-persistent>
                <span style="font-weight: bold; font-size: 1.2em">{{snackBarMessage}}</span>
                <md-button style="background-color: white; color:black" @click="showSnackbar = false">Cerrar</md-button>
            </md-snackbar>
        </md-app-content>
    </md-app>
</template>
<script>
    import Navigator from "../Navigator";

    export default {
        name: "listNews",
        components: {Navigator},
        data() {
            return {
                showSnackbar: false,
                snackBarMessage: '',
                selectedItemId: null,
                isActiveDialogConfirm: false,
                bgSnackbar: '',
                cSnackbar:'',
                loading: false,
                news: []
            }
        },
        created: function () {
        },
        mounted: function () {
            this.getNews()
        },
        methods: {
            deleteNewsById(id){
                this.selectedItemId = id
                this.isActiveDialogConfirm = true
            },
            onConfirm () {
                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'news/delete',{
                    id: this.selectedItemId
                }).then(response => {
                    this.loading = false;
                    this.getNews();
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
            onCancel () {
            },
            getNews() {
                this.news = []

                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'news').then(response => {
                    this.news = response.body;

                    if (this.news.length === 0) {
                        this.showSnackbar = true
                        this.bgSnackbar = '#50ac66'
                        this.cSnackbar = '#ffffff'
                        this.snackBarMessage = 'Éxito, sin datos para mostrar.'
                    }
                    this.loading = false;
                }, response => {
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                    // error callback
                    console.log(response, 'error on getNews');
                    this.loading = false;
                });
            },
        }
    }
</script>

<style scoped>
    .delete-button {
        color: black;
    }

    .delete-button:hover {
        color: #ed1d8e;
    }
</style>