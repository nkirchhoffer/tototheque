import Vue from 'vue'
import { mapState } from 'vuex'
import VueProgressBar from 'vue-progressbar'
import infiniteScroll from 'vue-infinite-scroll'

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

Vue.use(VueProgressBar, {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '3px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
});
Vue.use(infiniteScroll)

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
    },

    created() {
        this.$Progress.start()
        this.$router.beforeEach((to, from, next) => {
            this.$Progress.start()
            next()
        })

        this.$router.afterEach((to, from) => this.$Progress.finish())
    }
}).$mount('#app')