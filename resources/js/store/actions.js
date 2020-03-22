import http from '../http'
import 'whatwg-fetch'

const actions = {
 
    async login (context, data) {
        const res = await http.post('/login', data)
        const payload = await res.json()

        if (res.status !== 200) {
            throw new Error(payload.message)
        }

        context.commit('setUser', payload)
    },

    async fetchUser (context) {
        const res = await http.get('/user')
        const data = await res.json()

        if (res.status !== 200) {
            throw new Error(data.message)
        }

        context.commit('setUser', data)
    },

    async logoutUser(context) {
        const url = window.location.protocol + '//' + window.location.host
        const res = await fetch(url + '/logout')

        context.commit('setUser', null)
    },

    async register (context, data) {
        const res = await http.post('/register', data)
        const payload = await res.json()

        if (res.status !== 200) {
            throw new Error(payload.message)
        }

        return true
    }

}

export default actions