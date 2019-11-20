<template>
    <f7-page class="bw-logo-bg" style="background-color: white;">
        <f7-navbar title="Indicadores" back-link="Atrás"></f7-navbar>

        <f7-card v-for="(item, index) in items" :key="index">
            <div @click="openIndicator(item)">
                <f7-card-content v-ripple style="font-size: 1.2em">
                    <div style="text-align: center; font-size: 1.6em">{{item.city}}</div>
                </f7-card-content>
            </div>
        </f7-card>
        <f7-popup class="indicators-popup-swipe" swipe-to-close
                  :opened="indicatorPopupOpened"
                  @popup:closed="indicatorPopupOpened = false"
        >
            <f7-page>
                <f7-navbar :title="'INDICADORES ' + currentItem.city">
                    <f7-nav-right>
                        <f7-link popup-close>Cerrar</f7-link>
                    </f7-nav-right>
                </f7-navbar>

                <f7-block v-for="(indicator, index) in currentItem.indicators" :key="index" v-ripple>
                    <div @click="openBrowser(indicator.url)">
                        <div>
                            <img style="margin-left: 50%;left: calc(-105px / 2);position: relative;"
                                 :src="indicator.img"/>
                        </div>
                        <div style="text-align: center;font-size: 1.6em;">
                            {{indicator.title}}
                        </div>
                    </div>
                </f7-block>
            </f7-page>
        </f7-popup>
    </f7-page>
</template>

<script>
    export default {
        name: "indicators",
        data() {
            return {
                indicatorPopupOpened: false,
                currentItem: {
                    city: '',
                    indicators: []
                },
                items: [
                    {
                        city: 'TORREÓN',
                        indicators: [
                            {
                                title: 'BUEN GOBIERNO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-buen-gobierno.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/buen-gobierno/'
                            }, {
                                title: 'DESARROLLO URBANO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-desarrollo-urbano.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/desarrollo-urbano/'
                            }, {
                                title: 'ECONOMÍA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-economia.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/economia/'
                            }, {
                                title: 'EDUCACIÓN',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-educacion.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/educacion/'
                            }, {
                                title: 'EMPLEO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-empleo.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/empleo/'
                            }, {
                                title: 'MEDIO AMBIENTE',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-medio-ambiente.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/medio-ambiente/'
                            }, {
                                title: 'PARTICIPACIÓN CIUDADANA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-participacion-ciudadana.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/participacion-ciudadana/'
                            }, {
                                title: 'SALUD',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-salud.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/salud/'
                            }, {
                                title: 'SEGURIDAD Y JUSTICIA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-seguridad.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-torreon/seguridad-y-justicia/'
                            },
                        ]
                    }, {
                        city: 'GÓMEZ PALACIO',
                        indicators: [
                            {
                                title: 'BUEN GOBIERNO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-buen-gobierno.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/buen-gobierno/'
                            }, {
                                title: 'DESARROLLO URBANO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-desarrollo-urbano.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/desarrollo-urbano/'
                            }, {
                                title: 'ECONOMÍA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-economia.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/economia/'
                            }, {
                                title: 'EDUCACIÓN',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-educacion.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/educacion/'
                            }, {
                                title: 'EMPLEO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-empleo.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/empleo/'
                            }, {
                                title: 'MEDIO AMBIENTE',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-medio-ambiente.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/medio-ambiente/'
                            }, {
                                title: 'PARTICIPACIÓN CIUDADANA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-participacion-ciudadana.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/participacion-ciudadana/'
                            }, {
                                title: 'SALUD',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-salud.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/salud/'
                            }, {
                                title: 'SEGURIDAD Y JUSTICIA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-seguridad.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-gomez-palacio/seguridad-y-justicia/'
                            },
                        ]
                    }, {
                        city: 'LERDO',
                        indicators: [
                            {
                                title: 'BUEN GOBIERNO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-buen-gobierno.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/buen-gobierno/'
                            }, {
                                title: 'DESARROLLO URBANO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-desarrollo-urbano.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/desarrollo-urbano/'
                            }, {
                                title: 'ECONOMÍA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-economia.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/economia/'
                            }, {
                                title: 'EDUCACIÓN',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-educacion.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/educacion/'
                            }, {
                                title: 'EMPLEO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-empleo.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/empleo/'
                            }, {
                                title: 'MEDIO AMBIENTE',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-medio-ambiente.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/medio-ambiente/'
                            }, {
                                title: 'PARTICIPACIÓN CIUDADANA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-participacion-ciudadana.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/participacion-ciudadana/'
                            }, {
                                title: 'SALUD',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-salud.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/salud/'
                            }, {
                                title: 'SEGURIDAD Y JUSTICIA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-seguridad.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-lerdo/seguridad-y-justicia/'
                            }
                        ]
                    }, {
                        city: 'COAHUILA',
                        indicators: [
                            {
                                title: 'BUEN GOBIERNO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-buen-gobierno.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/buen-gobierno/'
                            }, {
                                title: 'DESARROLLO URBANO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-desarrollo-urbano.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/desarrollo-urbano/'
                            }, {
                                title: 'ECONOMÍA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-economia.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/economia/'
                            }, {
                                title: 'EDUCACIÓN',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-educacion.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/educacion/'
                            }, {
                                title: 'EMPLEO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-empleo.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/empleo/'
                            }, {
                                title: 'MEDIO AMBIENTE',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-medio-ambiente.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/medio-ambiente/'
                            }, {
                                title: 'PARTICIPACIÓN CIUDADANA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-participacion-ciudadana.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/participacion-ciudadana/'
                            }, {
                                title: 'SALUD',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-salud.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/salud/'
                            }, {
                                title: 'SEGURIDAD Y JUSTICIA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-seguridad.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-coahuila/seguridad-y-justicia/'
                            },
                        ]
                    }, {
                        city: 'DURANGO',
                        indicators: [
                            {
                                title: 'BUEN GOBIERNO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-buen-gobierno.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/buen-gobierno/'
                            }, {
                                title: 'DESARROLLO URBANO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-desarrollo-urbano.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/desarrollo-urbano/'
                            }, {
                                title: 'ECONOMÍA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-economia.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/economia/'
                            }, {
                                title: 'EDUCACIÓN',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-educacion.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/educacion/'
                            }, {
                                title: 'EMPLEO',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-empleo.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/empleo/'
                            }, {
                                title: 'MEDIO AMBIENTE',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-medio-ambiente.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/medio-ambiente/'
                            }, {
                                title: 'PARTICIPACIÓN CIUDADANA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-participacion-ciudadana.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/participacion-ciudadana/'
                            }, {
                                title: 'SALUD',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-salud.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/salud/'
                            }, {
                                title: 'SEGURIDAD Y JUSTICIA',
                                img: 'http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/icon-seguridad.png',
                                url: 'https://observatoriodelalaguna.org.mx/indicadores-durango/seguridad-y-justicia/'
                            },
                        ]
                    }
                ]
            }
        },
        created: function () {
        },
        mounted: function () {
        },
        methods: {
            openBrowser(url) {
                let options = "location=no,clearcache=yes,clearsessioncache=yes,zoom=yes,EnableViewPortScale=yes"
                let ref = cordova.InAppBrowser.open(url, '_self', options);
            },
            openIndicator(item) {
                this.currentItem = item
                this.indicatorPopupOpened = true
            }
        }
    }
</script>

<style scoped>

</style>
