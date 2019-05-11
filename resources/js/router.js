import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomeComponent from './components/HomeComponent'

const routes = [
    { path: '/', component: HomeComponent, name: 'home' }
]

const router = new VueRouter({
    mode: 'history',
    base: window.location.host,
    routes
})

export default router