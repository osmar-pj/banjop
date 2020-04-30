import Vue from 'vue'
import App from './App.vue'

import Buefy from 'buefy'
import '@mdi/font/css/materialdesignicons.min.css'

import store from './store'
import router from './router'

Vue.use(Buefy)

const app = new Vue({
    el: "#root",
    template: `<app></app>`,
    components: { App },
    store,
    router
})