require('./bootstrap');

import { createApp } from 'vue';
import MainApp from './MainApp.vue';

import Datapicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

import Hello from './components/Hello';
import BuyingInsurance from './components/BuyingInsurance';
import Header from './components/Header';
import Admin from './admin/Admin';
import AdminInsurance from './admin/AdminInsurance.vue';
import Login from './components/Login.vue';
import Registration from './components/Registration.vue';



const app = createApp({});


app.component('main-app', MainApp);
app.component('hello', Hello);
app.component('buying-insurance', BuyingInsurance);
app.component('datapicker', Datapicker);
app.component('vue-header', Header);
app.component('vue-admin', Admin);
app.component('admin-insurance', AdminInsurance);
app.component('login', Login);
app.component('vue-registration', Registration);

app.mount('#app');