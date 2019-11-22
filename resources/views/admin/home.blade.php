@extends('layouts.app')

@section('content')
    <admin-users-table route="{{route('api-users')}}" role-update-url="{{route('admin.make-vanzator')}}" role-delete-url="{{route('admin.delete-vanzator')}}"></admin-users-table>
@endsection
<script>
    import AdminUserSearch from "../../js/components/AdminUserSearch";
    export default {
        components: {AdminUserSearch}
    }
</script>