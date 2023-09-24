export default {
	getRevealer (state) {
		return state.showing
	},
	getSlug (state) {
		return state.slug
	},
	getLang (state) {
		return state.lang
	},
	getGlobalRequest (state) {
		return state.globalRequest
	}
}