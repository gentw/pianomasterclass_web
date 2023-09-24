<script>
    import FileUploader from 'helpers/FileUploader.vue'
    import GalleryUploader from 'helpers/GalleryUploader.vue'
    import Ckeditor from 'vue-ckeditor2'
    import objectToFormData from 'helpers/object-to-formdata';
    import Datepicker from 'vuejs-datepicker';
    import alert from 'services/alert';
    import notification from 'services/notification';
    // SORTABLE
    import Sortable from 'directives/Sortable';
    export default {
        directives: {
            Sortable: Sortable
        },
        components: {
            FileUploader,
            Ckeditor,
            Datepicker,
            GalleryUploader
        },
        data () {
            return {
                types: [],
                fields: [],
                form: [],
                entities: {},
                date: "",
                lang: "en",
                languages: [],
                galleryOpen: false,
                pageType: [],
                isSaving: false,
                config: {
                    toolbar: [
                        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'FontSize', 'Format', 'Link', 'Maximize','TextColor', 'BGColor',
                            'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ]
                    ],
                    height: 100
                }
            }
        },
        mounted: function () {
            this.fetchTypes();
            this.fetchLanguages();
        },
        methods: {
            fetchTypes: function () {
                this.$http.get('/api/get/types/' + this.$route.params.slug).then((response) => {
                    if (response.body[0].types !== undefined) {
                        this.types = response.body[0].types;
                        this.fetchFields(this.types[0]);
                    }
                });
            },
            storeDatas: function (param, slug) {
                const formData = objectToFormData(param);
                this.isSaving = true;
                this.$http.post('/api/pages/entities/' + slug, formData).then((response) => {
                    notification.show("success", "Entity saved with success!");
                    this.form = response.body.form;
                    this.isSaving = false;
                });
            },
            fetchFields: function (param) {
                this.pageType = param;
                if (param.type == "many") {
                    this.$http.get('/api/entities/' + param.id).then((response) => {
                        this.entities = response.body;
                    });
                } else {
                    this.$http.get('/api/get/fields/' + param.id).then((response) => {
                        this.fields = response.body.fields;
                        console.log(this.fields.page_type_id);
                        this.form = response.body.form;
                    });
                }
            },
            changeLanguage: function (param) {
                this.lang = param;
            },
            revealGallery: function () {
                this.galleryOpen = true;
            },
            closeGallery: function () {
                this.galleryOpen = false;
            },
            showSuccess: function (file) {
                console.log(file);
                let slug = file.slug;
                this.form[slug] = file.files;
                console.log(this.form);
            },
            showSuccessImage: function (file) {
                let slug = file.slug;
                this.form[slug] = file.files[0];
                console.log(this.form[slug]);
            },
            deleteImage: function () {
                // this.$broadcast('deleteImage')
            },
            deleteManyEntity: function (param) {
                let vm = this;
                alert.show(function () {
                    vm.$http.delete('/api/entities/delete/' + param.id, param).then((response) => {
                        notification.show("success", "Entity deleted with success!");
                        vm.getEntities(param.type_id);
                    });
                });
            },
            getEntities: function (param) {
                this.$http.get('/api/entities/' + param).then((response) => {
                    this.entities = response.body;
                });
            },
            fetchLanguages: function () {
                this.$http.get('/api/languages').then((response) => {
                    this.languages = response.body;
                });
            },
            isImage: function (param) {
                let file = param.split(".").pop();
                if (file.match(/^(jpg|jpeg|gif|png|svg)$/)) {
                    return true;
                } else {
                    return false;
                }
            },
            reorder ({oldIndex, newIndex}) {
                const movedItem = this.entities.splice(oldIndex, 1)[0]
                this.entities.splice(newIndex, 0, movedItem)
                this.$http.post('/api/reorder/entities/' + this.pageType.id, {'entities': this.entities}).then((response) => {
                    console.log(response);
                })
            }
        }
    }
</script>

<template src="./templates/modules.html">

</template>