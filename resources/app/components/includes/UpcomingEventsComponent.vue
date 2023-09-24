<script type="text/javascript">
	import Vue from 'vue'

	export default {
		props: ['globalReq'],
		data () {
			return {
				lang: Vue.config.lang
			}
		}
	}
</script>

<template>
	<div>
		<div class="planet_right_card_panel">
				<h3 class="title_right"><router-link to="/events">UPCOMING EVENTS</router-link></h3>
		</div>
		<div class="news_panel_cover_home">
			<div class="row" style="margin: 0px;" v-if="globalReq.many">
				<div class="col-md-12 no_padding card_top_right_home box_shadow_default" v-for="event in globalReq.many[0].events">
					<div class="row">
							<div class="col-md-4 col-sm-4 col-4 small_padding-lr">
								<img :src="'/img/manjakos/' + event.collections.image" />
							</div>
							<div class="col-md-8 col-sm-8 col-8">
								<router-link :to="{name: 'pagecomponent', params: {lang: 'en', parent: 'event', id: event.id, slug: event.slugable[lang]}}">
									<h5>{{ event.collections.date | moment("calendar") }}</h5>
									<p>{{ event.collections.title[lang] }}</p>
								</router-link>
							</div>
					</div>
				</div>






				<div class="add_market_home_top">
					<img src="/img/banner-300-x-250-gif.gif">
				</div>
			</div>
		</div>
	</div>
</template>