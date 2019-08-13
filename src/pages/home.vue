<template>
    <f7-page name="home" class="bw-logo-bg" style="background-color: white;">
        <!-- Top Navbar -->
        <f7-navbar :sliding="false">
            <f7-nav-left>
                <img v-if="$store.state.application.isLoading==false" style="height: 35px;margin-top:-4px;margin-left: 8px"
                     src="../assets/images/logo-sin-texto.png">
                <img v-else style="height: 35px;margin-top:-4px;margin-left: 8px"
                     src="../assets/images/loading.gif">
            </f7-nav-left>
            <f7-nav-right>
                <f7-link icon-ios="f7:menu"
                         icon-aurora="f7:menu"
                         icon-md="material:menu"
                         panel-open="left">
                </f7-link>
            </f7-nav-right>
        </f7-navbar>

        <f7-block-title>{{title}}</f7-block-title>
        <f7-card class="elevatlon-2" v-for="(item, index) in $store.state.application.tempPostItems" :key="index">
            <f7-card-header class="no-border card-header">
                <div class="" style="float: left;">
                    <img src="../assets/images/logo-sin-texto.png" width="34" height="34"/>
                </div>
                <div class="card-name">{{item.post_title}}</div>
                <div class="card-date">Por: {{item.post_author}} {{item.post_date}}</div>
            </f7-card-header>
            <f7-card-content>
                <p v-html="item.post_content"></p>
                <img v-if="item.post_mime_type=='image/jpeg'"
                     src="http://observatoriodelalaguna.org.mx/wp-content/uploads/2018/05/idbg-deuda-pib-estatal-durango-2007-17.jpg"
                     width="100%"/>
            </f7-card-content>
            <f7-card-footer class="no-border">
                <f7-link :href="item.post_url" external>Ver más</f7-link>
                <f7-link>Compartir</f7-link>
            </f7-card-footer>
        </f7-card>
        <f7-button style="margin-bottom: 20px;margin-top: 20px"
                   v-if="$store.state.application.postItems.length !== $store.state.application.tempPostItems.length"
        @click="loadMoreItems">
            Cargar más...
        </f7-button>
    </f7-page>
</template>


<script>
    export default {
        name: "home",
        data() {
            return {
                title: 'SIN DATOS PARA MOSTRAR'
            }
        },
        created: function () {
        },
        mounted: function () {
        },
        methods: {
            loadMoreItems(){
                this.setLastAndNextValues(
                    this.$store.state.application.nextItemIndex,
                    this.$store.state.application.nextItemIndex += 15
                )
                this.limitPost()
            },
            resetLastAndNextValues(){
                this.$store.state.application.lastItemIndex = null;
                this.$store.state.application.nextItemIndex = null;
            },
            setLastAndNextValues(last, next){
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
    iframe{
        width: 100% !important;
    }
</style>
<style scoped>
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

</style>