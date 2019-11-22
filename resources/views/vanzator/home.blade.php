@extends('layouts.app')

@section('content')
    <vanzator-create route="{{route('vanzator.create')}}" user-data-url="{{route('api-userdata', Auth::user()->id)}}"></vanzator-create>
@endsection
<script>
</script>
<script>
    import VanzatorCreate from "../../js/components/VanzatorCreate";
    export default {
        components: {VanzatorCreate}
    }
</script>