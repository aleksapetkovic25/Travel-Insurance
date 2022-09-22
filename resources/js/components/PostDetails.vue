<template>
    <div class="wrapper">
        <img :src="'/images/' + post.image" class="img img-fluid" alt="Responsive image">
        <p class="text-justify">Author: {{post.user_id}}</p>
        <small>{{type}}</small>
        <p class="text-justify">Date created: {{post.date_created}}</p>
        <h1>{{post.title}}</h1>
        <p class="text-justify">{{post.short_description}}</p>
        <p class="text-justify" v-html="post.description"></p>
        
    </div>
</template>

<script>
export default {
    props:['post'],
    mounted(){
        console.log(this.post)
    },
    computed:{
        type(){
            if(this.post.type === 0){
                return "Vest";
            }
            return "Blog";
        }
    }
}
</script>

<style scoped>
.wrapper{
    max-width: 80%;
    margin: 10px auto 60px;
}
.img{
    width: 100%;
    height: 400px;
    object-fit: cover;
}
</style>