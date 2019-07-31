<template>
    <f7-page name="home" class="bw-logo-bg" style="background-color: white;">
        <!-- Top Navbar -->
        <f7-navbar :sliding="false" >
            <f7-nav-left>
                <f7-link icon-ios="f7:menu"
                         icon-aurora="f7:menu"
                         icon-md="material:menu"
                         panel-open="left">
                </f7-link>
            </f7-nav-left>
            <f7-nav-right>
                <img style="height: 40px;margin-right: 8px" src="../assets/images/logo-sin-texto.png">
            </f7-nav-right>
        </f7-navbar>


        <f7-block-title>Desde nuestro Blog</f7-block-title>
        <f7-card class="" v-for="(item, index) in items" :key="index">
            <f7-card-header class="no-border card-header">
                <div class="" style="float: left;">
                    <img src="../assets/images/logo-sin-texto.png" width="34" height="34"/>
                </div>
                <div class="card-name">{{item.post_title}}</div>
                <div class="card-date">Por: {{item.post_author}} {{item.post_date}}</div>
            </f7-card-header>
            <f7-card-content>
                <p  v-html="item.post_content"></p>
                <img v-if="item.post_mime_type=='image/jpeg'"
                     src="http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/idbg-deuda-pib-estatal-durango-2007-17.jpg"
                     width="100%"/>
            </f7-card-content>
            <f7-card-footer class="no-border">
                <f7-link>Ver más</f7-link>
                <f7-link>Compartir</f7-link>
            </f7-card-footer>
        </f7-card>
    </f7-page>
</template>


<script>
    export default {
        name: "history",
        data: () => ({
            items: [
                {
                    post_id: 1,
                    post_author: "Observatorio de La Laguna",
                    post_title: "Nivel de confianza en las autoridades de La Laguna 2018",
                    post_content: 'El <strong>47.6%</strong> de los Laguneros <strong>desconfía</strong> de la<strong> Policía Municipal</strong>. La Laguna <strong>mejoró</strong> la <strong>confianza</strong> en sus<strong> Policías Municipales</strong> el <strong>último año</strong>. <h5><span lang="ES-MX">Fuente: INEGI. Encuesta Nacional sobre Seguridad Pública Urbana (ENSU), Septiembre 2017. Nota: Estos porcentajes no incluyen a los que contestaron "no sabe/no responde". La encuesta se realiza a nivel metropolitano, que incluye los municipios de Gómez, Matamoros, Gómez Palacio y Lerdo.</span></h5>',
                    post_date: "2018-05-03 03:34:19",
                    post_url: "http://observatoriodelalaguna.org.mx/?p=559",
                    post_type: "",
                    post_mime_type: "",
                },{
                    post_id: 3,
                    post_author: "Observatorio de La Laguna",
                    post_title: "icec-inversion-extranjera-directa-coah-2016",
                    post_content: '',
                    post_date: "2018-05-03 03:34:19",
                    post_url: "http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/idbg-deuda-pib-estatal-durango-2007-17.jpg",
                    post_type: "attachment",
                    post_mime_type: "image/jpeg",
                },{
                    post_id: 2,
                    post_author: "Observatorio de La Laguna",
                    post_title: "Sistema de Derecho confiable y objetivo en Gómez Palacio 2016",
                    post_content: 'Durante 2016 el objetivo y el <strong>sistema de derecho confiable</strong> destacan a nivel nacional las ciudades de Campeche, Aguascalientes y Saltillo en los primeros 3 lugares respectivamente. <strong>Gómez Palacio</strong> muestra un nivel medio bajo, llegando al lugar<strong> 42</strong> de 78. <h5><span lang="ES-MX">Fuente: IMCO, Índice de competitividad urbana 2016, subíndice Sistema de derecho confiable y eficiente. Este indicador considera, duración juicio de amparo directos, número de notarios, superficie urbana en tierra ejidal autos robados, muertes por homicidio, monto de robo de mercancías y percepción de inseguridad.</span></h5>',
                    post_date: "2018-05-03 03:34:19",
                    post_url: "http://observatoriodelalaguna.org.mx/?p=559",
                    post_type: "",
                    post_mime_type: "",
                },
            ]
        }),
        created: function () {
        },
        mounted: function () {
        },
        methods: {

        }
    }
</script>

<style scoped>
    .card-header{
        display: block;
        padding: 10px;
    }
    .card-name{
        margin-left: 44px;
        font-size: 14px;
        font-weight: 500;
    }
    .card-date{
        margin-left: 44px;
        font-size: 13px;
        color: #8e8e93;
    }
    .bw-logo-bg{
        background-image: url("../assets/images/logo-sin-texto.jpg");
    }
</style>