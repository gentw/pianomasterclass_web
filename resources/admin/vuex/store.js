import Vue from 'vue'
import Vuex from 'vuex'
import getters from './getters'

Vue.use(Vuex)

const state = {
	configTab: ''
}

const mutations = {
	configTab(state, configTab) {
		state.configTab = configTab;
	}
}

export default new Vuex.Store({
    state: state,
    mutations: mutations,
    getters: getters
});