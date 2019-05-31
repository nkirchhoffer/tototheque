import Vue from 'vue'

import router from './router'
import store from './store'

import '@fortawesome/fontawesome-free'

new Vue({
    router,
    store,

    mounted() {
        this.$store.dispatch('fetchUser')
    }
}).$mount('#app')