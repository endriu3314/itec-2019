<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">OAuth Provider</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="item in usersData">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.provider }}</td>
                <td>
                    <div class="row">
                        <div class="col">
                            <form id="role">
                                <input type="hidden" name="id" :value="item.id" />
                                <div v-if=""class="btn btn-secondary" href="#" v-on:click="update()">Vanzator</div>
                            </form>
                        </div>
                        <div class="col">
                            <form id="role2">
                                <input type="hidden" name="id" :value="item.id" />
                                <div v-if=""class="btn btn-danger" href="#" v-on:click="update2()">Anuleaza Vanzator</div>
                            </form>
                            <!--<a class="btn btn-secondary" href="#">Button</a>-->
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    import {adminEventService} from "../app";

    export default {
        name: "UserProfile",
        props: ['route', 'roleUpdateUrl', 'roleDeleteUrl'],
        data: () => {
            return {
                usersData: {},
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.usersData = response.data;
            });
        },
        methods: {
            update(){
                const formData = $('#role').serializeArray();

                axios.post(`${this.roleUpdateUrl}`, {
                    id: formData[0],
                }).then((response) => {
                    adminEventService.$emit('userUpdated', response.data);
                });

                console.log(formData);
            },
            update2(){
                const formData = $('#role2').serializeArray();

                axios.post(`${this.roleDeleteUrl}`, {
                    id: formData[0],
                }).then((response) => {
                    adminEventService.$emit('userUpdated', response.data);
                });

                console.log(formData);
            },
        },
    }
</script>

<style scoped>

</style>
