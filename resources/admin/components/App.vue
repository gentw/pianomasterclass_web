<script>
	
	import SidebarComponent from './includes/SidebarComponent.vue'
	import TextEditor from 'helpers/TextEditor.vue'
	import FileUploader from 'helpers/FileUploader.vue'
	import  store from  '../vuex/store'
	import  { mapGetters  } from  'vuex';
	

	export default {
		name: 'app',
		components: {
			SidebarComponent,
			TextEditor,
			FileUploader
		},
		data () {
			return {
				flexed: true
			}
		},
		store,
		mounted: function () {
			if (this.$route.name == 'dashboard' || this.$route.name == "configuration" || this.$route.name == "pagetypeadd" || this.$route.name == "users") {
				this.flexed = false;
			} else {
				this.flexed = true;
			}

		},
		updated: function () {
			if (this.$route.name == 'dashboard' || this.$route.name == "configuration" || this.$route.name == "pagetypeadd" || this.$route.name == "users") {
				this.flexed = false;
			} else {
				this.flexed = true;
			}
		}
	}
</script>

<template>
	<div>
		<sidebar-component></sidebar-component>
		<div class="pages" v-bind:class="{'no--flex': flexed}">
			<div class="card__layout--main">
				<div class="col-md-12 section__nav">
					<router-view :key="$route.fullPath"></router-view>
				</div>
			</div>
		</div>	
	</div>
</template>