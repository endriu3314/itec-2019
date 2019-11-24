<template>
    <div class="card">
        <div class="card-header ">
            Payment History
        </div>
        <div class="card-body">
    <table class="table table-responsive w-100 d-block d-md-table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Amount</th>
            <th>Products</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in paymentData">
            <td> {{item.id}} </td>
            <td> {{item.amount}} RON</td>
            <td> {{item.products}} </td>
            <td> {{item.created_at}} </td>
        </tr>
        </tbody>
    </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PaymentsTable",
        props: ['route'],
        data: () => {
            return {
                paymentData: {}
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.paymentData = response.data;
            });
        }
    }
</script>

<style scoped>

</style>