<template>
    <div class="wrapper">
        <h1>Post List</h1>
        <div class="media post-container" v-for="post in posts" :key="post.id">
            <img class="img mr-3" :src="'/images/'+post.image" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">{{post.title}}</h5>
                <p class="mt-0">{{post.short_description}}</p>
                <a class="btn btn-primary" v-if="!user" :href="'/posts/' + post.id" role="button">More</a>
                <div class="dropdown" v-if="user">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        this.toastPopUp('Delete is successful.');
                        this.fetchPosts();
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
                        this.toastPopUp('Archive is successful.');
                        this.fetchPosts();
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
                        this.toastPopUp('Publish is successful.');
                        this.fetchPosts();
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
    max-width: 80%;
    margin: 60px auto;
}
.post-container{
    margin: 40px 0;
}
.img{
    width:300px;
    max-width: 95%;
    height: 200px;
    object-fit: cover;
}
.archived{
    width: 70px;
    height: auto;
    margin-left: auto;
    display: block;
    font-size: 30px;
}
</style>