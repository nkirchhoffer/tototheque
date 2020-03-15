import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomeComponent from './components/HomeComponent'
import LoginComponent from './components/LoginComponent'
import BookComponent from './components/BookComponent'
import RegisterComponent from './components/RegisterComponent'

const routes = [
    { path: '/', component: HomeComponent, name: 'home' },
    { path: '/member/login', component: LoginComponent, name: 'login' },
    { path: '/member/register', component: RegisterComponent, name: 'register' },
    { path: '/books/:id', component: BookComponent, name: 'book' }
]

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes
})

export default router