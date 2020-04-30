<template>
    <b-navbar>
        <template slot="brand">
            <b-navbar-item>
                <img
                    src="../../img/logo.png"
                    alt="BANJOP"
                >
            </b-navbar-item>
        </template>
        <template slot="start">
            <b-navbar-item href="#">
                Inicio
            </b-navbar-item>
            <b-navbar-item href="#comoCambiar">
                Como funciona
            </b-navbar-item>
            <b-navbar-dropdown label="Mas">
                <b-navbar-item @click="inversionista">
                    Quieres ser inversionista?
                </b-navbar-item>
            </b-navbar-dropdown>
        </template>

        <template slot="end">
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-success is-medium" target="_blank" href="https://wa.me/51944574109">
                        <b-icon icon="whatsapp"></b-icon><strong>+51-944574109</strong>
                    </a>
                    <a class="button is-primary is-medium" href="http://www.app.nunoptica.com">
                        <strong>Ingresar</strong>
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
</template>

<script>
export default {
    methods: {
        inversionista() {
            this.$router.push('/inversionistas')
        }
    }
}
</script>