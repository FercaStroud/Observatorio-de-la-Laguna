<template>
    <f7-page class="bw-logo-bg" style="background-color: white;">
        <f7-navbar title="Encuestas" back-link="Atrás"></f7-navbar>
        <f7-block-title style="color:#398fa9; font-weight: bold">
            Encuestas
        </f7-block-title>

        <f7-block>
            <f7-button outline large v-for="(survey, index) in surveys" :key="index"
                       @click="getSurveyItemById(survey.id)"
                       style="margin: 10px; background-color: #fff">
                {{survey.title}}
            </f7-button>
        </f7-block>

        <f7-popup class="answers-popup-swipe" swipe-to-close>
            <f7-page>
                <f7-navbar :title="tempAnswers.title">
                    <f7-nav-right>
                        <f7-link popup-close>Cerrar</f7-link>
                    </f7-nav-right>
                </f7-navbar>
                <f7-block inset style="background-color: rgba(255,255,255,.84); border-radius: 8px; margin-top: 10px">
                    <p><strong>Indicaciones:</strong> {{tempAnswers.description}}</p>
                </f7-block>
                <f7-card v-for="(question, index) in tempAnswers.questions" :key="index">

                    <f7-block style="background-color: #368da8; border-radius: 4px">
                        <f7-row>
                            <p style="text-align: left">
                                <span class="s-subtitle" style="color:white !important">
                                    {{ question.title }}
                                </span>
                            </p>
                        </f7-row>
                    </f7-block>
                    <div v-if="question.type !== 'TEXT'">
                        <f7-list inline-labels>
                            <f7-list-input
                                    type="select"
                                    @input="question.vModel = $event.target.value">
                                <option value="">
                                    *Selecciona una respuesta
                                </option>
                                <option v-for="answer in question.answers" :value="answer.id">
                                    {{ answer.title }}
                                </option>
                            </f7-list-input>
                        </f7-list>
                    </div>
                    <div v-else>
                        <f7-list inline-labels>
                            <f7-list-input type="text" placeholder="Escriba una respuesta"
                                           @input="question.vModel = $event.target.value">
                            </f7-list-input>
                        </f7-list>
                    </div>

                </f7-card>

                <f7-block>
                    <f7-button style="background-color: #f49931; height: 60px; font-size: 1.2em;" @click="sendForm">
                        <p style="font-weight: bold;color:white;">
                            Enviar
                        </p>
                    </f7-button>
                </f7-block>

            </f7-page>
        </f7-popup>

    </f7-page>
</template>

<script>
    export default {
        name: "survey",
        data() {
            return {
                name: '',
                tempAnswers: {
                    title: '',
                    description: '',
                    questions: []
                },
                surveys: [],
            }
        },
        created: function () {
        },
        mounted: function () {
            this.getSurveys()
        },
        methods: {
            sendForm() {
                const self = this;
                const app = self.$f7;
                app.dialog.preloader('Enviando Encuesta');
                this.$http.post(this.$store.state.application.config.api + 'questionanswer/add', {
                    survey_id: this.tempAnswers.survey_id,
                    questions: this.tempAnswers.questions
                }).then(response => {
                    app.dialog.close();
                    this.$f7.popup.close('.answers-popup-swipe', true)

                    // get body data
                    app.dialog.alert(
                        "¡Muchas gracias!",
                        'Encuesta enviada'
                    )
                }, response => {
                    app.dialog.close();
                    app.dialog.alert(
                        "Intenta más tarde",
                        'Servidor no disponible'
                    )
                    console.log(response, 'error on sendForm')
                });
            },
            checkBeforeSendForm(arg) {
                if (arg.answer === this.tempAnswers.answers[0][0]) {
                    return true
                } else {
                    return false
                }
            },
            getSurveyItemById(id) {
                this.$f7.dialog.preloader('Cargando Datos');
                this.$http.post(this.$store.state.application.config.api + 'answers',
                    {id: id}
                ).then(response => {
                    this.tempAnswers = response.body;
                    this.$f7.dialog.close();
                    if (this.tempAnswers.length === 0) {
                        this.$f7.dialog.alert(' ', 'Sin datos disponibles');
                    } else {
                        this.$f7.popup.open('.answers-popup-swipe', true)
                    }
                }, response => {
                    // error callback
                    this.$f7.dialog.alert(' ', 'Servidor no disponible');
                    console.log(response, 'error on getSurveys');
                    this.$f7.dialog.close();
                });
            },
            getSurveys() {
                this.$f7.dialog.preloader('Cargando Datos');
                this.$http.post(this.$store.state.application.config.api + 'surveys').then(response => {

                    this.surveys = response.body;

                    if (this.surveys.length === 0) {
                        this.$f7.dialog.alert(' ', 'Sin datos disponibles');
                    }
                    this.$f7.dialog.close();
                }, response => {
                    // error callback
                    this.$f7.dialog.alert(' ', 'Servidor no disponible');
                    console.log(response, 'error on getSurveys');
                    this.$f7.dialog.close();
                });
            },
        }
    }
</script>

<style scoped>

</style>