import Vue from 'vue'
import Vuex from 'vuex'

import axios from 'axios'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        compra: 0,
        venta: 0
    },
    getters: {
        compra(state) {
            return state.compra
        },
        venta(state) {
            return state.venta
        }
    },
    mutations: {
        updateCompra(state, payload) {
            state.compra = payload
        },
        updateVenta(state, payload) {
            state.venta = payload
        }
    },
    actions: {
        lastExchange(context) {
            axios.get('/api/lastexchange')
            .then(res => {
                context.commit('updateCompra', res.data.compra)
                context.commit('updateVenta', res.data.venta)
            })
            .catch(err => {

            })
        }
    }
})

export default store