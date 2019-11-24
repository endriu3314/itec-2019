@extends('layouts.app')

@section('content')
    <product getData="{{route('api-productid', $id ?? '')}}"></product>
@endsection
<script>
    import Product from "../js/components/Product";
    export default {
        components: {Product}
    }
</script>