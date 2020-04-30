<template>
    <div>
        <nav-trueke></nav-trueke>
        <router-view></router-view>
    </div>
</template>

<script>
import NavTrueke from './layout/Nav.vue'

export default {
    components: {
        NavTrueke
    }
}
</script>