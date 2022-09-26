<template>
    <div>
        <div class="container-fluid my-5">
            <h1 class="pb-5">List Insurances</h1>
            <div class="table-responsive px-2">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Type</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="insurance-area" v-for="insurance in insurances" :key="insurance.id">
                            <th scope="col">{{insurance.insurance_id}}</th>
                            <th scope="col">{{insurance.usr_name}}</th>
                            <th scope="col">{{insurance.usr_lastname}}</th>
                            <th scope="col">{{insurance.phone}}</th>
                            <th scope="col">{{insurance.date_birth}}</th>
                            <th v-if="insurance.type === 0" scope="col">Individually</th>
                            <th v-if="insurance.type === 1" scope="col">Group</th>
                            <th scope="col">{{insurance.start_date}}</th>
                            <th scope="col">{{insurance.end_date}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['insurances']
}
</script>

<style scoped>

h1{
    text-align: center;
    color: #5b4a3b;
}
.wrapper .table{
    margin-top: 50px;
}
.insurance-area{
    color: #08536c;
}
</style>