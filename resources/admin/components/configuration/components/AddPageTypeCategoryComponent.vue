<script>

	import notification from 'services/notification'
	import alert from 'services/alert';

	export default {
		data () {
			return {
				basic: {},
				errors: [],
				basics: [],
				pageType: [],
				languages: [],
				translate: [],
				categoryCountAndTypeForPostType: [],

			}
		},
		mounted: function () {
			this.fetchDatas();
			this.fetchLanguages();
		},
		methods: {
			saveBasic: function (param) {

				var language = 'en';

				var name = (param["name"] != undefined ? name = param.name : param = "");

				if(param.name != undefined) {
					var name = {[language] : param.name}
				}



				let object = {
					name: name,
					description: param.description,
					type_id: this.$route.params.id,
				}

				this.$http.post('/api/pages/types/categories', object, {emulateJSON: true}).then((response) => {
				  		notification.show("success", "Saved with success!");
				  		this.finalize();
			       	},(err) => {
			       		this.errors = err.body.errors;
			        });
				


				// check category count for specific page type
				// and if condition is true create a field for categories
				this.$http.get('/api/pages/type/categories/count/' + object.type_id).then(
					(response) => {
						this.categoryCountAndTypeForPostType = response.body;
						if(this.categoryCountAndTypeForPostType.count === 1 && this.categoryCountAndTypeForPostType.type === "many") {
							this.$http.post('/api/pages/type/categories/createcategoryfield', {type_id: object.type_id}).then( (response) => {
								console.log("category field is created now for this page type");
							});
						}
					});
					

		   		

			},
			findById: function (param) {
				this.$http.get('/api/pages/types/categories/show/' + param.id).then((response) => {
					this.pageType = response.body;
					//console.log(response.body.categories[0]);
				});
			},
			saveTranslate: function (param) {
			   	this.$http.post('/api/pages/types/categories/' + param.id, param, {emulateJSON: true}).then((response) => {
			  		notification.show("success", "Saved with success!");
		  			this.finalize();
		       	},(err) => {
		       		this.errors = err.body.errors;
		        });
			},
			fetchDatas: function () { 
				this.$http.get('/api/pages/types/categories/' +  this.$route.params.id).then((response) =>{
					this.basics = response.body;
				});
			},
			finalize: function () {
				this.language = [];
				this.fetchDatas();
			},
			deleteObject: function (param) {
				var _this = this;

				alert.show(function () {
					_this.$http.delete('/api/pages/types/categories/' + param.id, param).then((response) => {
						_this.fetchDatas();
						notification.show("success", "Category deleted with success!");
					});
				});
			},

			fetchLanguages: function() {
				this.$http.get('/api/languages').then((response) => {
					this.languages = response.body;
				});
			}
			

		}
	}
</script>

<template src="../templates/add-page-type-category.html">
	
</template>