import Vue from 'vue'

import router from './router'
import store from './store'

import '@fortawesome/fontawesome-free'

import NotificationComponent from './components/NotificationComponent'

Vue.component('notification', NotificationComponent)

new Vue({
    router,
    store,

    mounted() {
        this.$store.dispatch('fetchUser')
    }
}).$mount('#app')