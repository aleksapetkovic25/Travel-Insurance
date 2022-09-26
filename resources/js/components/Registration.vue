<template>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <div class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Name</label>
                      <input type="text" id="form3Example1c" v-model="name" class="form-control" />
                      <div class="error">
                        <p class="error-msg" v-if="errors.name">{{errors.name}}</p>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <input type="text" id="form3Example3c" v-model="email" class="form-control" />
                      <p class="error-msg" v-if="errors.email">{{errors.email}}</p>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" v-model="password" class="form-control" />
                      <div class="error">
                        <p class="error-msg" v-if="errors.password">{{errors.password}}</p>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" id="form3Example4cd" v-model="confirmPassword" class="form-control" />
                      <div class="error">
                      <p class="error-msg" v-if="errors.confirmPassword">{{errors.confirmPassword}}</p>
                      </div>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button @click="userRegistration" class="btn btn-primary">Register</button>
                  </div>

                </div>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>

<script>
export default {
  data(){
    return{
      name: '',
      email: '',
      password: '',
      confirmPassword: '',
      errors:{
        name: false,
        email: false,
        password: false,
        confirmPassword: false,
      },
      validate: true
    }
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
    checkValidation(){
      this.validate = true;

      this.errors.name = false;
      this.errors.email = false;
      this.errors.password = false;
      this.errors.confirmPassword = false;

      if(this.name == null || this.name.trim().length === 0){
        this.errors.name = "This field can't be empty";
      }
      if(this.email == null || this.email.trim().length === 0){
        this.errors.email = "This field can't be empty";
      }else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))){
        this.errors.email = 'Email invalid format';
      }
      if(this.password == null || this.password.length < 5){
        this.errors.password = "Password can't be shorter than 5 characters";
      }
      if(this.password !== this.confirmPassword){
        this.errors.confirmPassword = "Passwords don't matching";
      }

      for(let item in this.errors){
        if(this.errors[item]){
          this.validate = false;
          return;
        }
      }
    },
    userRegistration(){
      this.checkValidation();
      console.log(this.validate);
      if(this.validate == false){
        return;
      }

      axios.post('/api/registration',{
        name: this.name,
        email: this.email,
        password: this.password,
        confirmPassword: this.confirmPassword
      }).then((res)=>{
        if(res.data.success === true){
          this.toastPopUp('Successful registration.')
          this.name = '';
          this.email = '';
          this.password = '';
          this.confirmPassword = '';
          setTimeout(() => {
            window.location.href = '/';
          }, 2000);
        }
        else{
          this.toastPopUp('error', 'Registration failded')
        }
      }).catch((error)=>{
        console.log(error.response.data.errors)
        if(error.response.status == 422){
          let err = error.response.data.errors
          this.errors.name = err['name']['0'];
          this.errors.email = err['email']['0'];
          this.errors.password = err['password']['0'];
          console.log('email',this.errors.email)
        }
        else{    
          console.log(error.response.status);
        }
      });
    }
  }
}
</script>

<style scoped>
.error-msg{
  color: red;
}
</style>