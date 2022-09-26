<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand me-2" href="/">
      <img
        src="/assets/logo.png"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
        class="logo"
      />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">Blog Page</a>
        </li>
        <li v-if="user" class="nav-link">
          <div class="dropdown" v-if="user">
            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/insurances">Insurances</a>
              <a class="dropdown-item" href="/create">Create Blog/News</a>
              <a class="dropdown-item" href="/registration">Registration</a>
            </div>
          </div>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <a v-if="!user" href="" class="btn btn-light" data-toggle="modal" data-target="#modalLoginForm">Login</a>
        <button @click="logout" v-if="user" class="nav-link btn btn-danger">Logout</button>
        <a
          class="btn btn-dark px-3"
          href="https://github.com/aleksapetkovic25"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div>
  </div>
  <login></login>
</nav>
</template>

<script>
export default {
  data(){
    return{
      user: null
    }
  },
  methods:{
    logout(){
      axios.get('/logout').then((res)=>{
        this.user = res.data;
        window.location.href = '/';
      })
    },
    loggedUser(user){
      console.log('asd',user)
      // alert(user.message)
      this.user = user.user;
    }
  },
  mounted(){
    axios.get('/checkuserlogged').then((res)=>{
      this.user = res.data;
      console.log('header',this.user)
    })
  }
}
</script>

<style scoped>
.navbar{
    background-color: black;
}
.navbar-dark .navbar-nav .nav-link{
  color: white;
  transition: 0.5s all ease;
}
.navbar-dark .navbar-nav .nav-link:hover{
  color: aquamarine;
}
.d-flex{
  margin-left: auto;
}
.logo{
  width: 100px;
  height: auto;
}
.nav-link{
  color: white;
}
.dropdown-toggle{
  background: transparent;
  color: white;
  border: none;
  padding: 0;
}
.dropdown-item:hover{
  background-color: #007bff;
}
.dropdown-menu.show{
  background-color: #343a40;
  border: none;
}
.dropdown-menu.show .dropdown-item{
  color: white;
}
.vr{
  height: 40px;
  width: 1px;
  background-color: white;
  margin: 0 15px 0 0;
}
.nav-link.btn.btn-danger{
  padding: 5px 10px;
  margin-right: 5px;
}
</style>