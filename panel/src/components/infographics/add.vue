<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>add_circle</md-icon>
                Infografía - Nueva
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
                Agregar Infografía
            </h2>
            <div class="md-layout md-gutter md-alignment-center">
                <div class="md-layout-item">
                    <md-field style="background-color: #ffffff">
                        <label>Título</label>
                        <md-input md-counter="100" style="border-bottom: 1px solid black" v-model="title"></md-input>
                    </md-field>
                    <md-field style="background-color: #ffffff">
                        <input
                                style="margin-top: 15px;"
                                type="file"
                                color="#d9534f"
                                label="Imagen (Infografía)"
                                required
                                accept="image/*"
                                id="fileInput" ref="file1"
                                @change="onChangeFileUpload()"
                        />
                    </md-field>
                    <md-button @click="sendForm" class="md-primary">Añadir</md-button>
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
        name: "addInfographic",
        data() {
            return {
                showSnackbar: false,
                snackBarMessage: '',
                bgSnackbar: '',
                cSnackbar: '',
                loading: false,
                file: '',
                title: '', //100
            }
        },
        methods: {
            onChangeFileUpload() {
                this.file = this.$refs.file1.files[0];
            },
            sendForm() {
                this.loading = true;

                let formData = new FormData();
                formData.append('title', this.title)
                formData.append('src', this.file)

                this.$http.post(this.$store.state.config.api + 'infographics/add', formData).then(response => {
                    this.loading = false;
                    this.showSnackbar = true
                    this.bgSnackbar = '#50ac66'
                    this.cSnackbar = '#ffffff'
                    if (response.body.success === true) {
                        this.snackBarMessage = 'Elemento guardado con éxito.'
                    } else {
                        this.bgSnackbar = '#e74b7e'
                        this.cSnackbar = '#ffffff'
                        this.showSnackbar = true
                        this.snackBarMessage = 'Ha ocurrido un error inesperado, intente más tarde.'
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
        },
        components: {Navigator}
    }
</script>

<style scoped>

</style>