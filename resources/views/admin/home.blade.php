@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list-ul"></i> Adauga Categorie
        </div>
        <div class="card-body">
            <admin-add-category get-data="{{route('api-getcategories')}}" category-route="{{route('admin.create-category')}}" sub-category-route="{{route('admin.create-sub-category')}}"></admin-add-category>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="font-weight-bold">Category Table</h3>
                    <admin-category-table route="{{route('api-getcategories')}}"></admin-category-table>
                </div>
                <div class="col-md-6">
                    <h3 class="font-weight-bold">Sub Category Table</h3>
                    <admin-sub-category-table route="{{route('api-getsubcategoriesnames')}}"></admin-sub-category-table>
                </div>
            </div>
        </div>
    </div>
    <admin-users-table route="{{route('api-users')}}" role-update-url="{{route('admin.make-vanzator')}}" role-delete-url="{{route('admin.delete-vanzator')}}"></admin-users-table>
@endsection
<script>
    import AdminUserSearch from "../../js/components/AdminUserSearch";
    export default {
        components: {AdminUserSearch}
    }
</script>
<script>
    import AdminAddCategory from "../../js/components/AdminAddCategory";
    export default {
        components: {AdminAddCategory}
    }
</script>
<script>
    import AdminCategoryTable from "../../js/components/AdminCategoryTable";
    export default {
        components: {AdminCategoryTable}
    }
</script>
<script>
    import AdminSubCategoryTable from "../../js/components/AdminSubCategoryTable";
    export default {
        components: {AdminSubCategoryTable}
    }
</script>