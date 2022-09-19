<template>
    <div>
        <div class="wrapper">
            <h1>List Insurances</h1>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Insurance ID</th>
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
</template>

<script>
export default {
    data(){
        return{
            insurances: []
        }
    },
    methods:{
        getInsurances(){
            axios.get('/api/insurances').then((res)=>{
                console.log(res)
                this.insurances = res.data;
            });
        }
    },
    mounted(){
        this.getInsurances();
    }
}
</script>

<style scoped>
.wrapper{
    max-width: 1270px;
    padding-top: 150px;
    margin: 0 auto;
}
.wrapper h1{
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