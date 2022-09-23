<template>
    <div class="wrapper">
        <img :src="'/images/' + post.image" class="img img-fluid" alt="Responsive image">
        <small class="text-justify">Date created: {{dateCreated}}</small>
        <h1>{{post.title}}</h1>
        <p class="text-justify">{{post.short_description}}</p>
        <p class="text-justify" v-html="post.description"></p>
        
    </div>
</template>

<script>
export default {
    props:['post'],
    mounted(){
        console.log(new Date(this.post.date_created))
    },
    computed:{
        type(){
            if(this.post.type === 0){
                return "Vest";
            }
            return "Blog";
        },
        dateCreated(){
            let d  = new Date(this.post.date_created);
            let day = d.getDate();
            let mount = d.getMonth() + 1;
            let year = d.getFullYear();
            return `${day}.${mount}.${year}.`;
        }
    },
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
    margin-bottom: 60px;
}
h1{
    margin: 10px 0 50px;
}
</style>