<script>

	import notification from 'services/notification'
	import alert from 'services/alert';

	export default {
		data () {
			return {
				page: [],
				errors: [],
				pages: [],
				languages: [],
				translate: []
			}
		},
		mounted: function () {
			this.fetchPages();
			this.fetchLanguages();
		},
		methods: {
			save: function (data) {

				var language = 'en';
				var name = (data["name"] != undefined ? name = data.name : name = "");
				var slug = (data["slug"] != undefined ? slug = data.slug : slug = "");
				var parentId = (data["parent_id"] != undefined ? parentId = data.parent_id : parentId = "");

				if(data.name != undefined){
					var name = {[language]: data.name};
				}


				let object = {
					name: name,
					slug: slug,
					parent_id: parentId
				}

				if (data.id !== undefined) {

				} else {
				   	this.$http.post('/api/pages', object, {emulateJSON: true}).then((response) => {
				  		notification.show("success", "Saved with success!");
			  			this.finalize();
			       	},(err) => {
			       		this.errors = err.body.errors;
			        });
				}
			},
			saveTranslate: function (param) {
			   	this.$http.post('/api/pages/' + param.id, param, {emulateJSON: true}).then((response) => {
			  		notification.show("success", "Saved with success!");
		  			this.finalize();
		       	},(err) => {
		       		this.errors = err.body.errors;
		        });
			},
			fetchPages: function () {
				this.$http.get('/api/pages').then((response) => {
					this.pages = response.body;
				});
			},
			findById: function (data) {
				this.$http.get('/api/pages/' + data.id).then((response) => {
					this.page = response.body;
				});
			},
			deleteObject: function (data) {
				let vm = this;

				alert.show(function () {
					vm.$http.delete('/api/pages/' + data.id, data).then((response) => {
						vm.fetchPages();
						notification.show("success", "Language deleted with success!");
					});
				});
			},
			finalize: function () {
				this.language = [];
				this.errors = [];
				this.fetchPages();
				$('.modal').modal('hide');
			},
			
			fetchLanguages: function () {
				this.$http.get('/api/languages').then((response) => {
					this.languages = response.body;
				});
			}
		}
	}
</script>

<template src="../templates/pages.html">

</template>