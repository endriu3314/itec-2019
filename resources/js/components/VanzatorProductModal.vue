<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{item.name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-product">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="product-name">Product Name</label>
                                <input type="text" class="form-control" name="product-name" id="product-name" :value="item.name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product-img">Product Image (url)</label>
                                <input type="text" class="form-control" name="product-img" id="product-img" :value="item.image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product-details">Product Details</label>
                            <textarea class="form-control" name="product-details" id="product-details" rows="3">{{item.description}}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="product-stock">Product Stock</label>
                                <input type="number" class="form-control" name="product-stock" id="product-stock" :value="item.stock">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product-price">Product Price</label>
                                <input type="number" class="form-control" name="product-price" id="product-price" :value="item.price">
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
</template>

<script>
    export default {
        name: "VanzatorProductModal",
        props: ['item'],
    }
</script>

<style scoped>

</style>