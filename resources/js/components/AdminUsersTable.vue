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
                            <a v-if=""class="btn btn-danger" href="#">Button</a>
                            <a class="btn btn-secondary" href="#">Button</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "UserProfile",
        props: ['route'],
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
    }
</script>

<style scoped>

</style>
