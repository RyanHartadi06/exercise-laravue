<template>
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
  data(){
    return {
      list: [],
    }
  },
  async mounted() {
    let res = await axios.get("http://127.0.0.1:8000/api/kategori");
    console.warn(res.data);
    this.list = res.data;
  }
};
</script>