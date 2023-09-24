<script>

	import notification from 'services/notification'
	import alert from 'services/alert';

	export default {
		data () {
			return {
				type: {},
				types: [],
				errors: [],
				pages: []
			}
		},
		mounted: function () {
			this.fetchTypes();
			this.fetchPages();
		},
		methods: {
			fetchPages: function () {
				this.$http.get('/api/pages/all').then((response) => {
					this.pages = response.body;
				});
			},
			fetchTypes: function () {
				this.$http.get('/api/pages/types').then((response) => {
					this.types = response.body;
				});
			},
			saveType: function (param) {
		   		this.$http.post('/api/pages/types', param).then((response) => {
			  		notification.show("success", "Saved with success!");
			  		this.finalize();
		       	},(err) => {
		       		this.errors = err.body.errors;
		        });
			},
			finalize: function () {
				this.type = [];
				this.fetchTypes();
				$('.modal').modal('hide');
			}
		}
	}
</script>

<template src="../templates/page-types.html">
	
</template>