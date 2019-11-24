<template>
    <div class="">
        <div class="row" >
            <div class="container-fluid text-md-right">
                <div class="bg-light d-inline-flex p-2 rounded">
                    <a v-bind:class="{ 'active': view == 'grid'}" v-on:click="view = 'grid'" class="btn btn-outline-primary mx-2"><i class="fas fa-th"></i> Grid View</a>
                    <a v-bind:class="{ 'active': view == 'column'}" v-on:click="view = 'column'" class="btn btn-outline-primary mx-2"><i class="fas fa-bars"></i> Column View</a>
                    <a v-bind:class="{ 'active': view == 'map'}" v-on:click="view = 'map'" class="btn btn-outline-primary mx-2"><i class="fas fa-bars"></i> Map View</a>
                </div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-weight-bold text-center">Filters</h3>
                        <hr/>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" v-model="keyword">
                        </div>
                        <hr/>
                        <div id="accordion">
                            <div class="">
                                <div class="" id="headingOne">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Categories <i class="fas fa-chevron-down"></i>
                                    </a>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="">
                                        <div v-for="item in categoryData">
                                            <input type="checkbox" v-model="category" :value="item.id"/> {{item.name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div id="headingTwo">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Subcategories <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row" v-if="view == 'grid'">
                    <div class="col-md-4 mt-4" v-for="(product, index) in computedProducts" :key="index">
                        <div class="card">
                            <div class="card-body">
                                <img :src="product[1].img_url" height="100" class="mx-auto d-block">
                                <div class="text-center">
                                    <h4 class="font-weight-bold">{{ product[1].name }}</h4>
                                    <hr/>
                                    <p v-if="product[1].details.length > 44">{{ product[1].details.substring(0, 45) + "..." }}</p>
                                    <p v-else>{{ product[1].details }}</p>
                                    <p><strong>Price: </strong> {{ product[1].price }} RON</p>
                                    <a v-if="product[1].stock > 0" class="btn btn-primary" :href="'add-to-cart/' + product[1].id" role="button">Add to cart</a>
                                    <a v-else class="btn btn-primary disabled"role="button">Add to cart</a>
                                    <a class="btn btn-secondary text-white">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="view == 'column'">
                    <div class="w-100 mt-4" v-for="product in computedProducts">
                        <div class="card">
                            <div class="card-body">
                                <img :src="product[1].img_url" height="100" class="mx-auto d-block">
                                <div class="text-center">
                                    <h4 class="font-weight-bold">{{ product[1].name }}</h4>
                                    <hr/>
                                    <p v-if="product[1].details.length > 44">{{ product[1].details.substring(0, 45) + "..." }}</p>
                                    <p v-else>{{ product[1].details }}</p>
                                    <p><strong>Price: </strong> {{ product[1].price }} RON</p>
                                    <a v-if="product[1].stock > 0" class="btn btn-primary" :href="'add-to-cart/' + product[1].id" role="button">Add to cart</a>
                                    <a v-else class="btn btn-primary disabled"role="button">Add to cart</a>
                                    <a class="btn btn-secondary text-white disabled">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!--<div class="row flex-row flex-wrap">
        <div class="col">
            <div class="row">
                <div class="card m-1">
                       <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Categorii</strong>
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div><input type="checkbox" v-model="fac" />test1</div>
                                <div><input type="checkbox" v-model="fac" />test2</div>
                                
                            </div>
                        </div>
                    </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10">
            <a href="#"><i class="fas fa-bars fa-2x"></i></a>
            <a href="#"><i class="fas fa-grip-horizontal fa-2x"></i></a>
            <div class="row">
                <div class="card m-1 w-custom">
                    <div class="card-body custom-body">
                        <img class="rounded mx-auto avatar d-block mb-2" >
                        <h5 class="text-center font-weight-bold"></h5>
                        <hr/>
                        <h6 class="text-center font-weight-bold">a</h6>
                        <p class="mb-2 "><i class="mr-2 fas fa-envelope"></i> a</p>
                        <p class="mb-2 "><i class="mr-2 fas fa-phone"></i> a</p>
                        <p class="mb-2 "><i class="mr-2 fas fa-school"></i> a</p>
                        <p class="mb-2 "><i class="mr-2 fas fa-building"></i>a</p>
                        <a class="btn btn-primary w-100">Vezi profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

</template>
<style>
    
</style>

<script>
    export default {
        name: "Homepage",
        props: ['route', 'categories'],
        data: () => {
            return{
                products: {},
                keyword: '',
                sortBy: 'name',
                view: 'grid',
                category: [],
                categoryData: '',
            }
        },
        computed: {
            computedProducts: function () {
                //return this.userData.filter((item) => {
                return Object.entries(this.products).filter((item) => {
                    return (this.keyword.length === 0 || item[1].name.includes(this.keyword)) &&
                        (this.category.length === 0 || this.category.includes(item[1].details))
                    //(this.varsta1.length === 0 || item[1].Array.prototype.filter(varsta => item[1].varsta  > this.varsta1))
                    //(this.dep.length === 0 || item[1].name.includes(this.dep))
                }).sort((a, b) => {
                    return a.toString().localeCompare(b.toString())
                })
            }
        },
        mounted() {
            console.log('Component mounted.')

            axios.get(`${this.route}`).then((response) => {
                this.products = response.data;
            });

            axios.get(`${this.categories}`).then((response) => {
                this.categoryData = response.data;
            });
        }
    }
</script>
