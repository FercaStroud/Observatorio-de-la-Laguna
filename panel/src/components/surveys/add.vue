<template>
    <section style="margin-top: 20px">
        <div class="md-layout md-gutter md-alignment-center">
            <div class="md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
                <h2 style="text-align: center">
                    Añadir encuesta o lo que sea
                </h2>
                <md-field style="background-color: #ffffff">
                    <label>Nombre de la encuesta</label>
                    <md-input style="border-bottom: 1px solid black" v-model="regular" md-counter="30"></md-input>
                </md-field>
                <md-field style="background-color: #ffffff">
                    <label>descripción</label>
                    <md-textarea style="border-bottom: 1px solid black" v-model="textarea"></md-textarea>
                </md-field>
                <md-field md-inline style="background-color: #4693a9">
                    <label>Pregunta</label>
                    <md-input v-model="inline"></md-input>
                </md-field>
                <md-field md-inline style="background-color: #ffffff">
                    <label>Escribir respuesta</label>
                    <md-input v-model="inline"></md-input>
                </md-field>
                <md-button class="md-primary">Publicar encuesta</md-button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "add"
    }
</script>

<style scoped>

</style>