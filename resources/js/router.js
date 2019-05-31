import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomeComponent from './components/HomeComponent'
import LoginComponent from './components/LoginComponent'

const routes = [
    { path: '/', component: HomeComponent, name: 'home' },
    { path: '/member/login', component: LoginComponent, name: 'login' }
]

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes
})

export default router