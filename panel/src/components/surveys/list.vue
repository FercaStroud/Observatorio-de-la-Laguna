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
                    <md-card style="margin-top: 20px" class="md-accent"
                             md-with-hover v-for="(item, index) in items" :key="index">
                        <md-ripple>
                            <md-card-header>
                                <div class="md-title">{{item.title}}</div>
                            </md-card-header>

                            <md-card-content>
                                {{item.description}}

                                <div>
                                    <md-button @click="getQuestionsById(item.id)">
                                        <md-icon>list_alt</md-icon>
                                        Ver preguntas en esta encuesta
                                    </md-button>
                                </div>

                                <div v-for="(question,index) in questions[item.id]" :key="index"
                                style="background-color: #fcfcfc; padding: 10px; margin-top: 10px">
                                    <div style="width: 50%; float: left">
                                        <strong>Pregunta: </strong>{{ question.title }} <br/>
                                        <strong>Tipo: </strong>{{ question.type }} <br/>
                                    </div>
                                    <div style="width: 50%; float: left; border-left: 1px solid black">
                                        <strong style="margin-left: 10px">Respuestas: </strong><br/>

                                        <ul style="margin-left: 10px">
                                            <li>adsfsd</li>
                                            <li>adsfsd</li>
                                            <li>adsfsd</li>
                                        </ul>
                                    </div>
                                    <hr/>
                                </div>
                            </md-card-content>

                            <md-card-actions>
                                <md-button @click="selectedAnswer = item; answerAddDialog = true;">
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

            <md-dialog style="background-color: white; z-index: 6 !important; width:80%"
                       :md-click-outside-to-close="false" :md-active.sync="answerAddDialog">
                <md-dialog-title>
                    <md-progress-spinner
                            v-if="loading"
                            style="stroke:#e74b7e !important;"
                            :md-diameter="20"
                            :md-stroke="10" md-mode="indeterminate"></md-progress-spinner>
                    Añadir Respuesta
                </md-dialog-title>
                <md-dialog-content>
                    <p>
                        <strong>La respuesta será agregada a la pregunta:</strong>
                        {{selectedAnswer.title}}
                    </p>
                    <SurveyBuilder :options="SurveyBuilderJson"/>
                </md-dialog-content>
                <md-dialog-actions>
                    <md-button class="md-primary" @click="answerAddDialog = false">Cerrar</md-button>
                </md-dialog-actions>
            </md-dialog>

        </md-app-content>
    </md-app>
</template>

<script>
    import Navigator from "../Navigator";
    import {SurveyBuilder, SurveyBuilderJson} from 'vue-survey-builder';

    export default {
        name: "listSurveys",
        data() {
            return {
                SurveyBuilderJson: {
                    "question": null,
                    "type": null,
                    "multiSelect": false,
                    "labels": [],
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
                selectedAnswer: {id: '', title: ''},
                answerAddDialog: false,
                showSnackbar: false,
                snackBarMessage: '',
                selectedItemId: null,
                isActiveDialogConfirm: false,
                bgSnackbar: '',
                cSnackbar: '',
                loading: false,
                items: [],
                questions: []
            }
        },
        created: function () {
        },
        mounted: function () {
            this.$root.$on('add-update-question', question => {
                this.sendAnswerForm(question)
            });
            this.$root.$on('cancel-question', question => {
                this.answerAddDialog = false
            });
            this.getItemsFromServer()
        },
        methods: {
            getQuestionsById(id) {
                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'questions/get/', {
                    id: id
                }).then(response => {
                    this.loading = false;

                    this.questions[id] = response.body

                }, response => {
                    // error callback
                    this.answerAddDialog = false
                    console.log(response, 'error on sendAnswerForm');
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                });
            },
            sendAnswerForm(question) {
                let type = question.type //BOOLEAN, TEXT, MULTI_CHOICE
                let title = question.body
                let answers = question.options

                this.loading = true;
                this.$http.post(this.$store.state.config.api + 'answer/add/', {
                    id: this.selectedAnswer.id,
                    type: type,
                    title: title,
                    answers: answers,
                }).then(response => {
                    this.answerAddDialog = false
                    this.loading = false;
                    this.showSnackbar = true
                    this.bgSnackbar = '#50ac66'
                    this.cSnackbar = '#ffffff'
                    this.snackBarMessage = 'Respuesta agregada.'
                }, response => {
                    // error callback
                    this.answerAddDialog = false
                    console.log(response, 'error on sendAnswerForm');
                    this.loading = false;
                    this.bgSnackbar = '#e74b7e'
                    this.cSnackbar = '#ffffff'
                    this.showSnackbar = true
                    this.snackBarMessage = 'Ha ocurrido un error, intente más tarde.'
                });
            },
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
        components: {Navigator, SurveyBuilder, SurveyBuilderJson}
    }
</script>

<style scoped>
    .md-card.md-with-hover {
        background-color: white;
    }
</style>