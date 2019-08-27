<template>
    <div>
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
    </div>
</template>
<script>
    import Navigator from "../Navigator";

    export default {
        name: "answers",
        data() {
            return {
                showSnackbar: false,
                snackBarMessage: '',
                selectedItemId: null,
                isActiveDialogConfirm: false,
                bgSnackbar: '',
                cSnackbar: '',
                loading: false,
            }
        },
        created: function () {
        },
        mounted: function () {
            //this.getItemsFromServer()

        },
        methods: {
            sendForm(arg){
            },
            onConfirm() {
            },
            onCancel() {
            },
        },
        components: {Navigator, }
    }
</script>

<style scoped>

</style>