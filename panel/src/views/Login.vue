<template>
    <section style="margin-top: 20px">
        <div class="md-layout">
            <div class="md-layout-item md-size-25 md-elevation-3"
                 style="margin:20px;padding-bottom: 20px;
                 background-color: white; border-radius: 9px;">
                <img style="margin:20px;width: 300px; height: auto" src="../assets/images/observatorio-logo-completo.png">

                <md-field style="">
                    <label>Nombre de Usuario</label>
                    <md-input v-model="type"></md-input>
                </md-field>

                <md-field style="">
                    <label>Password</label>
                    <md-input :md-toggle-password="false" type="password" v-model="type"></md-input>
                </md-field>
            </div>
        </div>
        <div class="md-layout">
            <div class="md-layout-item md-size-25 ">
                <md-button class="md-elevation-3" style="
                width:100%; background-color: white;
                margin-left:20px;
                color:#8b8b8b !important;">Enviar</md-button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "loginPage"
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