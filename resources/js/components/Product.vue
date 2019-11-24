<template>
    <div class="card">
        <div class="card-header">
            {{data.name}}
        </div>
        <div class="card-body">

        </div>
    </div>
</template>

<script>
    export default {
        name: "Product",
        props: ['getData'],
        data: () => {
            return {
                Data: {},
            }
        },
        mounted() {
            axios.get(`${this.getData}`).then((response) => {
                this.Data = response.data;
            });
        }
    }
</script>

<style scoped>

</style>