<template>
  <h1>Category Product</h1>
  <router-link to="/create-category">Add Category Product</router-link>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nomor</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in list" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.name }}</td>
        <td>
          <button type="button" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-success">Edit</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import axios from "axios";

export default {
  name: "SectionPage",
  data() {
    return {
      list: [],
      url: process.env.VUE_APP_SERVICE_URL,
    };
  },
  async mounted() {
    let res = await axios.get(this.url + "api/kategori");
    console.warn(res.data);
    this.list = res.data;
  },
};
</script>

<style scoped>
.a {
  color: black;
}
</style>
