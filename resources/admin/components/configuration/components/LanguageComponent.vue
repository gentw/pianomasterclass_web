<script>
	import Vue from 'vue'
	import notification from 'services/notification'
	import alert from 'services/alert';
    import objectToFormData from 'helpers/object-to-formdata';

	// SORTABLE
	import Sortable from 'directives/Sortable';

	export default {
		directives: {
			Sortable: Sortable
		},
		data() {
			return {
				language: [],
				languages: {},
				errors: []
			}
		},
		mounted: function () {
			this.fetchObject();
		},
		methods: {
			save: function (data) {

				var key = (data["key"] != undefined ? key = data.key : key = "");
				var name = (data["name"] != undefined ? name = data.name : name = "");

				let object = {
					key: key,
					name: name
				}

				let formData = new FormData();

				for (var key in object) {
					formData.append(key, object[key]);
				}

				if (data.id !== undefined) {
				  	this.$http.post('/api/languages/'+ data.id, formData).then((response) => {
				  		notification.show("success", "Updated with success!");
			  			this.finalize();
			       	},(err) => {
			       		this.errors = err.body.errors;
			        });
				} else {
				  	this.$http.post('/api/languages', formData).then((response) => {
				  		notification.show("success", "Saved with success!");
			  			this.finalize();
			       	},(err) => {
			       		this.errors = err.body.errors;
			        });
				}
			},
			fetchObject: function () {
				this.$http.get('/api/languages').then((response) => {
					this.languages = response.body;
				});
			},
			findById: function (data) {
				this.$http.get('/api/languages/' + data.id).then((response) => {
					this.language = response.body;
				});
			},
			deleteObject: function (data) {
				let vm = this;

				alert.show(function () {
					vm.$http.delete('/api/languages/' + data.id, data).then((response) => {
						vm.fetchObject();
						notification.show("success", "Language deleted with success!");
					});
				});
			},
			finalize: function () {
				this.language = [];
				this.errors = [];
				this.fetchObject();
				$('.modal').modal('hide');
			},
		  	reorder ({oldIndex, newIndex}) {
	    		const movedItem = this.languages.splice(oldIndex, 1)[0]
		        this.languages.splice(newIndex, 0, movedItem)


                this.$http.post('/api/reorder/languages', {'languages': this.languages}).then((response) => {
	    		    console.log(response);
                })
		    }
		}
	}
</script>

<template src="../templates/languages.html">

</template>