@extends('layouts.app')

@section('content')
    <vanzator-create route="{{route('vanzator.create')}}" user-data-url="{{route('api-userdata', Auth::user()->id)}}"></vanzator-create>
    <vanzator-products-table product-data="{{route('api-productsdata', Auth::user()->id)}}" user-id="{{Auth::user()->id}}"></vanzator-products-table>
@endsection
<script>
</script>
<script>
    import VanzatorCreate from "../../js/components/VanzatorCreate";
    export default {
        components: {VanzatorCreate}
    }
</script>
<script>
    import VanzatorProductsTable from "../../js/components/VanzatorProductsTable";
    export default {
        components: {VanzatorProductsTable}
    }
</script>