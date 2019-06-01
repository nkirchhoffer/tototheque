import http from '../http'

const actions = {
 
    async login (context, data) {
        const res = await http.post('/login', data)
        const payload = await res.json()

        if (res.status !== 200) {
            throw new Error(payload.message)
        }

        context.commit('setUser', payload)
    },

    fetchUser(context) {
        http.get('/user').then(res => {
            res.json().then(data => {
                context.commit('setUser', data)
            })
        }).catch(console.error)
    }

}

export default actions