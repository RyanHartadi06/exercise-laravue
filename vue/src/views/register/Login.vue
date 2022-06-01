<template>
  <div class="home">
    <h1>Login</h1>
    <div class="container justify-content-center align-items-center">
      <div class="col-12">
        <form @submit.prevent="doLogin">
          <div class="mb-3">
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Email</label
              >
              <input type="email" class="form-control" v-model="login.email" />
            </div>
          </div>
          <div class="mb-3">
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Password</label
              >
              <input
                type="password"
                class="form-control"
                v-model="login.password"
              />
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "loginPage",
  components: {},
  data() {
    return {
      login: {
        email: "",
        password: "",
      },
      token: "",
      url: process.env.VUE_APP_SERVICE_URL,
      isSuccess: false,
    };
  },
  methods: {
    doLogin() {
      const doLogin = {
        email: this.login.email,
        password: this.login.password,
      };
      axios.post(this.url + "api/login", doLogin).then((res) => {
        this.isSuccess = true;
        this.token = res.data.access_token;
        this.token = res.data.access_token;
        this.$router.push("/home");
        localStorage.setItem("token", this.token);
        console.log(this.token);
      });
    },
  },
};
</script>
