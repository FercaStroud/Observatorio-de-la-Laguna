<template>
    <f7-app :params="f7params">
        <!-- Status bar overlay for fullscreen mode-->
        <f7-statusbar></f7-statusbar>

        <!-- Right panel with reveal effect-->
        <f7-panel left cover>
            <f7-view>
                <f7-page style="background-color: white">
                    <f7-block>
                        <img style="width: 100%;" src="../assets/images/observatorio-logo-completo.png"/>
                    </f7-block>
                    <f7-card v-ripple class="menu-card" style="background-color: #ed1c8e">
                        <f7-card-content>
                            <f7-row>
                                <f7-col>
                                    <span class="menu-text">NOTICIAS</span>
                                </f7-col>
                                <f7-col><img class="icon-navbar" src="../assets/images/logo-sin-texto.png"></f7-col>
                            </f7-row>
                        </f7-card-content>
                    </f7-card>

                    <f7-card v-ripple class="menu-card" style="background-color: #39b777">
                        <f7-card-content>
                            <f7-row>
                                <f7-col>
                                    <span class="menu-text">INDICADORES</span>
                                </f7-col>
                                <f7-col><img class="icon-navbar" src="../assets/images/logo-sin-texto.png"></f7-col>
                            </f7-row>
                        </f7-card-content>
                    </f7-card>

                    <f7-card v-ripple class="menu-card" style="background-color: #f99b40">
                        <f7-card-content>
                            <f7-row>
                                <f7-col>
                                    <span class="menu-text">PERCEPCIÓN</span>
                                </f7-col>
                                <f7-col><img class="icon-navbar" src="../assets/images/logo-sin-texto.png"></f7-col>
                            </f7-row>
                        </f7-card-content>
                    </f7-card>

                    <f7-card v-ripple class="menu-card" style="background-color: #4593a9">
                        <f7-card-content>
                            <f7-row>
                                <f7-col>
                                    <span class="menu-text">BLOG</span>
                                </f7-col>
                                <f7-col><img class="icon-navbar" src="../assets/images/logo-sin-texto.png"></f7-col>
                            </f7-row>
                        </f7-card-content>
                    </f7-card>

                    <f7-block-title>Datos de Contacto</f7-block-title>
                    <f7-block>
                        <p>
                            <strong>Dirección</strong> <br/>
                            C. Río Amazonas #740 Colonia Estrella
                        </p>
                        <hr/>
                        <p>
                            <strong>Teléfono</strong> <br/>
                            <f7-button style="text-align: left">718-98-25</f7-button>
                        </p>
                        <hr/>
                        <p>
                            <strong>Email</strong> <br/>
                            <f7-button style="text-align: left">contacto@ccilaguna.org.mx</f7-button>
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
    .menu-text{
        font-weight: bold;
        font-size: $menu-text-size;
        color: white;
    }
    .icon-navbar {
        width: $icon-size;
        height: $icon-size;
        float: right;
    }
    .menu-card{
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
                    theme: 'auto', // Automatic theme detection
                    // App root data
                    data: function () {
                        return {};
                    },

                    // App routes
                    routes: routes,
                    // Enable panel left visibility breakpoint
                    panel: {
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

                // Login screen data
                username: '',
                password: '',
            }
        },
        methods: {

        },
        mounted() {
            this.$f7ready((f7) => {
                // Init cordova APIs (see cordova-app.js)
                if (f7.device.cordova) {
                    cordovaApp.init(f7);
                }
                // Call F7 APIs here
            });
        }
    }
</script>