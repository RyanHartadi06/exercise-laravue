<template>
  <!-- <h2>{{this.url}}</h2> -->
  <h1>Product Page</h1>
  <router-link to="/create-product">Add New Product</router-link>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nomor</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in list" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.name_products }}</td>
        <td>{{ item.price }}</td>
        <td>
          <img v-bind:src="url + item.image" alt class="img-fluid" width="90" />
        </td>
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
  name: "ProductPage",
  data() {
    return {
      url: process.env.VUE_APP_SERVICE_URL,
      list: [],
    };
  },
  async mounted() {
    let res = await axios.get(this.url + "api/products");
    console.warn(res.data);
    this.list = res.data;
  },
};
</script>

<style scoped>
img-fluid {
  width: 100px;
}
</style>
