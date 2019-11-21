<template>
    <div class="card">
        <div class="card-body row">
            <div class="col-md-3">
                <img :src="userData.avatar" class="img-fluid" v-if="userData.avatar != null">
            </div>
            <div class="col-md-9">
                <h5 class="card-title text-center">{{ userData.name }}</h5>
                <hr/>
                <a :href="'mailto:'+userData.email" class=""><i class="fas fa-envelope"></i> {{userData.email}}</a>
                <p>Member since {{userData.created_at}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {userEventService} from "../app";

    export default {
        name: "UserProfile",
        props: ['route', 'user-id'],
        data: () => {
            return {
                userData: {}
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.userData = response.data;
            });
        },
    }
</script>

<style scoped>

</style>
