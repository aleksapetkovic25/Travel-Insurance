<template>
    <div class="wrapper">
        <h1 class="text-center">Post List</h1>
        <div class="row my-5 post-container" v-for="post in posts" :key="post.id">
            <div class="col-12 col-md-4 col-lg-3 mb-2 px-0">
                <img class="img" :src="'/images/'+post.image" :alt="post.title">
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <h5 class="mt-0">{{post.title}}</h5>
                <p class="my-0"><small>Author: {{post.name}}</small></p>
                <p class="my-0" v-if="post.type == 1"><small>Blog</small></p>
                <p class="my-0" v-if="post.type == 0"><small>News</small></p>
                <hr>
                <p class="mt-0">{{post.short_description}}</p>
                <a class="btn btn-primary btn-hover" v-if="!user" :href="'/posts/' + post.id" role="button">More</a>
                <div class="dropdown" v-if="user">
                    <button class="btn btn-secondary dropdown-toggle btn-hover" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" :href="'/posts/' + post.id">Prewiew</a>
                        <a class="dropdown-item" :href="'/edit/post/'+post.id">Edit</a>
                        <button @click="deletePost(post.id)" class="dropdown-item">Delete</button>
                        <button @click="publishPost(post.id)" v-if="post.date_archived" class="dropdown-item">Publish</button>
                        <button @click="archivePost(post.id)" v-if="post.date_published" class="dropdown-item">Archive</button>
                    </div>
                </div>
                <div class="archived" v-if="post.date_archived"><i class="fa-solid fa-box-archive"></i></div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props:['user'],
    data(){
        return{
            posts: []
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
        fetchPosts(){
            axios.get('/api/posts').then((res) => {
                console.log(res.data)
                this.posts = res.data
            })
        },
        deletePost(id){
            this.$swal({
                title: 'Are you sure?',
                text: "Do you want to delete post!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((res) => {
                if(res.isConfirmed){
                    axios.delete('/delete/post/' + id, {id: id,}).then((res) => {
                        if(res.data.success === true){
                            this.toastPopUp('success','Delete is successful.');
                            this.fetchPosts();
                        }
                        else{
                            this.toastPopUp('error', 'Delete failed');
                        }
                    }).catch((err) => {
                        console.log(err);
                    });
                }
            });
        },
        archivePost(id){
            this.$swal({
                title: 'Are you sure?',
                text: "Do you want to archive post!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, archive it!'
            }).then((res) => {
                if(res.isConfirmed){
                    axios.put('/archive/post/'+id).then((res) => {
                        if(res.data.success === true){
                            this.toastPopUp('success','Archive is successful.');
                            this.fetchPosts();
                        }
                        else{
                            this.toastPopUp('error', 'Archive failed');
                        }
                    }).catch((err) => {
                        console.log(err);
                    });;
                }
            });
        },
        publishPost(id){
            this.$swal({
                title: 'Are you sure?',
                text: "Do you want to publish post!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, publish it!'
            }).then((res) => {
                if(res.isConfirmed){
                    axios.put('/publish/post/'+id).then((res) => {
                        if(res.data.success === true){
                            this.toastPopUp('success','Publish is successful.');
                            this.fetchPosts();
                        }
                        else{
                            this.toastPopUp('error', 'Publish failed');
                        }
                    }).catch((err) => {
                        console.log(err);
                    });;
                }
            });
        }
    },
    mounted(){
        console.log('mounted user', this.user)
        this.fetchPosts();
        console.log(this.posts)
        // Swal.fire({
        //     title: 'Error',
        //     text: 'Do you want to continue;',
        //     icon: 'error',
        //     confirmButtonText: 'Cool'
        // });
    },
    watch:{
        user(){
            console.log('watch user', this.user)
        }
    }
}
</script>

<style scoped>
.wrapper{
    max-width: 90%;
    margin: 60px auto;
}
.img{
    width: 100%;
    max-width: 100%;
    height: 250px;
    object-fit: cover;
}
.archived{
    width: 70px;
    height: auto;
    position: absolute;
    bottom: 0;
    right: 0;
    font-size: 30px;
}
.btn-hover{
    transition: 0.5s all ease;
    border: none;
}
.post-container:hover .btn-hover{
    background-color: rgba(127, 255, 212, 0.493);
    color: rgba(0, 0, 0, 0.678);
}

</style>