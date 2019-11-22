<template>

       <div class="row flex-row flex-wrap">
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
    </div>

</template>

<style>
    
</style>

<script>
    export default {
        name: "Homepage",
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
