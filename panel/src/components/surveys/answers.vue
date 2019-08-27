<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>add_circle</md-icon>
                Pregunta - Nueva
            </span>
        </md-app-toolbar>

        <md-app-drawer md-permanent="full" style="height: 100vh;" class="menu-container">
            <md-toolbar class="md-transparent" md-elevation="0">
                <img src="../../assets/images/observatorio-logo-completo.png">
            </md-toolbar>
            <Navigator/>
        </md-app-drawer>
        <md-app-content>
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
            <SurveyBuilder :options="SurveyBuilderJson"/>

        </md-app-content>
    </md-app>
</template>
<script>
    import Navigator from "../Navigator";
    import {SurveyBuilder, SurveyBuilderJson} from 'vue-survey-builder';

    export default {
        name: "answers",
        data() {
            return {
                SurveyBuilderJson: {
                    "id": null,
                    "question": null,
                    "type": null,
                    "multiSelect": false,
                    "characterLimited": false,
                    "hasMinMax": false,
                    "allowDecimals": false,
                    "sequence": null,
                    "minValue": 1,
                    "maxValue": 8,
                    "labels": [],
                    "dateFormat": "MM/DD/YYYY",
                    "timeFormat": "12",
                    "intervals": 2,
                    "textLimit": 1024,
                    "units": null,
                    "options": [
                        {
                            "body": null,
                            "sequence": 1
                        },
                        {
                            "body": null,
                            "sequence": 2
                        }
                    ]
                },
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
            this.$root.$on('add-update-question', question => {
                window.console.log(question);
            });
        },
        methods: {
            onConfirm() {
            },
            onCancel() {
            },
        },
        components: {Navigator,SurveyBuilder, SurveyBuilderJson}
    }
</script>

<style scoped>

</style>