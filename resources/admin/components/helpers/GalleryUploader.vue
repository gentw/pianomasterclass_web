<template>
	<div>
		<input type="file" v-on:change="changeFile" multiple>
		<div class="col-md-12 body__gallery">
			<div class="image__container gallery--container waiting__upload" id="list" v-for="media in medias">
				<img :src="media">
				<div class="image__info">
					<a v-on:click="deleteImage(index)"><i class="fa fa-trash"></i></a>
				</div>
			</div>
			<div v-sortable="{onEnd: reorder}">
				<div class="image__container gallery--container" id="list" v-if="bindedImage !== 'gallery'" v-for="(gallery, index) in bindedImage" :key="gallery.id" v-show="isImage(gallery.image)">
					<img :src="'/img/manjakos/' + gallery.image">
					<div class="image__info">
						<a v-on:click="deleteImage(gallery.id, index)"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	import Vue from 'vue'
	import alert from 'services/alert';
	import notification from 'services/notification';
	import Sortable from 'directives/Sortable';

	export default {
		directives: {
			Sortable: Sortable
		},
		data () {
			return {
				images: {},
				medias: [],
				bindHtml: "",
				uploadFlag: false,
				bindedImage: {}
			}
		},
		watch: {
			uploaded: function (newVal, oldVal) {
				console.log(this.uploadFlag);
				if (this.uploadFlag == false) {
					this.bindedImage = [];
					this.medias = [];
					this.bindedImage = this.uploaded;
					return; 
				}
			}
		},
		props: ['slug', 'uploaded', 'type_id', "entity_id"],
		mounted: function () {
			this.bindedImage = this.uploaded;
		},
		updated: function () {
			// console.log("This gallery updated");
			// this.bindedImage = this.uploaded;

		},
		methods: {
			changeFile: function (evt) {
				var vm = this;
				var files = evt.target.files;
				this.uploadFlag = true;


				this.initializeImage(files);
			},
			initializeImage: function (param) {
				var vm = this;

				let object = {files: param, slug: this.slug};

				vm.$emit('drop-success', object);

				for (var i = 0, f; f = param[i]; i++) { 
					if (!f.type.match('image.*')) {
						continue;
					}

					var reader = new FileReader();

				 	reader.onload = (e) => {
			        	vm.medias.push(e.target.result);
			        	this.uploadFlag = false;
      				};

					reader.readAsDataURL(f);

				}
			},
			deleteImage: function (param) {
				this.medias.splice(0, 1);
			},
			isImage: function (param) {

				if (param === 'gallery' || param === undefined  || param === null || param === "null") {
					return false;
				}

				let file = param.split(".").pop();

				if (file.match(/^(SVG|GIF|PNG|JPEG|JPG|jpg|jpeg|gif|png|svg)$/)) {
					this.uploadFlag = false;
					return true;
				} else {
					return false;
				}
			},
			deleteImage: function (id, index) {
				var vm = this;

				alert.show(function () {
					vm.$http.delete("/api/images/" + id).then((response) => {
						vm.bindedImage.splice(index, 1);
						notification.show("success", "Image deleted with success!");
					});
				});
			},
		  	reorder ({oldIndex, newIndex}) {
	    		const movedItem = this.bindedImage.splice(oldIndex, 1)[0]
		        this.bindedImage.splice(newIndex, 0, movedItem)


				if(this.entity_id === undefined){
                    this.$http.post('/api/reorder/images/' + this.type_id + '/'+ null, {'images': this.bindedImage}).then((response) => {
                        console.log(response);
                    })
				}else{
                    this.$http.post('/api/reorder/images/' + this.type_id + '/'+ this.entity_id, {'images': this.bindedImage}).then((response) => {
                        console.log(response);
                    })
				}

		    }
		}
	}
</script>