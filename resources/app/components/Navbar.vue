<script>
  import Vue from 'vue'
  import { mapGetters } from 'vuex';
  
  export default {
    name: "Navbar",
    data () {
      return {
        reveal: false,
        lang: Vue.config.lang,
        languages: [],
        pages: [],
        defaultPage: "home",
      }
    },
    mounted: function () {
      this.fetchPages();
    },
    computed: mapGetters({
        revealer: 'getRevealer'
    }),
    methods: {
      showMenu() {
        this.reveal = !this.reveal;
        let body = $("html, body");

        if (this.reveal) {
           this.$store.commit('showRevealer', true)
         } else {
           this.$store.commit('showRevealer', false)
         }
      },
      fetchPages: function () {
        this.$http.get('/websites/api/pages').then((response) => {
          this.pages = response.body;
        });
      }
    }
  }
</script>

<template>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand">
                <img src="/img/logo/Group 180.png">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <div class="sodial_buttons_top_nav">
              <a href="https://www.facebook.com/planetblockchain/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="https://twitter.com/PlanetBlockC"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="https://www.youtube.com/channel/UCk10PjgaoRQvnffI9C3Prdg/videos"><i class="fa fa-youtube" aria-hidden="true"></i></a>
              <a href="https://www.instagram.com/planetblockchain/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>  

          <div class="col-md-12 no_padding">  
            <ul class="navbar-nav navbar-right mobile-d-n">
                <li class="nav-item nav_add_top_s">
                  <img src="/img/banner-728-x-90-gif.gif" class="leader_board_nav">
                </li>
            </ul>    
          </div> 

          <ul class="nav navbar-nav navbar-right navbar_titles">
            <li v-for="page in pages">
              <router-link :to="{name: 'mainchilds', params: {lang: lang, slug: page.slug}}">{{ page.name[lang] }}</router-link>
            </li>
          </ul>
        </div>
      </div> 
    </nav>
</template>