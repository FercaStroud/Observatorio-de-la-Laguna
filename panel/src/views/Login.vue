<template>
    <section style="margin-top: 20px">
        <div class="md-layout">
            <div class="md-layout-item md-size-25"
                 style="padding-bottom: 20px; background-color: white; border-radius: 9px;">
                <md-field>
                    <label>Nombre de Usuario</label>
                    <md-input v-model="type"></md-input>
                    <span class="md-helper-text">Aquí es para poner el usuario :v</span>
                </md-field>

                <md-field>
                    <label>Password</label>
                    <md-input :md-toggle-password="false" type="password" v-model="type"></md-input>
                    <span class="md-helper-text">Píquele bien</span>
                </md-field>
            </div>
        </div>
        <div class="md-layout">
            <div class="md-layout-item">
                <md-button style="margin-left:30px;color:#e74b7e">Enviar</md-button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "loginPage"
    }
</script>

<style scoped>

</style>