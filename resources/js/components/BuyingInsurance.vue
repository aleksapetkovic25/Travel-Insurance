<template>
    <div class="">
        <div class="hero">
            <div class="hero-overlay px-3 py-5">
                
                <div class="col-sm-6">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="Type isurance">Type Insurance</label>
                            <select class="form-control" v-model="form.type">
                                <option value="0">Individually</option>
                                <option value="1">Group</option>
                            </select>
                            <div class="error-container">
                                <p class="error-msg" v-show="errors.type || errorsBack['type']">{{errors.type}} {{errorsBack.type}}</p>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-6">
                            <div class="start-date">
                                <label>Start Date</label>
                                <Datepicker v-model="form.startDate" autoApply :enableTimePicker="false" :minDate="new Date()" :maxDate="form.endDate"/>
                                <div class="error-container">
                                    <p class="error-msg" v-show="errors.startDate || errorsBack['startDate']">{{errors.startDate}} {{errorsBack.startDate}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <div class="end-date">
                                <label>End Date</label>
                                <Datepicker v-model="form.endDate" autoApply :enableTimePicker="false" :minDate="form.startDate"/>
                                <div class="error-container">
                                    <p class="error-msg" v-show="errors.endDate || errorsBack['endDate']">{{errors.endDate}} {{errorsBack.endDate}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" v-model="form.name" placeholder="Name...">
                            <div class="error-container">
                                <p class="error-msg" v-show="errors.name || errorsBack['carrier.name']">{{errors.name}} {{errorsBack['carrier.name']}}</p>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" v-model="form.lastname" placeholder="Lastname...">
                            <div class="error-container">
                                <p class="error-msg" v-show="errors.lastname || errorsBack['carrier.name']">{{errors.lastname}} {{errorsBack['carrier.lastname']}}</p>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="number">Phone number</label>
                            <input type="text" class="form-control" v-model="form.number" id="number" placeholder="Number...">
                            <div class="error-container">
                                <p class="error-msg" v-show="errors.number || errorsBack['carrier.number']">{{errors.number}} {{errorsBack['carrier.number']}}</p>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                             <label>Date of Birth</label>
                            <Datepicker v-model="form.dateOfBirth" autoApply :enableTimePicker="false" :maxDate="new Date()" placeholder="Date of Birth"/>
                            <div class="error-container">
                                <p class="error-msg" v-show="errors.dateOfBirth || errorsBack['carrier.dateOfBirth']">{{errors.dateOfBirth}} {{errorsBack.dateOfBirth}}</p>
                            </div>
                        </div>
                    </div> 

                    <div class="row" v-if="form.type==='1'">
                        <div class="col-12 py-20">
                            <h3>Other partiipants</h3>
                        </div>
                        
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="name-participant">Name</label>
                            <input type="text" class="form-control" id="name-participant" aria-describedby="emailHelp" v-model="otherParticipants.name" placeholder="Name...">
                            <div class="error-container">
                                <p class="error-msg" v-show="errorOther.partName || errorsBack['carrier.name']">{{errorOther.partName}} {{errorsBack['carrier.name']}}</p>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="lastname-participant">Last Name</label>
                            <input type="text" class="form-control" id="lastname-participant" v-model="otherParticipants.lastname" placeholder="Lastname...">
                            <div class="error-container">
                                <p class="error-msg" v-show="errorOther.partLastname || errorsBack['carrier.name']">{{errorOther.partLastname}} {{errorsBack['carrier.lastname']}}</p>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label>Date of Birth</label>
                            <Datepicker v-model="otherParticipants.dateOfBirth" autoApply :enableTimePicker="false" :maxDate="new Date()" placeholder="Date of Birth"/>
                            <div class="error-container">
                                <p class="error-msg" v-show="errorOther.partDateOfBirth || errorsBack['carrier.dateOfBirth']">{{errorOther.partDateOfBirth}} {{errorsBack.dateOfBirth}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button v-if="form.type==='1'" @click="addParticipant" class="btn btn-secondary">Add Participant</button>
                            <button @click="addInsurance" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div><!-- end hero -->
        </div>
            
        <div class="container-fluid">
            <div class="row" v-if="form.type === '1'">
                <div class="col-12">
                    <table class="table m-auto">
                        <caption>List of participanta</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(usr, index) in participants" :key="index">
                                <th scope="row">{{index+1}}</th>
                                <td>{{usr.name}}</td>
                                <td>{{usr.lastname}}</td>
                                <td>{{usr.dateOfBirth}}</td>
                                <td>
                                    <button @click="deleteParticipant(index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row px-5  mx-0">
            <div class="col-12 col-md-6 col-lg-3 py-5 post" v-for="post in posts" :key="post.id">
                <a :href="'/posts/'+post.id">
                    <div class="img">
                        <img class="w-100" :src="'/images/'+post.image" :alt="post.name">
                    </div>
                    <div class="col-12">
                        <h4 class="mt-3">{{post.title}}</h4>
                    </div>
                    <div class="short-desc">
                        <p>{{post.short_description}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import { ref } from 'vue';
    import Datepicker from '@vuepic/vue-datepicker';
    import '@vuepic/vue-datepicker/dist/main.css';
    import Hero from './Hero.vue';

export default {
    components:{
        Datepicker,
        Hero
    },
    props:['posts'],
    data(){
        return{
            num: 0,
            form:{
                name: '',
                lastname: '',
                type: 0,
                number: '',
                dateOfBirth: null,
                startDate: null,
                endDate: null,
            },
            errors:{
                name: false,
                lastname: false,
                type: false,
                number: false,
                startDate: false,
                endDate: false,
                dateOfBirth: false,
                partName: false,
                partLastname: false,
                partDateOfBirth: false
            },
            otherParticipants:{
                name: '',
                lastname: '',
                dateOfBirth: null
            },
            errorOther:{
                partName: false,
                partLastname: false,
                partDateOfBirth: false
            },
            errorsBack:{},
            validation: true,
            validationOther: true,
            participants: [],
        }
    },
    mounted(){
        console.log('propss',this.posts)
    },
    methods:{
        toastPopUp(title){
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            });

            Toast.fire({
                icon: 'success',
                title: title
            });
        },
        checkValidatoin(){
            this.errorsBack = {};
            this.validation = true;
            const phoneRegex = /^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;

            this.errors.name = false;
            this.errors.lastname = false;
            this.errors.type = false;
            this.errors.number = false;
            this.errors.dateOfBirth = false;
            this.errors.startDate = false;
            this.errors.endDate = false;
            

            if(this.form.name == null || this.form.name.trim().length === 0){
                this.errors.name = "This field can't be empty";
            }
            if(this.form.lastname == null || this.form.lastname.trim().length === 0){
                this.errors.lastname = "This field can't be empty";
            }
            if(this.form.type == null || this.form.type.length === 0){
                this.errors.type = "This field can't be empty";
            }else if(this.form.type !== '0' && this.form.type !== '1'){
                this.errors.type = "Not the correct type";
            }
            if(this.form.number == null || this.form.number.trim().length === 0){
                this.errors.number = "This field can't be empty";
            }else if(!this.form.number.match(phoneRegex)){
                this.errors.number = "Invalid format. You must enter in number format.";
            }
            if(this.form.startDate == null){
                this.errors.startDate = "You must select a start date";
            }
            if(this.form.endDate == null){
                this.errors.endDate = "You must select an end date";
            }
            if(this.form.dateOfBirth == null){
                this.errors.dateOfBirth = "You must select a date of birth";
            }

            for(let item in this.errors){
                if(this.errors[item] != false){
                    this.validation = false;
                    return
                }
            }
        },
        formatDate(date){
            let d = new Date(date);
            let day = d.getDate();
            let month = d.getMonth()+1;
            let year = d.getFullYear();
            return `${year}/${month}/${day}`;
        },
        addInsurance(){
            this.checkValidatoin();
            if(this.validation === false && this.participants.length <= 0){
                return;
            }

            if(this.form.type === '0'){
                this.participants = [];
            }

            this.participants.push({
                name: this.form.name,
                lastname: this.form.lastname,
                number: this.form.number,
                dateOfBirth: this.form.dateOfBirth
            });
            
    
            axios.post('/api/add/insurance', {
                participants: this.participants,
                type: this.form.type,
                startDate: this.form.startDate,
                endDate: this.form.endDate,
                nameCarrier: this.form.name,
                lastnameCarrier: this.form.lastname,
                dateOfBirthCarrier: this.form.dateOfBirth,
                numberCarrier: this.form.number
            }).then((res)=> {
                console.log(res)
                if(res.status === 200){
                    this.toastPopUp('Successfully ordered insurance.');
                    setTimeout(() => {
                        this.form.type = 0;
                        this.form.name = '';
                        this.form.lastname = '';
                        this.form.number = '';
                        this.form.dateOfBirth = null;
                        this.form.startDate = null;
                        this.form.endDate = null;
                        this.participants = [];
                    }, 500);
                }
            }).catch((error)=> {
                if(error.response.status === 422){
                    this.errorsBack = error.response.data.errors;
                }
                else{
                    console.log(error);
                }
            });
        },
        addParticipant(){
            this.errorOther.partName = false;
            this.errorOther.partLastname = false;
            this.errorOther.partDateOfBirth = false;

            if(this.otherParticipants.name == null || this.otherParticipants.name.trim().length === 0){
                this.errorOther.partName = "This field can't be empty";
            }
            if(this.otherParticipants.lastname == null || this.otherParticipants.lastname.trim().length === 0){
                this.errorOther.partLastname = "This field can't be empty";
            }
            if(this.otherParticipants.dateOfBirth == null){
                this.errorOther.partDateOfBirth = "You must select a date of birth";
            }
            
            
            for(let item in this.errorOther){
                if(this.errorOther[item] != false){
                    this.validationOther = false;
                    return
                }
            }

            if(this.validationOther === false){
                return;
            }
            
            this.toastPopUp('Successfully adding participants');

            this.participants.push({
                name: this.otherParticipants.name,
                lastname: this.otherParticipants.lastname,
                dateOfBirth: this.otherParticipants.dateOfBirth
            });
            this.otherParticipants.name = '';
            this.otherParticipants.lastname = '';
            this.otherParticipants.dateOfBirth = null;
        },
        deleteParticipant(usr){
            this.$swal({
                title: 'Are you sure?',
                text: "Do you want to delete this participant!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((res) => {
                if(res.isConfirmed){
                    this.participants.splice(usr,1);
                }
            });
        }
    }
}
</script>

<style scoped>
/* 
#5b4a3b - tamna braon
#bcd8e2 - svetlo plava
#08536c - tamno plave
#c36b51 - narandzsasta
#d7e0df - pesak

 */
.hero{
    background: url("../../../public/assets/hero.avif") center center / cover;
    min-height: 100vh;
}
.hero-overlay{
    width: 100%;
    min-height: 100vh;
    background-color: #5b4a3b4f;
}
.form-btn{
    margin: 50px auto 0;
    width: 1170px;
}
.error-container{
    height: 20px;
}
.error-msg{
    color: red;
}
.btn-secondary{
    margin-right: 20px;
}
.wrapper{
    /* width: 1270px; */
    max-width: 90%;
    margin: 0 auto;
}
.participants{
    margin-top: 50px;
}
.img img{
    width: 100%;
    height: 250px;
    object-fit: cover;
}
.post{
    color: black;
    text-align: center;
}
.post .short-desc{
    height: 50px;
    overflow: hidden;
}
.post a{
    display: block;
    color: #5b4a3b;
    text-decoration: none;
    transition: 1s all ease;
}
.post a:hover{
    text-decoration: none;
    transform: scale(0.95);
    color: #08536c;
}
</style>