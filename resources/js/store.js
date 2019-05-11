import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import getters from './store/getters'
import actions from './store/actions'
import mutations from './store/mutations'
import state from './store/state'


let store = new Vuex.Store({
    actions,
    getters,
    mutations,
    state
})

export default store