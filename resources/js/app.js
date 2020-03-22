import Vue from 'vue'
import { mapState } from 'vuex'

import router from './router'
import store from './store'
import http from './http'

import '@fortawesome/fontawesome-free'

import NotificationComponent from './components/NotificationComponent'

Vue.component('notification', NotificationComponent)

new Vue({
    router,
    store,

    computed: mapState(['user']),

    methods: {
      logout() {
        this.$store.dispatch('logoutUser')
      }
    },

    mounted() {
        this.$store.dispatch('fetchUser')
    }
}).$mount('#app')