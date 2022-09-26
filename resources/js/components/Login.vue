<template>
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
            <input type="email" placeholder="Email" id="defaultForm-email" v-model="email" class="form-control validate">
            <div v-if="errors.email" class="error">
              <p class="error-msg">{{errors.email}}</p>
            </div>
        </div>

        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
          <input type="password" placeholder="Password" id="defaultForm-pass" v-model="password" class="form-control validate">
          <div v-if="errors.password" class="error">
              <p class="error-msg">{{errors.password}}</p>
            </div>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" @click="login">Login</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import swal from 'sweetalert2';
window.Swal = swal;

export default {
  data(){
    return{
      email: '',
      password: '',
      user: null,
      message: null,
      errors:{
        email: false,
        password: false
      },
      validate: true
    }
  },
  methods:{
    toastPopUp(icon, title){
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
          icon: icon,
          title: title
      });
    },
    checkValidation(){
      this.validate = true;
      this.errors.email = false;
      this.errors.password = false;

      if(this.email == null || this.email.trim().length === 0){
        this.errors.email = "This field can't be empty";
      }else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))){
        this.errors.email = 'Email invalid format';
      }
      if(this.password == null || this.password.length < 5){
        this.errors.password = "Password can't be shorter than 5 characters";
      }

      for(let item in this.errors){
        if(this.errors[item] != false){
          console.log(this.errors)
          this.validate = false;
          return;
        }
      }
    },
    login(){
      console.log(this.validate, 'validate 0')
      this.checkValidation();
      console.log(this.validate, 'validate 1')
      if(this.validate === false){
        return;
      }
      
      console.log(this.validate, 'validate 2')
      axios.post('/login', {
        email: this.email,
        password: this.password,
      }).then((res)=>{
        this.user = res.data.user
        this.message = res.data.message
        if(this.user){
          console.log(res,'1')
          this.$emit('user',{user:this.user, message:this.message});
          this.toastPopUp('success', res.data.message);
          setTimeout(() => {
            location.reload();
          }, 2000);
          this.email = '';
          this.password = '';
        }
        else{
          console.log('adasd')
          this.toastPopUp('error', res.data.message);
        }
        console.log(res)
      }).catch((error)=>{
        console.log(error);
      })
    },
  }
}
</script>

<style scoped>
.modal-content{
  background-color: #fff;
}
.error-msg{
  color: red;
}
</style>