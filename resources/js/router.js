import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomeComponent from './components/HomeComponent'
import LoginComponent from './components/LoginComponent'
import BookComponent from './components/BookComponent'
import RegisterComponent from './components/RegisterComponent'
import SearchComponent from './components/SearchComponent'
import AuthorComponent from './components/AuthorComponent'
import CategoryComponent from './components/CategoryComponent'

const routes = [
    { path: '/', component: HomeComponent, name: 'home' },
    { path: '/member/login', component: LoginComponent, name: 'login' },
    { path: '/member/register', component: RegisterComponent, name: 'register' },
    { path: '/books/:id', component: BookComponent, name: 'book' },
    { path: '/search/:search', component: SearchComponent, name: 'search' },
    { path: '/authors/:author', component: AuthorComponent, name: 'author' },
    { path: '/categories/:category', component: CategoryComponent, name: 'category' }
]

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes
})

export default router