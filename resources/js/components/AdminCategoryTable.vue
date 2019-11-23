<template>
    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{  }}</td>
            <td>{{  }}</td>
            <td>
                <div class="row">
                    <div class="col m-0">
                        <form id="category-edit">
                            <input type="hidden" name="id"/>
                            <div v-if="" class="btn btn-secondary" href="#">Edit</div>
                        </form>
                    </div>
                    <div class="col m-0">
                        <a class="btn btn-danger" href="#">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "AdminCategoryTable"
    }
</script>

<style scoped>

</style>