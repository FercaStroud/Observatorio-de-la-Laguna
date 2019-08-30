<template>
    <f7-page class="bw-logo-bg" style="background-color: white;">
        <f7-navbar title="Percepción" back-link="Atrás"></f7-navbar>
        <f7-block-title style="color:#398fa9; font-weight: bold">
            Percepción
        </f7-block-title>

        <f7-card v-for="(item, index) in items" :key="index">
            <f7-card-content style="font-size: 1.1em">
                <img width="20px" style="top: 4px;position: relative" src="../assets/images/logo-sin-texto.png"/>
                {{item.title}}
            </f7-card-content>
            <f7-card-footer class="no-border">
                <f7-link @click="openBrowser($store.state.application.config.api + 'public/' +item.src)">
                    Descargar
                </f7-link>
                <f7-link popover-open=".popover-social-links-documents" @click="setDataToShare(item)">Compartir</f7-link>
            </f7-card-footer>
        </f7-card>
        <f7-popover class="popover-social-links-documents">
            <f7-list>
                <f7-list-item>
                    <f7-button style="width: 100%" @click="socialShare('twitter')">
                        Twitter
                    </f7-button>
                </f7-list-item>
                <f7-list-item>
                    <f7-button style="width: 100%" @click="socialShare('facebook')">
                        Facebook
                    </f7-button>
                </f7-list-item>
                <f7-list-item>
                    <f7-button style="width: 100%" @click="socialShare('whatsapp')">
                        Whats App
                    </f7-button>
                </f7-list-item>
            </f7-list>
        </f7-popover>
    </f7-page>
</template>

<script>
    export default {
        name: "documents",
        data() {
            return {
                items: [],
                dataToShare: null,
            }
        },
        created: function () {
        },
        mounted: function () {
            this.getDocuments()
        },
        methods: {
            openBrowser(url) {
                let options = "location=no,clearcache=yes,clearsessioncache=yes,zoom=yes,EnableViewPortScale=yes"
                let ref = cordova.InAppBrowser.open(url, '_system', options);
            },
            setDataToShare(item) {
                this.dataToShare = item
            },
            socialShare(socialNetwork) {
                let url = ''
                switch (socialNetwork) {
                    case 'twitter':
                        url = 'https://twitter.com/intent/tweet?text=' + this.dataToShare.title +
                            '&url=' + this.$store.state.application.config.api + 'public/' + this.dataToShare.src + '&hashtags=observatoriodelalaguna,appObservatorio';
                        break;
                    case 'whatsapp':
                        url = 'https://api.whatsapp.com/send?text=Mira esta nota que saqué de la App del Observatorio de la Laguna: ' +
                            ' *' + this.dataToShare.title + '* ' +
                            ' ' + this.$store.state.application.config.api + 'public/' + this.dataToShare.src
                        break;
                    case 'facebook':
                        url = 'https://www.facebook.com/sharer/sharer.php?' +
                            'u=' + this.$store.state.application.config.api + 'public/' + this.dataToShare.src +
                            '&title=' + this.dataToShare.title +
                            '&description=' + this.dataToShare.title +
                            '&quote=' + this.dataToShare.title;
                        break;
                }

                this.openBrowser(encodeURI(url))
            },
            getDocuments() {
                this.items = []

                this.$f7.dialog.preloader('Cargando Datos');
                this.$http.post(this.$store.state.application.config.api + 'documents').then(response => {
                    this.items = response.body;
                    if (this.items.length === 0) {
                        this.$f7.dialog.alert(' ', 'Sin datos disponibles');
                    }
                    this.$f7.dialog.close();
                }, response => {
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
    div.title, a.link.back, .ios .navbar a.icon-only {
        color: #e74b7e !important;
    }
    .link {
        color: #e74b7e !important;
    }
</style>