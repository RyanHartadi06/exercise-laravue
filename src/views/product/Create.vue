<template>
  <div class="home">
    <h1>Create Product</h1>
    <div class="alert alert-success" v-if="isSuccess">Success Created</div>
    <div class="container justify-content-center align-items-center">
      <div class="col-12">
        <form @submit.prevent="created" enctype="multipart/form-data">
          <div class="mb-3">
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Name Products</label
              >
              <input
                type="text"
                class="form-control"
                v-model="product.name_products"
              />
            </div>
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Price</label
              >
              <input type="text" class="form-control" v-model="product.price" />
            </div>
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Choose Your Category Products</label
              >
              <select
                class="form-select"
                aria-label="Choose Your Category Products"
                v-model="product.category_id"
              >
                <option
                  v-for="list in listCategory"
                  :key="list.id"
                  :value="list.id"
                >
                  {{ list.name }}
                </option>
              </select>
            </div>
            <img :src="previewimg" v-if="previewimg" width="200" />
            <div class="col-12">
              <label for="exampleFormControlInput1" class="form-label"
                >Image</label
              >
              <input
                type="file"
                class="form-control"
                @change="onFileSelected"
              />
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
  name: "createProducts",
  components: {},
  data() {
    return {
      url: process.env.VUE_APP_SERVICE_URL,
      isSuccess: false,
      product: {
        name_products: "",
        price: "",
        category_id: "",
        gambar: "",
      },
      previewimg: "",
      listCategory: [],
      imagesArray: null,
    };
  },
  async mounted() {
    let res = await axios.get(this.url + "api/kategori");
    console.warn(res.data);
    this.listCategory = res.data;
  },
  methods: {
    onFileSelected(event) {
      const namagambar = event.target.files[0].name;
      this.imagesArray = event.target.files[0];
      this.product.gambar = namagambar;
      this.previewimg = URL.createObjectURL(event.target.files[0]);
    },
    async created() {
      const fd = new FormData();
      fd.append("name_products", this.product.name_products);
      fd.append("price", this.product.price);
      fd.append("category_id", this.product.category_id);
      fd.append("image", this.imagesArray, this.product.gambar);
      await axios({
        method: "post",
        url: this.url + "api/products/store",
        data: fd,
        headers: {
          "Content-Type": `multipart/form-data; boundary=${fd._boundary}`,
        },
      })
        .then((res) => {
          this.isSuccess = true;
          console.log(res);
          this.$router.push("/product");
        })
        .catch(function (error) {
          if (error.response) {
            // Request made and server responded
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            // The request was made but no response was received
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log("Error", error.message);
          }
        });
    },
  },
};
</script>
