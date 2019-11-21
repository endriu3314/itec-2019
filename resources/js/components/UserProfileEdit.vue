<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">Edit Profile</h5>
            <hr/>

            <form id="user-edit" @submit.prevent="update">
                <div class="form-group">
                    <label class="" for="username">Name</label>
                    <input class="form-control" type="text" name="username" id="username" :value="userData.name">
                </div>
                <div class="form-group">
                    <label class="" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" :value="userData.email">
                </div>
                <div class="form-group">
                    <label class="" for="avatar">Profile image (url)</label>
                    <input class="form-control" type="text" name="avatar" id="avatar"
                           :value="userData.avatar">
                </div>
                <input type="hidden" name="id" :value="userData.id">
                <input type="hidden" name="_token" :value="csrf">
                <div class="btn btn-primary" v-on:click="update()"><span>Update</span></div>
            </form>

        </div>
    </div>
</template>

<script>
    import {userEventService} from "../app";

    export default {
        name: "UserProfileEdit",
        props: ['userDataUrl', 'userUpdateUrl'],
        methods: {
            update: function () {
                const formData = $('#user-edit').serializeArray();

                axios.post(`${this.userUpdateUrl}`, {
                    name: formData[0].value,
                    email: formData[1].value,
                    avatar: formData[2].value,
                    id: formData[3].value,
                }).then((response) => {
                    userEventService.$emit('userUpdated', response.data);
                });

                window.location.reload();
            },
        },
        data: () => {
            return {
                userData: {},
                csrf: $('meta[name="csrf-token"]').attr('content')
            }
        },
        mounted() {
            axios.get(`${this.userDataUrl}`).then((response) => {
                this.userData = response.data;
            });
        },
    }
</script>

<style scoped>

</style>
