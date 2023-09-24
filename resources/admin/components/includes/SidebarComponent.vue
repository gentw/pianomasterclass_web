<script type="text/javascript">
	export default {
		name: 'sidebar',
		data () {
			return {
				pages: []
			}
		},
		mounted: function() {
		    $('.navbar-toggle').click(function () {
		        $('.navbar-nav').toggleClass('slide-in');
		        $('.side-body').toggleClass('body-slide-in');
		        $('#search').removeClass('in').addClass('collapse').slideUp(200);		        
		    });
		   
		   // Remove menu for searching
		   $('#search-trigger').click(function () {
		        $('.navbar-nav').removeClass('slide-in');
		        $('.side-body').removeClass('body-slide-in');
		    });

		   this.fetchPages();
		},
		methods: {
			fetchPages: function () {
				this.$http.get('/api/pages').then((response) => {
					this.pages = response.body;
				});
			}
		}
	}
</script>

<template>
	<div>
	<div class="navigation__holder">
		<div class="logo">
			<a href="https://www.bitemybytes.com/"><img :src="'https://bitemybytes.com/img/logo.png'"></a>
			</div>
			<div class="row">
				 <div class="side-menu">
				    <nav class="navbar navbar-default" role="navigation">
			      		<div class="side-menu-container" v-if="pages">
							<ul class="nav navbar-nav">
			  					<!-- PAGES REPEATER -->
			  					<li class="panel panel-default" id="dropdown" v-for="page in pages">
			  						<router-link class="navi" :to="{name: 'modules', params: {slug: page.slug}}"><i class="fa fa-window-maximize"></i>{{page.name.en}}</router-link>
				      				<ul v-if="page.children.length > 0">
				      					<li class="child__nav" v-for="children in page.children">
				      						<router-link :to="{name: 'modules', params: {slug: children.slug}}" class="navi undernav__navi">
				      							<i class="fa fa-building-o"></i>{{ children.name.en }}
				      						</router-link>
				      					</li>
				      				</ul>
			  					</li>
				 				<li class="panel panel-default" id="dropdown">
					      			<router-link to="/admin/users" class="navi">
				          				<i class="fa fa-user"></i></i>Manage Users
				      				</router-link>
			  					</li>
				 				<li class="panel panel-default" id="dropdown">
					      			<router-link to="/admin/configuration" class="navi">
				          				<i class="fa fa-cog"></i></i>Configuration
				      				</router-link>
			  					</li>
			  					<li id="dropdown" class="panel panel-default"><a href="/admin/events" class="navi"><i class="fa fa-window-maximize"></i>Event Requests</a></li>
							</ul>
			      		</div>
					</nav>
				</div>
			</div>
			<p class="admin__copyrightet">Copyrighted by EmiratesGraphic</p>
		</div>
		<div class="header__container">
	  		<a class="visit__website" href="/home" target="_blank">View Website</a>
	  		<a class="log__out" href="/logout">Log Out</a>
		</div>
	</div>

</template>