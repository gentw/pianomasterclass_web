<script>
  	import { mapGetters } from 'vuex';

	import LanguageComponent from './components/LanguageComponent.vue'
	import PagesComponent from './components/PagesComponent.vue'
	import PageTypesComponent from './components/PageTypesComponent.vue'
	import PageTypesRelationComponent from './components/PageTypesRelationComponent.vue'
	
	export default {
		components: {
			LanguageComponent,
			PagesComponent,
			PageTypesComponent,
			PageTypesRelationComponent
		},
		computed: mapGetters({
			tab: 'getConfigTab'
		}),
		mounted: function () {
			this.$store.commit('configTab', 'languages');
		},
		methods: {
			fetchTab: function (param) {
				this.$store.commit('configTab', param);
			}
		}
	}
</script>

<template src="./templates/configuration.html">
	
</template>