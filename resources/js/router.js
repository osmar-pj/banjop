import Vue from 'vue'
import VueRouter from 'vue-router'

import Body from './layout/body.vue'
import Inversionista from './components/Inversionista.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Body
        },
        {
            path: '/inversionistas',
            component: Inversionista
        }
    ]
})

export default router