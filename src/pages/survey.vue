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

    </f7-page>
</template>

<script>
    export default {
        name: "survey",
        data() {
            return {
                tempAnswers: [],
                surveys: [
                    {
                        id: 0,
                        title: '¿Está de acuerdo con blahblah?',
                        questions: [
                            {
                                id: 0,
                                title: 'lalelilolu?',
                                answers: ['lol', 'lal', 'lel',]
                            },
                            {
                                id: 1,
                                title: 'lalelilolu?',
                                answers: ['lol', 'lal', 'lel',]
                            }
                        ],
                    },{
                        id: 1,
                        title: '¿Está de acuerdo con blahblah?',
                        questions: [
                            {
                                id: 0,
                                title: 'lalelilolu?',
                                answers: ['lol', 'lal', 'lel',]
                            },
                            {
                                id: 1,
                                title: 'lalelilolu?',
                                answers: ['lol', 'lal', 'lel',]
                            }
                        ],
                    }
                ],

            }
        },
        created: function () {
        },
        mounted: function () {
        },
        methods: {
            getSurveyItemById(id) {
                console.log(id, 'id')
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
                    this.$f7.dialog.alert(' ', 'Servidor no disponible');
                    // error callback
                    console.log(response, 'error on getSurveys');
                    this.$f7.dialog.close();
                });
            },
        }
    }
</script>

<style scoped>

</style>