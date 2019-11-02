<template>
    <f7-page class="bw-logo-bg" style="background-color: white;">
        <f7-navbar title="Noticias" back-link="Atrás"></f7-navbar>
        <f7-block-title style="color:#398fa9; font-weight: bold">
            Noticias
        </f7-block-title>

        <f7-card v-for="(item, index) in news" :key="index">
            <f7-card-content>
                {{item.text}}
            </f7-card-content>
            <f7-card-footer>
                <f7-link @click="openBrowser(item.post_url)">
                    {{ item.url_description }}
                </f7-link>
            </f7-card-footer>
        </f7-card>

    </f7-page>
</template>

<script>
    export default {
        name: "news",
        data() {
            return {
                news: []
            }
        },
        created: function () {
        },
        mounted: function () {
            this.getNews()
        },
        methods: {
            getNews() {
                this.news = []

                this.$f7.dialog.preloader('Cargando Datos');
                this.$http.post(this.$store.state.application.config.api + 'news').then(response => {
                    this.news = response.body;

                    if (this.news.length === 0) {
                        this.$f7.dialog.alert(' ', 'Sin datos disponibles');
                    }
                    this.$f7.dialog.close();
                }, response => {
                    this.news = [{text:'Sin noticias por el momento'}]
                    // error callback
                    console.log(response, 'error on getNews');
                    this.$f7.dialog.alert(' ', 'Servidor no disponible');
                    this.$f7.dialog.close();
                });
            },
        }
    }
</script>

<style scoped>

</style>
