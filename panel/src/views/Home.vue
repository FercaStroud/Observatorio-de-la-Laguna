<template>
  <div class="home">
    <Navigator/>
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import Navigator from "../components/Navigator";

export default {
  name: 'home',
  components: {
    Navigator,
    HelloWorld
  }
}
</script>
