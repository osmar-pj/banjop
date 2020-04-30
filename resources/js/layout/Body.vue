<template>
    <div>
        <section class="hero is-medium is-bold bg">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="column is-4 ">
                            <img src="../../img/img.png" width="350" height="auto" alt="">
                        </div>
                        <div class="column is-4">
                            <div class="buttons">
                                <b-button type="is-info" :outlined="active" @click.prevent="compra">Compramos a <strong>  {{ valor_compra }} </strong> </b-button>
                                <b-button type="is-success" :outlined="!active" @click.prevent="venta">Vendemos a <strong> {{ valor_venta }} </strong>  </b-button>
                            </div>
                            
                            <b-field :label="msg1">
                                <b-input placeholder="Soles"
                                    type="number"
                                    size="is-large"
                                    step="0.01"
                                    icon="currency-usd-circle"
                                    @input="comproDolar"
                                    v-model="form.soles"> 
                                </b-input>
                            </b-field>
                            
                            <b-field :label="msg2">
                                <b-input placeholder="Dolares"
                                    type="number"
                                    size="is-large"
                                    step="0.01"
                                    icon="currency-usd-circle"
                                    @input="vendoDolar"
                                    v-model="form.dolares">
                                </b-input>
                            </b-field>

                            <div class="buttons">
                                <a class="button is-primary is-medium" href="http://www.app.nunoptica.com">
                                    <strong>Cambiar</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="comoCambiar" class="hero is-link is-bold">
            <div class="hero-body">
                <div class="container">
                    <b-steps size="is-large"
                        :has-navigation="false">
                        <b-step-item label="Cotiza" icon="calculator" :clickable="true">
                            <h1 class="title has-text-centered has-text-dark">Haz una cotizacion</h1>
                            <p class="subtitle has-text-centered has-text-grey">Usa el formulario para revisar tu tipo de cambia, si eres cliente habitual pide tu descuento especial!</p>
                        </b-step-item>
                        <b-step-item label="Registra" icon="file-document-edit" :clickable="true">
                            <h1 class="title has-text-centered has-text-dark">Registrate</h1>
                            <p class="subtitle has-text-centered has-text-grey">Si no estas registrado, obten una cuenta y empieza a cambiar soles y dolares de forma digital, rapida y segura!</p>
                        </b-step-item>
                        <b-step-item label="Transfiere" icon="cash-multiple" :clickable="true">
                            <h1 class="title has-text-centered has-text-dark">Envias</h1>
                            <p class="subtitle has-text-centered has-text-grey">Transfiere el dinero a una de nuestras cuentas</p>
                        </b-step-item>
                        <b-step-item label="Recibe" icon="handshake" :clickable="true">
                            <h1 class="title has-text-centered has-text-dark">Recibes</h1>
                            <p class="subtitle has-text-centered has-text-grey">Inmediatamente enviaremos el dinero del tipo de cambio a las cuentas registradas</p>
                        </b-step-item>
                    </b-steps>
                </div>
            </div>
        </section>
        <section>
            <b-carousel :indicator="false">
                <b-carousel-item>
                    <span class="image">
                        <img src="../../img/img1.png">
                    </span>
                </b-carousel-item>
                <b-carousel-item>
                    <span class="image">
                        <img src="../../img/img2.png">
                    </span>
                </b-carousel-item>
                <b-carousel-item>
                    <span class="image">
                        <img src="../../img/img3.png">
                    </span>
                </b-carousel-item>
                <b-carousel-item>
                    <span class="image">
                        <img src="../../img/img4.png">
                    </span>
                </b-carousel-item>
            </b-carousel>
        </section>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    Powered by <a href="http://www.gunjop.com" target="_blank"><strong>GUNJOP</strong></a> Company.
                </p>
            </div>
        </footer>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    created() {
        axios.get('/api/lastexchange')
        .then(res => {
            this.tipo_cambio = res.data.compra
            this.form.dolares = this.form.soles * this.tipo_cambio
        })
    },
    mounted() {
        this.$store.dispatch('lastExchange')
    },
    data() {
        return {
            msg1: 'Recibes Soles',
            msg2: 'Envias Dolares',
            active: false,
            form: {
                soles: 1000,
                dolares: 4443
            },
            tipo_cambio: 0
        }
    },
    methods: {
        compra() {
            this.active = false
            this.msg1 = 'Recibes Soles'
            this.msg2 = 'Envias Dolares'
            this.tipo_cambio = this.$store.getters.compra
            this.form.dolares = (this.form.soles / this.tipo_cambio).toFixed(2)
        },
        venta() {
            this.active = true
            this.msg1 = 'Envias Soles'
            this.msg2 = 'Recibes Dolares'
            this.tipo_cambio = this.$store.getters.venta
            this.form.soles = (this.form.dolares * this.tipo_cambio).toFixed(2)
        },
        comproDolar() {
            this.form.dolares = (this.form.soles / this.tipo_cambio).toFixed(2)
        },
        vendoDolar() {
            this.form.soles = (this.form.dolares * this.tipo_cambio).toFixed(2)
        }
    },
    computed: {
        valor_compra() {
            return this.$store.getters.compra
        },
        valor_venta() {
            return this.$store.getters.venta
        }
    }
}
</script>

<style lang="scss">
    .bg{
        background-image: url('../../img/bg.png');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>