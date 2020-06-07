<template>
    <md-list style="margin-top: 10px" :md-expand-single="true">
        <md-list-item md-expand>
            <md-icon>poll</md-icon>
            <span class="md-list-item-text">Percepción</span>
            <md-list slot="md-expand">
                <md-list-item>
                    <router-link to="/indicador/nuevo/">
                        <md-button style="text-transform: none; width:200px;">
                            Agregar Documento
                        </md-button>
                    </router-link>
                </md-list-item>
                <md-list-item>
                    <router-link to="/indicadores/lista/">
                        <md-button style="text-transform: none; width:200px;">
                            Ver Documentos
                        </md-button>
                    </router-link>
                </md-list-item>
            </md-list>
        </md-list-item>
        <md-list-item md-expand>
            <md-icon>poll</md-icon>
            <span class="md-list-item-text">Infografías</span>
            <md-list slot="md-expand">
                <md-list-item>
                    <router-link to="/infografias/nueva/">
                        <md-button style="text-transform: none; width:200px;">
                            Agregar Infografía
                        </md-button>
                    </router-link>
                </md-list-item>
                <md-list-item>
                    <router-link to="/infografias/lista/">
                        <md-button style="text-transform: none; width:200px;">
                            Ver Infografías
                        </md-button>
                    </router-link>
                </md-list-item>
            </md-list>
        </md-list-item>
        <md-list-item md-expand>
            <md-icon>speaker_notes</md-icon>
            <span class="md-list-item-text">Encuestas</span>
            <md-list slot="md-expand">
                <md-list-item>
                    <router-link to="/encuesta/nueva/">
                        <md-button style="text-transform: none; width:200px;">
                            Nueva Encuesta
                        </md-button>
                    </router-link>
                </md-list-item>
                <md-list-item>
                    <router-link to="/encuesta/lista/">
                        <md-button style="text-transform: none; width:200px;">
                            Ver Encuestas
                        </md-button>
                    </router-link>
                </md-list-item>
            </md-list>
        </md-list-item>
        <md-list-item md-expand>
            <md-icon>notification_important</md-icon>
            <span class="md-list-item-text">Noticias</span>
            <md-list slot="md-expand">
                <md-list-item>
                    <router-link to="/noticia/nueva/">
                        <md-button style="text-transform: none; width:200px;">
                            Nueva Noticia
                        </md-button>
                    </router-link>
                </md-list-item>
                <md-list-item>
                    <router-link to="/noticia/lista/">
                        <md-button style="text-transform: none; width:200px;">
                            Ver Noticias
                        </md-button>
                    </router-link>
                </md-list-item>
            </md-list>
        </md-list-item>
        <md-list-item style="cursor: pointer">
            <md-icon>exit_to_app</md-icon>
            <span class="md-list-item-text">
                Cerrar Sesión
            </span>
        </md-list-item>
    </md-list>
</template>

<script>
    export default {
        name: "navigator",
        created: function () {
            if(!this.$store.state.userLogged){
                this.$router.push('/');
            }
        },
    }
</script>

<style scoped>
    .md-drawer .md-list-item-container:hover{
        color: #e74b7e
    }
    .md-button-content{

    }
</style>