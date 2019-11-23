<template>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-plus"></i> Creaza Produs
        </div>
        <div class="card-body">
            <form id="new-product">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="product-name">Product Name</label>
                        <input type="text" class="form-control" name="product-name" id="product-name" placeholder="Enter product name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product-img">Product Image (url)</label>
                        <input type="text" class="form-control" name="product-img" id="product-img" placeholder="Enter product image link">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="product-details">Product Details</label>
                        <textarea class="form-control" name="product-details" id="product-details" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="category-select">Category select</label>
                        <select v-model="selected" option="1" class="form-control" name="category-select" id="category-select">
                            <!--<option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>-->
                            <option v-for="item in categoryData" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="category-select">Category select</label>
                        <select class="form-control" name="subcategory-select" id="subcategory-select">
                            <!--<option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>-->
                            <option v-for="item in subCategoryData" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="product-stock">Product Stock</label>
                        <input type="number" class="form-control" name="product-stock" id="product-stock" placeholder="Enter product stocks">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product-price">Product Price</label>
                        <input type="number" class="form-control" name="product-price" id="product-price" placeholder="Enter product price">
                    </div>
                </div>
                <input name="user_id" type="hidden" :value="userData.id"/>
                <a class="btn btn-primary mt-2" v-on:click="create()">Submit</a>
            </form>
        </div>
    </div>
</template>

<script>
    import {productEventService} from "../app";

    export default {
        name: "VanzatorCreate",
        props: ['route', 'userDataUrl', 'categoryUrl' , 'subCategoryUrl'],
        methods: {
            create: function () {
                const formData = $('#new-product').serializeArray();

                console.log(formData);

                axios.post(`${this.route}`, {
                    name: formData[0].value,
                    img_url: formData[1].value,
                    details: formData[2].value,
                    category: formData[3].value,
                    subcategory: formData[4].value,
                    stock: formData[5].value,
                    price: formData[6].value,
                    user_id: formData[7].value,
                }).then((response) => {
                    productEventService.$emit('productCreated', response.data);
                });

                //window.location.reload();
            },
        },
        data: () => {
            return {
                userData: {},
                csrf: $('meta[name="csrf-token"]').attr('content'),
                categoryData: {},
                subCategoryData: {},
                selected: null,
            }
        },
        mounted() {
            axios.get(`${this.userDataUrl}`).then((response) => {
                this.userData = response.data;
            });
            axios.get(`${this.categoryUrl}`).then((response) => {
                this.categoryData = response.data;
            });
            axios.get(`${this.subCategoryUrl}`).then((response) => {
                this.subCategoryData = response.data;
            });
        },
        computed: {
            subList: function(){
                return this.subCategoryData.filter((item) => item.id == this.select);
            },
        }
    }
</script>

<style scoped>

</style>