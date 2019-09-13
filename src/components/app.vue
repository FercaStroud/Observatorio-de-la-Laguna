<template>
    <f7-app :params="f7params">
        <!-- Status bar overlay for fullscreen mode-->
        <f7-statusbar></f7-statusbar>

        <!-- Right panel with reveal effect-->
        <f7-panel right cover>
            <f7-view>
                <f7-page style="background-color: white">
                    <f7-block>
                        <img style="width: 100%;" src="../assets/images/observatorio-logo-completo.png"/>
                    </f7-block>
                    <f7-link style="width: 100%" href="/news" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card"
                                 style="background-color: #ed1c8e; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <span class="menu-text">NOTICIAS</span>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                    <f7-link style="width: 100%" href="/indicators" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #39b777; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <span class="menu-text">INDICADORES</span>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                    <f7-link style="width: 100%" href="/documents" view=".view-main"  panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #f99b40; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <span class="menu-text">PERCEPCIÓN</span>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                    <f7-link style="width: 100%" @click="getPostBy('BLOG')" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #4593a9; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <span class="menu-text">BLOG</span>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                    <f7-link style="width: 100%" href="/survey" view=".view-main" panel-close>
                        <f7-card v-ripple class="menu-card" style="background-color: #757476; width: 100%">
                            <f7-card-content>
                                <f7-row>
                                    <f7-col>
                                        <span class="menu-text">ENCUESTAS</span>
                                    </f7-col>
                                </f7-row>
                            </f7-card-content>
                        </f7-card>
                    </f7-link>
                    <f7-block-title>Datos de Contacto</f7-block-title>
                    <f7-block>
                        <p>
                            <strong>Dirección</strong> <br/>
                            C. Río Amazonas #740 Colonia Estrella
                        </p>
                        <hr/>
                        <p>
                            <strong>Teléfono</strong> <br/>
                            <f7-button  @click="openBrowser('tel:8717189825')" style="text-align: left">871-718-98-25</f7-button>
                        </p>
                        <hr/>
                        <p>
                            <strong>Email</strong> <br/>
                            <f7-button @click="openBrowser('mailto:contacto@ccilaguna.org.mx')" style="text-align: left">contacto@ccilaguna.org.mx</f7-button>
                        </p>
                    </f7-block>
                </f7-page>
            </f7-view>
        </f7-panel>

        <!-- Your main view, should have "view-main" class -->
        <f7-view main class="safe-areas" url="/"></f7-view>

    </f7-app>
</template>

<style scoped lang="scss">
    $icon-size: 35px;
    $menu-text-size: 1.2em;
    .menu-text {
        font-weight: bold;
        font-size: $menu-text-size;
        color: white;
    }

    .icon-navbar {
        width: $icon-size;
        height: $icon-size;
        float: right;
        padding: 7px;
        background-color: white;
    }

    .menu-card {
        border-radius: 0;
    }

</style>

<script>
    import cordovaApp from '../js/cordova-app.js';
    import routes from '../js/routes.js';

    export default {
        data() {
            return {
                // Framework7 Parameters
                f7params: {
                    id: 'go.observatorio', // App bundle ID
                    name: 'Observatorio de la Laguna', // App name
                    theme: 'ios', // Automatic theme detection
                    // App root data
                    data: function () {
                        return {};
                    },
                    pushState: true,
                    // App routes
                    routes: routes,
                    // Enable panel left visibility breakpoint
                    panel: {
                        swipe: 'right',
                        leftBreakpoint: 960,
                    },
                    // Input settings
                    input: {
                        scrollIntoViewOnFocus: this.$device.cordova && !this.$device.electron,
                        scrollIntoViewCentered: this.$device.cordova && !this.$device.electron,
                    },
                    // Cordova Statusbar settings
                    statusbar: {
                        iosBackgroundColor: '#f7f7f8',
                        androidBackgroundColor: '#f7f7f8',
                        overlay: this.$device.cordova && this.$device.ios || 'auto',
                        iosOverlaysWebView: true,
                        androidOverlaysWebView: false,
                    },
                },
            }
        },
        mounted() {
            let vm = this
            this.$f7ready((f7) => {
                // Init cordova APIs (see cordova-app.js)
                if (f7.device.cordova) {
                    cordovaApp.init(f7);
                    vm.onDeviceReady();
                }
                // Call F7 APIs here
                cordova.plugins.firebase.messaging.requestPermission().then(function () {
                    console.log("Push messaging is allowed");
                });
                cordova.plugins.firebase.messaging.requestPermission({forceShow: true}).then(function () {
                    console.log("You'll get foreground notifications when a push message arrives");
                });
                cordova.plugins.firebase.messaging.onMessage(function (payload) {
                    console.log("New foreground FCM message: ", payload);
                });
                cordova.plugins.firebase.messaging.onBackgroundMessage(function (payload) {
                    console.log("New background FCM message: ", payload);
                });
            });

        },
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