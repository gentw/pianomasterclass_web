			
<script type="text/javascript">
	import Vue from 'vue'

	export default {
		props: ['globalReq'],
		data () {
			return {
				lang: Vue.config.lang
			}
		},
		// mounted: function () {
			
  //       $('.imageGallery1 div a').simpleLightbox();

		// }
	}
</script>

<template>
	<div class="col-md-3">
		<div class="news_small_pannel_left">
			<div class="row"  v-if="globalReq.many">
				
				<router-link class="include__event-redirect" v-for="event in globalReq.many[0].events" :to="{name: 'pagecomponent', params: {lang: 'en', parent: 'event', id: event.id, slug: event.slugable[lang]}}">
					<div class="news_card_info box_shadow_default">
						<img :src="'/img/manjakos/' + event.collections.image" />
						<div class="text_under_news_card">
							<h4>{{ event.collections.date | moment("calendar") }}</h4>
							<p>{{ event.collections.title[lang] }}</p>
						</div>
					</div>
				</router-link>

			</div>
		</div>
	</div>
</template>

<style type="text/css" scoped>
	.include__event-redirect {
	    /*color: #!important;*/
    	border-bottom: none;
	}
</style>