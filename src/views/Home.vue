<template>
  <div class="home">
    <HelloWorld/>
    <SectionPage/>
  </div>
</template>

<script>
import HelloWorld from '../components/HelloWorld.vue'
import SectionPage from '../components/SectionPage.vue'

export default {
  name: "homePage",
  components: {
    HelloWorld,
    SectionPage,
  }
}
</script>

<style>
</style>
