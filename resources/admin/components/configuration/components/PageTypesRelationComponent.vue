<script>

	import notification from 'services/notification'
	import alert from 'services/alert';

	export default {
		data () {
			return {
				type_relation: {},
				type_relations: {},
				types: [],
				errors: [],
				pages: []
			}
		},
		mounted: function () {
			this.fetchPageType();
			this.fetchPageTypeRelations();
			this.fetchPages();
		},
		methods: {
			fetchPages: function () {
				this.$http.get('/api/pages/all').then((response) => {
					this.pages = response.body;
				});
			},

			fetchPageType: function () {
				this.$http.get('/api/pages/types').then((response) => {
					this.types = response.body;
					//console.log(response.body[0].name);
				});
			},

			fetchPageTypeRelations: function () {
				this.$http.get('/api/rels').then((response) => {
					this.type_relations = response.body;
					console.log(response.body[0].name);
				});
			},
			saveTypeRelation: function (param) {
		   		this.$http.post('/api/rels', param).then((response) => {
			  		notification.show("success", "Saved with success!");

			  		this.finalize(response.body);

		       	},(err) => {
		       		this.errors = err.body.errors;
		        });
			},
			finalize: function (param) {
				this.type_relation = [];
				this.fetchPageTypeRelations();
				$('.modal').modal('hide');

				// then create field for this relation
		  		this.$http.post('/api/rels/createrelfield', {type_id: param.from_id, rel_id: param.to_id, rel_type: param.type}).then( (response) => {
					console.log("relation field is created now for this page type");
				});
			}
		}
	}
</script>
<template src="../templates/page-types-relation.html">
	
</template>