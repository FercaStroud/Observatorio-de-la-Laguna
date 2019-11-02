<template>
    <f7-page name="home" class="bw-logo-bg" style="background-color: white;">
        <!-- Top Navbar -->
        <f7-block>
            <img style="width: 100%;" src="../assets/images/observatorio-logo-completo.png"/>
        </f7-block>
        <f7-block>
            <f7-row>
                <f7-col>
                    <f7-link style="width: 100%" href="/news" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card"
                                 style="background-color: #ed1c8e; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <p class="menu-text">NOTICIAS</p>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                </f7-col>
                <f7-col>
                    <f7-link style="width: 100%" href="/indicators" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #39b777; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <p class="menu-text">INDICADORES</p>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                </f7-col>
            </f7-row>
            <f7-row>
                <f7-col>
                    <f7-link style="width: 100%" href="/documents" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #f99b40; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <p class="menu-text">PERCEPCIÓN</p>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                </f7-col>
                <f7-col>
                    <f7-link style="width: 100%" @click="getPostBy('BLOG')" href="/blog" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #4593a9; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <p class="menu-text">BLOG</p>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                </f7-col>
            </f7-row>
            <f7-row>
                <f7-col>
                    <f7-link style="width: 100%" href="/survey" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #757476; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <p class="menu-text">ENCUESTAS</p>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                </f7-col>
            </f7-row>
        </f7-block>

        <f7-block-title>Datos de Contacto</f7-block-title>
        <f7-block>
            <p>
                <strong>Dirección</strong> <br/>
                C. Río Amazonas #740 Colonia Estrella, Torreón, Coahuila.
            </p>
            <hr/>
            <p>
                <strong>Teléfono</strong> <br/>
                <f7-button @click="openBrowser('tel:8717189825')" style="text-align: left">871-718-98-25</f7-button>
            </p>
            <hr/>
            <p>
                <strong>Email</strong> <br/>
                <f7-button @click="openBrowser('mailto:contacto@ccilaguna.org.mx')" style="text-align: left">
                    contacto@ccilaguna.org.mx
                </f7-button>
            </p>
        </f7-block>
    </f7-page>
</template>

<script>
    export default {
        name: "home",
        methods: {
            openBrowser(url) {
                let options = "location=no,clearcache=yes,clearsessioncache=yes,zoom=yes,EnableViewPortScale=yes"
                let ref = cordova.InAppBrowser.open(url, '_system', options);
            },
            onDeviceReady: function () {
                document.addEventListener('backbutton', this.onBackKeyDown, false)
            },
            onBackKeyDown: function () {
                window.history.length > 1 ? this.$f7router.back() : this.$f7router.navigate('/')
            },
            getPostBy(arg) {
                this.$f7.dialog.preloader('Cargando Datos');
                this.$http.post(this.$store.state.application.config.api + 'posts', {
                    postType: arg
                }).then(response => {
                    this.$store.state.application.tempPostItems = []
                    this.$store.state.application.postItems = response.body;
                    
                    this.$store.state.application.lastItemIndex = 0;
                    this.$store.state.application.nextItemIndex = 15;
                    this.limitPost();
                    if (this.$store.state.application.postItems.length === 0) {
                        this.$f7.dialog.alert(' ', 'Sin datos disponibles');
                    }
                    this.$f7.dialog.close();
                    this.$f7.dialog.alert('¡Blog actualizado!', 'Éxito');

                }, response => {
                    this.$f7.dialog.alert(' ', 'Servidor no disponible');
                    // error callback
                    console.log(response, 'error on getPostBy');
                    this.$f7.dialog.close();
                });
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

<style scoped>
    .menu-text{
        color: white;
        font-weight: bold;
        text-align: center;
    }
</style>