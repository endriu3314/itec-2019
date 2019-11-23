<template>
    <div class="row">
        <div class="col-md-6">
            <h3 class="font-weight-bold">Create Category</h3>
            <hr/>
            <form id="new-category">
                <div class="form-group">
                    <label for="category-name">Category Name</label>
                    <input type="text" class="form-control" name="category-name" id="category-name"
                           placeholder="Enter category name">
                </div>
                <!--<input name="user_id" type="hidden" :value="userData.id"/>-->
                <a class="btn btn-primary mt-2" v-on:click="createCategory()">Create</a>
            </form>
        </div>
        <div class="col-md-6">
            <h3 class="font-weight-bold">Create Sub-Category</h3>
            <hr/>
            <form id="new-sub-category">
                <div class="row">
                    <div class="col-md-3">
                        <label for="category-select">Category select</label>
                        <select class="form-control" name="category-select" id="category-select">
                            <!--<option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>-->
                            <option v-for="item in categoryData" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="sub-category-name">Sub-Category Name</label>
                        <input type="text" class="form-control" name="sub-category-name" id="sub-category-name"
                               placeholder="Enter sub-category name">
                    </div>
                </div>
                <!--<input name="user_id" type="hidden" :value="userData.id"/>-->
                <a class="btn btn-primary mt-2" v-on:click="createSubCategory()">Create</a>
            </form>
        </div>
    </div>
</template>

<script>
    import {categoryEventService} from "../app";

    export default {
        name: "AdminAddCategory",
        props: ['categoryRoute', 'subCategoryRoute', 'getData'],
        data: () => {
            return {
                categoryData: {},
            }
        },
        methods: {
            createCategory: function() {
                const formData = $('#new-category').serializeArray();
                console.log(formData);

                axios.post(`${this.categoryRoute}`, {
                    name: formData[0].value
                }).then((response) => {
                    categoryEventService.$emit('categoryCreated', response.data)
                });

                window.location.reload();
            },
            createSubCategory: function() {
                const formData = $('#new-sub-category').serializeArray();
                console.log(formData);

                axios.post(`${this.subCategoryRoute}`, {
                    categoryid: formData[0].value,
                    name: formData[1].value
                }).then((response) => {
                    categoryEventService.$emit('categoryCreated', response.data)
                });

                //window.location.reload();
            }
        },
        mounted() {
            axios.get(`${this.getData}`).then((response) => {
                this.categoryData = response.data;
            });
        }
    }
</script>

<style scoped>

</style>