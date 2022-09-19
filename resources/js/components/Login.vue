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
            <div class="error">
              <p class="error-msg"></p>
            </div>
        </div>

        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
          <input type="password" placeholder="Password" id="defaultForm-pass" v-model="password" class="form-control validate">
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
export default {
  data(){
    return{
      email: '',
      password: '',
      user: null
    }
  },
  methods:{
    login(){
      axios.post('/login', {
        email: this.email,
        password: this.password,
      }).then((res)=>{
        this.user = res.data
        console.log(this.user)
        this.email = ''
        this.password = ''
      }).catch((error)=>{
        console.log(error)
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