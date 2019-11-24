@extends('layouts.app')
@section('content')
    <div class="row flex-row flex-wrap">
        <div class="col-6">
            <user-profile route="{{route('api-userdata', Auth::user()->id)}}"></user-profile>
        </div>
        <div class="col-6">
            <user-profile-edit user-data-url="{{route('api-userdata', Auth::user()->id)}}"
                               user-update-url="{{route('update-user')}}">
            </user-profile-edit>
        </div>
        <div class="col-12 mt-4">
            <payments-table route="{{route('api-payments', Auth::user()->id)}}"></payments-table>
        </div>
    </div>
@endsection
<script>

</script>
<script>
    import PaymentsTable from "../../js/components/PaymentsTable";
    export default {
        components: {PaymentsTable}
    }
</script>