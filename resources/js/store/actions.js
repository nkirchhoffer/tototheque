import http from '../http'

const actions = {
 
    login (context, data) {
        http.post('/login', data).then(res => {
            res.json().then(data => {
                context.commit('setUser', data)
            })
        }).catch(console.error)
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