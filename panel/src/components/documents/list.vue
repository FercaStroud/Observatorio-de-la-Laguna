<template>
    <md-app>
        <md-app-toolbar class="md-primary" style="background-color: white">
            <span class="md-title">
                <md-icon>poll</md-icon>
                Indicadores - Listado
            </span>
        </md-app-toolbar>

        <md-app-drawer md-permanent="full" style="height: 100vh;" class="menu-container">
            <md-toolbar class="md-transparent" md-elevation="0">
                <img src="../../assets/images/observatorio-logo-completo.png">
            </md-toolbar>
            <Navigator/>
        </md-app-drawer>
        <md-app-content>
            <h2 style="">
                Todos los Indicadores
            </h2>
            <md-list class="md-triple-line">
                <md-list-item>
                    <md-avatar style="border-radius: 0px !important;">
                        <img style="width: 100%;" src="../../assets/images/logo-sin-texto.png" alt="logo">
                    </md-avatar>

                    <div class="md-list-item-text" style="white-space: initial;">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </p>
                    </div>

                    <md-button class="md-icon-button md-list-action">
                        <md-icon class="delete-button">delete_forever</md-icon>
                        <md-tooltip md-direction="bottom">
                            <span style="color:#ed1d8e">Eliminar</span>
                        </md-tooltip>
                    </md-button>
                </md-list-item>
                <md-divider style="background-color: #569cb0; margin-top: 5px" class="md-inset"></md-divider>
                <md-list-item>
                    <md-avatar style="border-radius: 0px !important;">
                        <img style="width: 100%;" src="../../assets/images/logo-sin-texto.png" alt="logo">
                    </md-avatar>

                    <div class="md-list-item-text" style="white-space: initial;">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </p>
                    </div>

                    <md-button class="md-icon-button md-list-action">
                        <md-icon class="delete-button">delete_forever</md-icon>
                        <md-tooltip md-direction="bottom">
                            <span style="color:#ed1d8e">Eliminar</span>
                        </md-tooltip>
                    </md-button>
                </md-list-item>
                <md-divider style="background-color: #569cb0; margin-top: 5px" class="md-inset"></md-divider>
                <md-list-item>
                    <md-avatar style="border-radius: 0px !important;">
                        <img style="width: 100%;" src="../../assets/images/logo-sin-texto.png" alt="logo">
                    </md-avatar>

                    <div class="md-list-item-text" style="white-space: initial;">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </p>
                    </div>

                    <md-button class="md-icon-button md-list-action">
                        <md-icon class="delete-button">delete_forever</md-icon>
                        <md-tooltip md-direction="bottom">
                            <span style="color:#ed1d8e">Eliminar</span>
                        </md-tooltip>
                    </md-button>
                </md-list-item>
                <md-divider style="background-color: #569cb0; margin-top: 5px" class="md-inset"></md-divider>
                <md-list-item>
                    <md-avatar style="border-radius: 0px !important;">
                        <img style="width: 100%;" src="../../assets/images/logo-sin-texto.png" alt="logo">
                    </md-avatar>

                    <div class="md-list-item-text" style="white-space: initial;">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </p>
                    </div>

                    <md-button class="md-icon-button md-list-action">
                        <md-icon class="delete-button">delete_forever</md-icon>
                        <md-tooltip md-direction="bottom">
                            <span style="color:#ed1d8e">Eliminar</span>
                        </md-tooltip>
                    </md-button>
                </md-list-item>
                <md-divider style="background-color: #569cb0; margin-top: 5px" class="md-inset"></md-divider>
            </md-list>

        </md-app-content>
    </md-app>
</template>
<script>
    import Navigator from "../Navigator";

    export default {
        name: "listDocument",
        components: {Navigator}
    }
</script>

<style scoped>
    .delete-button {
        color: black;
    }

    .delete-button:hover {
        color: #ed1d8e;
    }
</style>