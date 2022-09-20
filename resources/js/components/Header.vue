<template>
<nav class="navbar navbar-expand-lg">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog Page</a>
        </li>
        <li v-if="user" class="nav-link">
          <div class="dropdown" v-if="user">
            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/insurances">Insurances</a>
              <a class="dropdown-item" href="#">Create Blog/News</a>
              <a class="dropdown-item" href="/registration">Registration</a>
            </div>
          </div>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <a v-if="!user" href="" class="btn btn-link px-3 me-2" data-toggle="modal" data-target="#modalLoginForm">Login</a>
        <button @click="logout" v-if="user" class="nav-link btn btn-danger">Logout</button>
        <a
          class="btn btn-dark px-3"
          href="https://github.com/aleksapetkovic25"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
  <login @user="loggedUser"></login>
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
      })
    },
    loggedUser(user){
      console.log('asd',user)
      alert(user.message)
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
.d-flex{
  margin-left: auto;
}
</style>