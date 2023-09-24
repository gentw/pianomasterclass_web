<script>
    import  Navbar  from  './Navbar.vue'
    import  store from  '../vuex/store'

    // import OwlCarousel from '../directives/OwlCarousel.js'

    import FooterComponent from './includes/FooterComponent.vue';

    import  { mapGetters  } from  'vuex';

    export default {
        name: "app",

        components: {
            Navbar,
            FooterComponent
        },
        store,
        mounted:  function  ()  {

            if (this.$route.params.slug !== undefined) {
                this.$store.commit('changeSlug', this.$route.params.slug);
            }

            if (this.$route.params.slug == 'home') {
                $(".header").addClass('transparent');
            } else {
                $(".header").removeClass('transparent');
            }

            // Global Requests that we can access to all application
            let globalRequest = {
                "global":[
                    {
                        "type":"events",
                        "limit": 3
                    },
                    {
                        "type": "news",
                        "limit": 3
                    }
                ]
            }

            this.$http.post('/websites/api/global', globalRequest).then((response) => {
                this.$store.commit('storeGlobal', response.body.global);
            });
        },
        updated:  function  ()  {
           if (this.$route.params.slug !== undefined) {
                this.$store.commit('changeSlug', this.$route.params.slug);
           }

            if (this.$route.params.slug == 'home') {
                $(".header").addClass('transparent');
            } else {
                $(".header").removeClass('transparent');
            }

            this.$store.commit('showRevealer', false);

            setTimeout(function () {
                var rellax = new Rellax('.rellax');
            }, 500);

             $('.owl-carousel').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000
             });

            $('html, body').css({"overflow-y": "auto", "position": "inherit"});
        }
    }
</script>
<template>
    <div id="page">
        <div  class="header">
            <navbar></navbar>
        </div>
        <router-view :key="$route.fullPath"></router-view>
        <footer-component></footer-component>
    </div>
</template>