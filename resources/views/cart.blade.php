@extends('layouts.app')


@section('content2')
    <div class="card">
        <div class="card-header">
            <h3 class="font-weight-bold">Products</h3>
        </div>
        <div class="card-body">
    <table id="cart" class="table table-light table-striped table-responsive-sm">
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
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
                <td data-th="Price">{{ $details['price'] }} RON</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control" value="{{ $details['quantity'] }}"/>
                </td>
                <td data-th="Subtotal">{{ $details['price'] * $details['quantity'] }} RON</td>
                <td>
                    <button class="btn btn-info update-cart" data-id="{{ $id }}"><i
                                class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger remove-from-cart" data-id="{{ $id }}"><i
                                class="fa fa-trash-o"></i></button>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
            <a class="font-weight-bold">Total {{ $total }} RON</a>
        </div>
        <div class="card-footer">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a href="{{url('/payment')}}" class="btn btn-primary float-right">Place Order</a>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);

            if (confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
