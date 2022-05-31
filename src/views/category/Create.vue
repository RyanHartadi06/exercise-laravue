<template>
  <div class="home">
    <h1>Create Category</h1>
    <div class="alert alert-success" v-if="isSuccess">Success Created</div>
    <div class="container justify-content-center align-items-center">
      <div class="col-12">
        <form @submit.prevent="created">
          <div class="mb-3">
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Name Category</label
              >
              <input type="text" class="form-control" v-model="name" />
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "categoryProducts",
  components: {},
  data() {
    return {
      name: "",
      url: process.env.VUE_APP_SERVICE_URL,
      isSuccess: false,
    };
  },
  methods: {
    created() {
      const category = { name: this.name };
      axios.post(this.url + "api/kategori", category).then((res) => {
        this.isSuccess = true;
        console.log(res);
        this.$router.push("/home");
      });
    },
  },
};
</script>
