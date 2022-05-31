<template>
  <div class="product">
    <HelloWorld/>
    <ProductPage/>
  </div>
</template>

<script>
import HelloWorld from '../components/HelloWorld.vue'
import ProductPage from '../components/ProductPage.vue'

export default {
  name: "productPage",
  components: {
    HelloWorld,
    ProductPage,
  }
}
</script>

<style>
</style>
