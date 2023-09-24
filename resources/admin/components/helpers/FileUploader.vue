<template>
	<div>
		<input type="file" v-on:change="changeFile">
		<div class="col-md-12 body__gallery"  v-if="uploadFlag == false" v-show="isImage(uploaded)">
			<div class="image__container" id="list">
				<img v-if="isPdf == false" :src="'/img/manjakos/' + uploaded">
				<!-- <iframe :src="'/img/manjakos/' + uploaded" v-if="isPdf" frameborder="0"></iframe> -->
				<a :href="'/img/manjakos/' + uploaded" target="_blank"><i v-if="isPdf" class="fa fa-file-pdf-o pdf__file" aria-hidden="true"></i></a>
			</div>
		</div>

		<div class="col-md-12 body__gallery" v-if="uploadFlag">
			<div class="image__container" id="list">
				<img :src="medias" v-if="isPdf == false">
				<!-- <iframe :src="medias" v-if="isPdf" frameborder="0"></iframe> -->
				<i v-if="isPdf" class="fa fa-file-pdf-o pdf__file" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</template>

<script>

    import Vue from 'vue'

    export default {
        data () {
            return {
                images: {},
                medias: '',
                bindHtml: "",
                uploadFlag: false,
                isPdf: false
            }
        },
        props: ['slug', 'uploaded'],
        mounted: function () {
            // console.log("From component " + this.slug);
        },
        methods: {
            changeFile: function (evt) {
                var vm = this;
                var files = evt.target.files;
                this.uploadFlag = true;

                console.log(files[0]);

                if (files[0].type == "application/pdf") {
                    this.isPdf = true;
                } else {
                    this.isPdf = false;
                }

                this.initializeImage(files);
            },
            initializeImage: function (param) {
                var vm = this;


                let object = {files: param, slug: this.slug};

                vm.$emit('drop-success', object);

                for (var i = 0, f; f = param[i]; i++) {

                    var reader = new FileReader();

                    reader.onload = (e) => {
                        vm.medias = e.target.result;
                    };

                    reader.readAsDataURL(f);

                }
            },
            deleteImage: function (param) {
                this.medias.splice(0, 1);
            },
            isImage: function (param) {

                if (param === undefined || param === null) {
                    return false;
                }

                if (typeof param == 'object') {
                    var file = param['name'].split(".").pop();
                } else {
                    var file = param.split(".").pop();
                }

                if (file.match(/^(jpg|jpeg|gif|png|svg|pdf)$/)) {

                    if (file.match(/^(pdf)$/)) {
                        this.isPdf = true;
                    }

                    this.uploadFlag = false;
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>