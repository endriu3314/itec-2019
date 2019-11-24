@extends('layouts.app')

@section('content')
    <homepage route="{{route('api-allproducts')}}" categories="{{route('api-getcategories')}}"></homepage>
        {{--<div class="row">
            <div class="container-fluid text-md-right">
                <div class="bg-light d-inline-flex p-2 rounded">
                    <a class="btn btn-outline-primary mx-2"><i class="fas fa-th"></i> Grid View</a>
                    <a class="btn btn-outline-primary mx-2"><i class="fas fa-bars"></i> Column View</a>
                    <a class="btn btn-outline-primary mx-2"><i class="fas fa-map-marked-alt"></i> Map View</a>
                </div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-weight-bold text-center">Filters</h3>
                        <hr/>
                        asd
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">

                    @foreach($products as $product)
                        <div class="col-md-4 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ $product->img_url }}" height="100" class="img-fluid align-content-center">
                                    <div class="text-center">
                                        <h4 class="font-weight-bold">{{ $product->name }}</h4>
                                        <hr/>
                                        <p>{{ \Illuminate\Support\Str::limit($product->details, 40) }}</p>
                                        <p><strong>Price: </strong> {{ $product->price }}$</p>
                                        @if($product->stock > 0)
                                            <a class="btn btn-primary" href="{{ url('add-to-cart/'.$product->id) }}" role="button">Add to cart</a>
                                        @else
                                            <a class="btn btn-primary disabled"role="button">Add to cart</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>--}}
@endsection
<script>
    import Homepage from "../js/components/Homepage";
    export default {
        components: {Homepage}
    }
</script>