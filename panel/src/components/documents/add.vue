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
                <md-progress-spinner
                        v-if="loading"
                        style="stroke:#e74b7e !important;"
                        :md-diameter="20"
                        :md-stroke="10" md-mode="indeterminate"></md-progress-spinner>
                Agregar Indicador
            </h2>
            <div class="md-layout md-gutter md-alignment-center">
                <div class="md-layout-item">
                    <md-field style="background-color: #ffffff">
                        <label>Título del documento</label>
                        <md-input type="text" style="border-bottom: 1px solid black"  md-counter="140" v-model="title"></md-input>
                    </md-field>
                    <div>
                        <label style="cursor: pointer; font-weight: bold;" for="fileInput">
                            Selecciona el archivo PDF a subir.</label> <br/>
                        <input type="file" id="fileInput" ref="file"
                               accept="application/pdf"
                               @change="onChangeFileUpload()"/>
                    </div>
                    <md-button @click="sendForm" style="margin-top: 20px" class="md-primary">Añadir</md-button>
                </div>
            </div>
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
        name: "addDocument",
        data() {
            return {
                showSnackbar: false,
                snackBarMessage: '',
                bgSnackbar: '',
                cSnackbar: '',
                loading: false,
                title: '',
                file: null,
            }
        },
        methods: {
            sendForm() {
                this.loading = true;

                let formData = new FormData();
                formData.append('pdfFile', this.file);
                formData.append('title', this.title);

                this.$http.post(this.$store.state.config.api + 'documents/add',
                    formData
                ).then(response => {
                    this.loading = false;

                    if (response.data.success === true) {
                        this.bgSnackbar = '#50ac66'
                        this.cSnackbar = '#ffffff'
                        this.showSnackbar = true
                        this.snackBarMessage = 'Elemento guardado con éxito.'
                    } else {
                        this.bgSnackbar = '#e74b7e'
                        this.cSnackbar = '#ffffff'
                        this.showSnackbar = true
                        this.snackBarMessage = 'Ha ocurrido un error inesperado, verifique sus datos.'
                    }
                }, response => {
                    // error callback
                    console.log(response, 'error on sendForm');
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Servidor no disponible, intente más tarde.'
                });

            },
            onChangeFileUpload() {
                this.file = this.$refs.file.files[0];
            }
        },
        components: {Navigator}
    }
</script>

<style scoped>

</style>