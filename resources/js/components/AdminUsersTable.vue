<template>
    <div class="card mt-2">
        <div class="card-header">
            <i class="fas fa-table"></i> Users Table
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive">
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
                            <div class="col m-0">
                                <form id="role">
                                    <input type="hidden" name="id" :value="item.id"/>
                                    <div v-if="" class="btn btn-secondary" href="#" v-on:click="update()">Vanzator</div>
                                </form>
                            </div>
                            <div class="col m-0">
                                <form id="role2">
                                    <input type="hidden" name="id" :value="item.id"/>
                                    <div v-if="" class="btn btn-danger" href="#" v-on:click="update2()">AnuleazaVanzator
                                    </div>
                                </form>
                                <!--<a class="btn btn-secondary" href="#">Button</a>-->
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
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
            update() {
                const formData = $('#role').serializeArray();

                axios.post(`${this.roleUpdateUrl}`, {
                    id: formData[0],
                }).then((response) => {
                    adminEventService.$emit('userUpdated', response.data);
                });

                console.log(formData);
            },
            update2() {
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
