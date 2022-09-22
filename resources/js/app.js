require('./bootstrap');

import { createApp } from 'vue';
import MainApp from './MainApp.vue';

import Datapicker from '@vuepic/vue-datepicker';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import Hello from './components/Hello';
import BuyingInsurance from './components/BuyingInsurance';
import Header from './components/Header';
import Admin from './admin/Admin';
import AdminInsurance from './admin/AdminInsurance.vue';
import Login from './components/Login.vue';
import Registration from './components/Registration.vue';
import Footer from './components/Footer.vue';
import CreateBlog from './components/CreateBlog.vue';
import PostList from './components/PostList.vue';
import PostDetails from './components/PostDetails.vue';
import EditPost from './components/EditPost.vue';


const app = createApp({});

app.use(VueSweetalert2);

app.component('datapicker', Datapicker);

app.component('vue-header', Header);
app.component('vue-footer', Footer);

app.component('main-app', MainApp);
app.component('buying-insurance', BuyingInsurance);
app.component('hello', Hello);
app.component('login', Login);
app.component('vue-registration', Registration);

app.component('vue-admin', Admin);
app.component('admin-insurance', AdminInsurance);

app.component('create-blog', CreateBlog);
app.component('edit-post', EditPost);
app.component('post-list', PostList);
app.component('post-details', PostDetails);

app.mount('#app');