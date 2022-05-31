import {createWebHistory , createRouter} from 'vue-router'
import Home from '@/views/Home.vue'
import Product from '@/views/Product.vue'

const routes = [
    {
        path: '/',
        name: 'homePage',
        component: Home
    },
    {
        path: '/product',
        name: 'ProductPage',
        component: Product
    },
]

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
  })

export default router