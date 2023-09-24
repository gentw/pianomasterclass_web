<script>

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
		<!--  -->
		<div class="second__section default__section testimonial__part">
			<h1 class="text-center">{{ 'testimonials' | translate }}</h1>
			<div class="container__modified" v-if="globalReq[0]">
				<div class="col-md-4 testimonial__card wow fadeInUp" v-for="testimonial in globalReq[0]['testimonials']">
					<img :src="'/img/manjakos/' +  testimonial.collections.image">
					<div class="person__information">
						<h5>{{ testimonial.collections.name[lang] }}</h5>
						<div v-html="testimonial.collections.description[lang]"></div>
						<span>{{ testimonial.collections.position[lang] }}</span>
					</div>
				</div>
				<router-link to="contact" class="blue__button">{{ 'contact' | translate }}</router-link>
			</div>
		</div>
		<div class="first__section third__section">
			<!--  -->
			<div class="container">
				<div class="information__studies col-md-12 default__section">
					<div class="col-md-6">
						<div class="text__block wow fadeInRight">
							<h1>{{ 'casestudy.distribute.title' | translate }}</h1>
							<p>{{ 'casestudy.distribute.description' | translate }}</p>
							<router-link to="contact" class="blue__button">{{ 'get_in_touch' | translate }}</router-link>
						</div>							
					</div>
					<div class="col-md-6">
						<img class="block__image wow fadeInLeft" src="/img/device.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</template>