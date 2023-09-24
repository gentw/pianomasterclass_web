<script>

import Vue from 'vue'
import { mapGetters } from 'vuex';

import FooterComponent from './includes/FooterComponent.vue';
import ServicesComponent from './includes/ServicesComponent.vue';
import CommunitiesComponent from './includes/CommunitiesComponent.vue';
import NdcontactComponent from './includes/NdcontactComponent.vue';
import OthereventsrightComponent from './includes/OthereventsrightComponent.vue';
import HomecommunitiesComponent from './includes/HomecommunitiesComponent.vue';
import AboutservicesComponent from './includes/AboutservicesComponent.vue';
import CompanycardsComponent from './includes/CompanycardsComponent.vue';
import UpcomingEventsComponent from './includes/UpcomingEventsComponent.vue';


import OwlCarousel from '../directives/OwlCarousel'

 export default {
  components: {
        FooterComponent,
        ServicesComponent,
        CommunitiesComponent,
        NdcontactComponent,
        OthereventsrightComponent,
        HomecommunitiesComponent,
        AboutservicesComponent,
        CompanycardsComponent,
        UpcomingEventsComponent
  },
  data () {
    return {
      one: [],
      many: [],
      lang: Vue.config.lang
    }
  },
  directives: {
    OwlCarousel: OwlCarousel
  },
  computed: mapGetters({
        slug: 'getSlug',
        globalRequest: 'getGlobalRequest'
    }),
  mounted: function () {
    this.$http.get('/websites/api/modules/' + this.$route.params.slug).then((response) => {
      this.one = response.body.one;
      this.many = response.body.many;
    });

        setTimeout(function (){

            // var wow = new WOW({
            //     boxClass: 'wow',
            //     animateClass: 'animated'
            // });

            // wow.init();


            var swiper = new Swiper('.swiper-container_logos', {
            paginationClickable: true,
            slidesPerView: 3,
            spaceBetween: 15,
            autoplay: 9500,
            autoplayDisableOnInteraction: false,
            loop: true,
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                }
            }
        });
            var swiper = new Swiper('.swiper-container_alphabet', {
            paginationClickable: true,
            slidesPerView: 26,
            spaceBetween: 18,
            autoplay: false,
            autoplayDisableOnInteraction: false,
            loop: false,
            breakpoints: {
                1024: {
                    slidesPerView: 26,
                    spaceBetween: 15
                },
                768: {
                    slidesPerView: 10,
                    spaceBetween: 15
                },
                640: {
                    slidesPerView: 10,
                    spaceBetween: 15
                },
                320: {
                    slidesPerView: 10,
                    spaceBetween: 15
                }
            }
        });

            $('a[href="#search"]').on('click', function(event) {                    
                $('#search').addClass('open');
                $('#search > form > input[type="search"]').focus();
            });            
            $('#search, #search button.close').on('click keyup', function(event) {
                if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                    $(this).removeClass('open');
                }
            });   

        $('.imageGallery1 div a').simpleLightbox();
        });

  },
  methods: {

  }
 }
</script>

<template src="./templates/index.html">

</template>