<template>
    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in subCategoryData">
            <td>{{ item.id }}</td>
            <td>{{ item.categoryName }}</td>
            <td>{{ item.name }}</td>
            <td>
                <div class="row">
                    <div class="col m-0">
                        <form id="subcategory-edit">
                            <input type="hidden" name="id"/>
                            <div v-if="" class="btn btn-secondary" href="#">Edit</div>
                        </form>
                    </div>
                    <div class="col m-0">
                        <a class="btn btn-danger" href="#">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "AdminSubCategoryTable",
        props: ['route', 'routeCategoryName'],
        data:() => {
            return {
                subCategoryData: {},
                categData: {},
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.subCategoryData = response.data;
            });
        },
        methods: {
            categoryName: function(scid){
                axios.get(`${this.routeCategoryName()}`).then((response) => {
                    this.categData = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>