import 'bootstrap/dist/css/bootstrap.css'
import 'jquery/dist/jquery.min'
import 'popper.js/dist/popper.min'
import 'bootstrap/dist/js/bootstrap.min'

import { createApp } from 'vue';
import App from './App.vue';
import router from '@/router/index.js';

createApp(App).use(router).mount('#app')