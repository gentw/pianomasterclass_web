import Vue from 'vue'
import Vuex from 'vuex'
import getters from './getters'

Vue.use(Vuex)

const state = {
	showing: false,
	slug: '',
	lang: Vue.config.lang,
	globalRequest: {}
}

const mutations = {
	showRevealer(state, showing) {
		state.showing = showing;
	},
	changeSlug(state, slug) {
		state.slug = slug;
	},
	changeLang(state, lang) {
		state.lang = lang;
        Vue.i18n.set(state.lang);
	},
	storeGlobal(state, globalReq) {
		state.globalRequest = globalReq;
	}
}

export default new Vuex.Store({
    state: state,
    mutations: mutations,
    getters: getters
});