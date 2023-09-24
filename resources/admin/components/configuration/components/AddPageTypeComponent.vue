<script>

	import notification from 'services/notification'
	import alert from 'services/alert';

	export default {
		data () {
			return {
				basic: {},
				errors: [],
				basics: []
			}
		},
		mounted: function () {
			this.fetchDatas();
		},
		methods: {
			saveBasic: function (param) {
				let object = {
					label: param.label,
					name: param.name,
					type: param.type,
					rule: param.rule,
					slugable: param.slugable,
					page_type_id: this.$route.params.id
				}

		   		this.$http.post('/api/pages/fields', object).then((response) => {
			  		notification.show("success", "Saved with success!");
			  		this.finalize();
		       	},(err) => {
		       		this.errors = err.body.errors;
		        });

			},
			fetchDatas: function () {
				this.$http.get('/api/pages/types/' +  this.$route.params.id).then((response) =>{
					this.basics = response.body;
				});
			},
			finalize: function () {
				this.fetchDatas();
			}
		}
	}
</script>

<template src="../templates/add-page-type.html">
	
</template>