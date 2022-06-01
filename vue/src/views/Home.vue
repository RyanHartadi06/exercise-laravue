<template>
  <div class="home">
    <HelloWorld />
    <SectionPage />
  </div>
</template>

<script>
import HelloWorld from "../components/HelloWorld.vue";
import SectionPage from "../components/SectionPage.vue";

export default {
  name: "homePage",
  components: {
    HelloWorld,
    SectionPage,
  },
  data() {
    // return {
    //   token: localStorage.getItem("token"),
    // };
  },
  computed: {
    tokenData: function () {
      return localStorage.getItem("token");
    },
  },
};
</script>

<style></style>
