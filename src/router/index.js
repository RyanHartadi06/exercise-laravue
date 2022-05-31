import {createWebHistory , createRouter} from 'vue-router'
import Home from '@/views/Home.vue'
import Login from '@/views/register/Login.vue'
import Product from '@/views/Product.vue'
import CategoryProducts from '@/views/category/Create'
import createProducts from '@/views/product/Create'

const routes = [
    {
        path: '/',
        name: 'loginPage',
        component: Login
    },
    {
        path: '/home',
        name: 'homePage',
        component: Home
    },
    {
        path: '/product',
        name: 'ProductPage',
        component: Product
    },
    {
        path: '/create-category',
        name: 'categoryProducts',
        component: CategoryProducts
    },
    {
        path: '/create-product',
        name: 'createProducts',
        component: createProducts
    },
]

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
  })

export default router