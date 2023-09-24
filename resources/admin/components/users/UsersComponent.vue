<script>

	import alert from 'services/alert';
	import notification from 'services/notification';

    export default {
        data() {
            return {
                user: [],
                users: []
            }
        },
        mounted: function () {
            var vm = this;

            vm.fetchUsers();

            $('.modal').on('hidden.bs.modal', function () {
                vm.emptyArray();
            })

        },
        methods: {
            fetchUsers: function () {
                this.$http.get('api/users').then((response) => {
                    this.users = response.body;
                });
            },
            createUser: function (data) {
                var email = (data["email"] != undefined ? email = data.email : email = null);
                var password = (data["password"] != undefined ? password = data.password : password = null);


                let object = {
                    email: email,
                    password: password
                };

                let formData  = new FormData();

                for ( var key in object) {
                    formData.append(key, object[key]);
                }

                if (data.id !== undefined) {
                    this.$http.post('api/users/update/'+ data.id, formData).then((response) => {
                        notification.show("success", "Updated with success!");
                        this.finalize();
                    });
                } else {
                    this.$http.post('api/users/post', formData).then((response) => {
                        notification.show("success", "Saved with success!");
                        this.finalize();
                    });
                }
            },
            findUser: function (data) {
                this.$http.get('api/users/' + data.id).then((response) => {
                    console.log(response);
                    this.user = response.body;
                });
            },
            deleteUser: function (data) {

                let vm = this;

                alert.show(function () {
                    vm.$http.delete('api/users/delete/'+ data.id, data).then((response) => {
                        vm.fetchUsers();
                    });
                });
            },
            finalize: function () {
                this.user = [];
                this.fetchUsers();
                $('.modal').modal('hide');
            },
            emptyArray: function () {
                this.user = [];
            }
        }
    }
	
</script>

<template  src="./templates/users.html">
	
</template>