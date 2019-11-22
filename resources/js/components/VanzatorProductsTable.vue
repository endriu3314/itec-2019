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
                            <!--<input name="user_id" type="hidden" :value="userData.id"/>
                            <a class="btn btn-primary mt-2" v-on:click="create()">Submit</a>-->
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
                        <td>{{product.image}}</td>
                        <td>{{product.stock}}</td>
                        <td>{{product.price}}</td>
                        <td><a class="btn btn-secondary" @click="productClicked(product)">Edit</a></td>
                        <!--<vanzator-product-modal :product="product"></vanzator-product-modal>-->

                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</template>

<script>
    import VanzatorProductModal from "./VanzatorProductModal";

    export default {
        name: "VanzatorProductsTable",
        props: ['productData', 'updateUrl', 'user-id'],
        components: {
            VanzatorProductModal
        },

        data:() => {
            return {
                name: '',
                description: '',
                img_url: '',
                stock: '',
                price: '',
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
                this.name = product.name;
                this.description = product.details;
                this.img_url = product.img_url;
                this.stock = product.stock;
                this.price = product.price;
                $("#modal").modal('show');
            }
        }
    }
</script>

<style scoped>

</style>