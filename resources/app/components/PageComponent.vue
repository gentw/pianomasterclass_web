<script>
	
	import Vue from 'vue'
	import { mapGetters } from 'vuex';
	import OthereventsrightComponent from './includes/OthereventsrightComponent.vue';

	export default {
		data () {
			return {
				slug: this.$route.params.parent,
				lang: "en",
				content: []
			}
		},
	 	computed: mapGetters({
        	globalRequest: 'getGlobalRequest'
    	}),
    	components: {
    		OthereventsrightComponent
    	},
		mounted: function () {
			this.$http.get('/websites/api/modules/' + this.$route.params.id + '/'+ this.$route.params.id).then((response) => {
				this.content = response.body.entity;
			});


        setTimeout(function (){


            $('.imageGallery1 div a').simpleLightbox();

        }, 400);


		}
	}
</script>

<template src="./templates/pages.html">

</template>