<template>
    <section style="margin-top: 20px">
        <div class="md-layout">
            <div class="md-layout-item md-size-25 md-elevation-3"
                 style="margin:20px;padding-bottom: 20px;
                 background-color: white; border-radius: 9px;">
                <img style="margin-bottom:20px; margin-top:20px; margin-left:10%;width: 80%; height: auto" src="../assets/images/observatorio-logo-completo.png">
                <md-progress-spinner
                        v-if="loading"
                        style="stroke:#e74b7e !important;"
                        :md-diameter="20"
                        :md-stroke="10" md-mode="indeterminate"></md-progress-spinner>
                <md-field style="">
                    <label>Nombre de Usuario</label>
                    <md-input v-model="username"></md-input>
                </md-field>

                <md-field style="">
                    <label>Password</label>
                    <md-input :md-toggle-password="false" type="password" v-model="password"></md-input>
                </md-field>
            </div>
        </div>
        <md-snackbar :style="[{backgroundColor: bgSnackbar, color: cSnackbar}]" :md-duration="10000"
                     :md-active.sync="showSnackbar" md-persistent>
            <span style="font-weight: bold; font-size: 1.2em">{{snackBarMessage}}</span>
            <md-button style="background-color: white; color:black" @click="showSnackbar = false">Cerrar</md-button>
        </md-snackbar>
        <div class="md-layout">
            <div class="md-layout-item md-size-25 ">
                <md-button @click="login" class="md-elevation-3" style="
                width:100%; background-color: white;
                margin-left:20px;
                color:#8b8b8b !important;">Enviar</md-button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "loginPage",
        data() {
            return {
                showSnackbar: false,
                snackBarMessage: '',
                bgSnackbar: '',
                cSnackbar: '',
                loading: false,
                username: '',
                password: ''
            }
        },
        methods: {
            login() {
                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'login', {
                    username: this.username,
                    password: this.password,
                }).then(response => {
                    let data = response.data;
                    if (data.response == "false") {
                        this.loading = false;
                        this.bgSnackbar = '#e74b7e'
                        this.cSnackbar = '#ffffff'
                        this.showSnackbar = true
                        this.snackBarMessage = 'Usuario y/o Contraseña incorrecta(s).'
                    } else {
                        this.$store.state.userLogged = true
                        this.loading = false;
                        this.showSnackbar = true
                        this.bgSnackbar = '#50ac66'
                        this.cSnackbar = '#ffffff'
                        this.snackBarMessage = 'Bienvenido.'
                        this.$router.push('/encuesta/lista');
                    }
                }, response => {
                    // error callback
                    console.log(response, 'error on deleteNewsById/Confirm()');
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                });
            }
        }
    }
</script>

<style>
    body, html{
        background-image: url("../assets/images/logo-sin-texto.jpg");
    }
    .md-button-content,.md-field label{
        color:#8b8b8b !important;
    }
    .md-field {
        border-bottom: 1px solid #8b8b8b;
        left: 5%;
        width: 90% !important;
    }
</style>