<template>
    <section style="margin-top: 20px">
        <div class="md-layout md-gutter md-alignment-center">
            <div class="md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
                <h2 style="text-align: center">
                    Añadir noticia
                </h2>
                <md-field style="background-color: #ffffff">
                    <label>Noticia</label>
                    <md-textarea style="border-bottom: 1px solid black" v-model="textarea"></md-textarea>
                </md-field>
                <md-button class="md-primary">Añadir</md-button>
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