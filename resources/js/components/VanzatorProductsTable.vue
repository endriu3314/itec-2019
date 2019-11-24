<template>
    <div class="card mt-4">
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-product">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="product-name">Product Name</label>
                                    <input type="text" class="form-control" name="product-name" id="product-name" :value="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product-img">Product Image (url)</label>
                                    <input type="text" class="form-control" name="product-img" id="product-img" :value="img_url">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-details">Product Details</label>
                                <textarea class="form-control" name="product-details" id="product-details" rows="3">{{description}}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="product-stock">Product Stock</label>
                                    <input type="number" class="form-control" name="product-stock" id="product-stock" :value="stock">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product-price">Product Price</label>
                                    <input type="number" class="form-control" name="product-price" id="product-price" :value="price">
                                </div>
                            </div>
                            <input name="product-id" type="hidden" :value="id"/>
                            <input name="user_id" type="hidden" :value="this.userId"/>
                            <a class="btn btn-primary mt-2" v-on:click="update()">Submit</a>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <i class="fas fa-edit"></i> Edit
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="product in productsData">
                        <td>{{product.id}}</td>
                        <td>{{product.name}}</td>
                        <td>{{product.details}}</td>
                        <td><img :src="product.img_url" class="img-thumbnail" style="max-height: 50px"></td>
                        <td>{{product.stock}}</td>
                        <td>{{product.price}}</td>
                        <td>
                            <a class="btn btn-secondary" @click="productClicked(product)">Edit</a>
                            <a class="btn btn-danger" @click="deleteProduct(product.id)">Delete</a>
                        </td>
                        <!--<vanzator-product-modal :product="product"></vanzator-product-modal>-->

                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</template>

<script>
    import {productEventService} from "../app";

    export default {
        name: "VanzatorProductsTable",
        props: ['productData', 'updateUrl', 'deleteUrl', 'user-id'],
        data:() => {
            return {
                id: '',
                name: '',
                description: '',
                img_url: '',
                stock: '',
                price: '',
                result: '',
                productsData: {},
                csrf: $('meta[name="csrf-token"]').attr('content')
            }
        },
        mounted() {
            axios.get(`${this.productData}`).then((response) => {
                this.productsData = response.data;
            });
        },
        methods:{
            productClicked: function(product) {
                this.id = product.id;
                this.name = product.name;
                this.description = product.details;
                this.img_url = product.img_url;
                this.stock = product.stock;
                this.price = product.price;
                $("#modal").modal('show');
            },

            update: function () {
                const formData = $('#edit-product').serializeArray();

                axios.post(`${this.updateUrl}`, {
                    pname : formData[0].value,
                    pdetails : formData[2].value,
                    pimg_url : formData[1].value,
                    pstock : formData[3].value,
                    pprice : formData[4].value,
                    pid : formData[5].value,
                    puserid : formData[6].value,
                }).then((response) => {
                    productEventService.$emit('productUpdated', response.data);
                });

                console.log(formData);
            },

            deleteProduct: function(pid){
                console.log(pid);

                //axios.delete('api/products/', {params: {'id': this.id});

                axios.delete('/api/products/' + pid)
                    .then(response => {
                        this.result = response.data;
                    });
                console.log(this.result);
            }
        }
    }
</script>

<style scoped>

</style>