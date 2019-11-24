@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-wallet"></i> Payment
            </div>
            <div class="card-body">
                <table id="cart" class="table table-light table-striped table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0 ?>
                    <?php $products = '' ?>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                            <?php $products .= $details['name'] . ', ' ?>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{$details['img_url']}}" width="100" class="img-fluid">
                                        </div>
                                        <div class="col-md-9">
                                            <h4>{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">$ {{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <a>{{ $details['quantity'] }}</a>
                                </td>
                                <td data-th="Subtotal">${{ $details['price'] * $details['quantity'] }}</td>
                            </tr>
                            <input type="hidden" value="{{$total}}" name="amount" id="amount" form="new-payment">
                            <input type="hidden" value="{{$products}}" name="products" id="products" form="new-payment">
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <h3 class="font-weight-bold text-right">Total ${{ $total }}</h3>
                <hr/>
                <h3 class="font-weight-bold">Card Details</h3>
                <form method="post" action="/payment" id="new-payment" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="card-number">Card Number</label>
                            <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Enter card number">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="card-ccv">Card CCV</label>
                            <input type="text" class="form-control" name="card-ccv" id="card-ccv" placeholder="Enter CCV">
                        </div>
                    </div>
                    <input name="user_id" id="user_id" type="hidden" value="{{ Auth::user()->id }}"/>
                    <button type="submit" class="btn btn-primary mt-2">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection