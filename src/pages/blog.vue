<template>
    <f7-page name="blog" class="bw-logo-bg" style="background-color: white;">
        <!-- Top Navbar -->
        <f7-navbar :sliding="true" back-link="Atrás">
            <f7-nav-right>
                <f7-link icon-ios="f7:menu"
                         icon-aurora="f7:menu"
                         icon-md="material:menu"
                         panel-open="left">
                </f7-link>
            </f7-nav-right>
        </f7-navbar>

        <f7-block-title style="color:#398fa9; font-weight: bold">
            {{title}}
        </f7-block-title>
        <f7-card class="elevation-4" v-for="(item, index) in $store.state.application.tempPostItems" :key="index">
            <f7-card-header class="no-border card-header">
                <div class="" style="float: left;">
                    <img src="../assets/images/logo-sin-texto.png" width="34" height="34"/>
                </div>
                <div class="card-name">{{item.post_title}}</div>
                <div class="card-date">Por: {{item.post_author}}<br/> {{item.post_date}}</div>
            </f7-card-header>
            <f7-card-content>
                <p v-html="item.post_content.substr(0, 240) + '...'"></p>
            </f7-card-content>
            <f7-card-footer class="no-border">
                <f7-link @click="openBrowser(item.post_url)">
                    Ver más
                </f7-link>
                <f7-link popover-open=".popover-social-links" @click="setDataToShare(item)">Compartir</f7-link>
            </f7-card-footer>
        </f7-card>
        <f7-button style="margin-bottom: 20px;margin-top: 20px"
                   v-if="$store.state.application.postItems.length !== $store.state.application.tempPostItems.length"
                   @click="loadMoreItems">
            Cargar más...
        </f7-button>
        <f7-popover class="popover-social-links">
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
        name: "home",
        data() {
            return {
                photos: [],
                title: 'Desde Nuestro sitio',
                dataToShare: null,
            }
        },
        created: function () {
        },
        mounted: function () {
        },
        methods: {
            openPhotoBrowser(item) {
                let photoBrowser = this.$f7.photoBrowser.create({
                    photos : [
                        {
                            url: item.post_url,
                            caption: item.post_title
                        }
                    ]
                })
                photoBrowser.open();
            },
            setDataToShare(item) {
                this.dataToShare = item
            },
            socialShare(socialNetwork) {
                let url = ''
                switch (socialNetwork) {
                    case 'twitter':
                        url = 'https://twitter.com/intent/tweet?text=' + this.dataToShare.post_title +
                            '&url=' + this.dataToShare.post_url + '&hashtags=observatoriodelalaguna,appObservatorio';
                        break;
                    case 'whatsapp':
                        url = 'https://api.whatsapp.com/send?text=Mira esta nota que saqué de la App del Observatorio de la Laguna: ' +
                            ' *' + this.dataToShare.post_title + '* ' +
                            ' ' + this.dataToShare.post_url
                        break;
                    case 'facebook':
                        url = 'https://www.facebook.com/sharer/sharer.php?' +
                            'u=' + this.dataToShare.post_url +
                            '&title=' + this.dataToShare.post_title +
                            '&description=' + this.dataToShare.post_title +
                            '&quote=' + this.dataToShare.post_title;
                        break;
                }

                this.openBrowser(encodeURI(url))
            },
            openBrowser(url) {
                let options = "location=no,clearcache=yes,clearsessioncache=yes,zoom=yes,EnableViewPortScale=yes"
                let ref = cordova.InAppBrowser.open(url, '_self', options);
            },
            loadMoreItems() {
                this.setLastAndNextValues(
                    this.$store.state.application.nextItemIndex,
                    this.$store.state.application.nextItemIndex += 15
                )
                this.limitPost()
            },
            resetLastAndNextValues() {
                this.$store.state.application.lastItemIndex = null;
                this.$store.state.application.nextItemIndex = null;
            },
            setLastAndNextValues(last, next) {
                this.$store.state.application.lastItemIndex = last;
                this.$store.state.application.nextItemIndex = next;
            },
            limitPost() {
                this.$f7.dialog.preloader('Cargando Datos');
                for (
                    let i = this.$store.state.application.lastItemIndex;
                    i < this.$store.state.application.nextItemIndex; i++
                ) {
                    if (this.$store.state.application.postItems[i] !== undefined) {
                        this.$store.state.application.tempPostItems.push(
                            this.$store.state.application.postItems[i]
                        )
                    }
                }
                this.$f7.dialog.close();
            }
        }
    }
</script>

<style>
    iframe {
        width: 100% !important;
    }

    div.title, a.link.back, .ios .navbar a.icon-only {
        color: #e74b7e !important;
    }
</style>
<style scoped>
    .link {
        color: #e74b7e !important;
    }

    .card-header {
        display: block;
        padding: 10px;
    }

    .card-name {
        margin-left: 44px;
        font-size: 14px;
        font-weight: 500;
    }

    .card-date {
        margin-left: 44px;
        font-size: 13px;
        color: #8e8e93;
    }

    div.title, a.link.back, .ios .navbar a.icon-only {
        color: #e74b7e !important;
    }
</style>