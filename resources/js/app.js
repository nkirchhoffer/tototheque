import Vue from 'vue'
import { mapState } from 'vuex'
import Echo from 'laravel-echo'
window.io = require('socket.io-client')

import router from './router'
import store from './store'
import http from './http'

import '@fortawesome/fontawesome-free'

import NotificationComponent from './components/NotificationComponent'

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
})

Vue.component('notification', NotificationComponent)

new Vue({
    router,
    store,

    computed: mapState(['user']),

    methods: {
        logout() {
            this.$store.dispatch('logoutUser')
        },

        search() {
            let searchURI = encodeURI(this.searchText)
            this.$router.push({ name: 'search', params: {search: searchURI} })
        }
    },

    data() {
      return {
          searchText: null
      }
    },

    mounted() {
        this.$store.dispatch('fetchUser')
    }
}).$mount('#app')