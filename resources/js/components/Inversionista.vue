<template>
    <div >
        <div class="columns">
             <div class="column is-6 is-offset-3">
                <h1 class="title is-size-3">Quieres ser inversionista?</h1>
                <h2 class="subtitle is-size-4">Completa el formulario y nos contactaremos contigo</h2>
                <b-field label="Nombre">
                    <b-input placeholder="Nombres completos" v-model="form.name"></b-input>
                </b-field>
                <b-field label="Celular">
                    <b-input placeholder="Nro de contacto" v-model="form.celular"></b-input>
                </b-field>
                <b-field label="Poder de inversion">
                    <b-input placeholder="$." type="number" step="0.01" v-model="form.poder"> {{ form.poder }} </b-input>
                </b-field>
                <b-field label="Tipo de moneda">
                    <b-select placeholder="Tipo de moneda" icon="currency-usd" v-model="form.tipo_moneda">
                        <option value="Dolares">Dolares</option>
                        <option value="Soles">Soles</option>
                    </b-select>
                </b-field>
                <b-button class="is-primary" @click.prevent="enviar">Enviar</b-button>
                <b-button @click.prevent="atras" >Atras</b-button>
            </div>
        </div>
        <b-loading :is-full-page="true" :active.sync="isLoading" :can-cancel="true"></b-loading>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            form: {
                name: '',
                celular: '',
                poder: 10000,
                tipo_moneda: 'Soles'
            },
            isLoading: false
        }
    },
    methods: {
        enviar() {
            this.isLoading = true
            axios.post('/api/invesment', this.form )
            .then(res => {
                if(res.data.registered) {
                    this.isLoading = false
                    this.$router.push('/')
                }
            })
            .catch( err => {
                this.isLoading = false
            })
        },
        atras() {
            this.$router.go(-1)
        }
    }
}
</script>