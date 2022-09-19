<template>
    <div class="wrapper">
        <h1>{{title}}</h1>
        <input type="text" v-model="newObligation" placeholder="Dodaj nesto...">
        <button @click="addToDo">Dodaj</button>
        <br>
        <br>
        <input  @keyup="searchTodo" type="text" v-model="search" placeholder="Search...">
        <button>Search</button>
        <div class="to-do-container">
            <ul class="list-group">
                <li class="list-group-item" v-for="(item, index) in showList" :key={index}>{{item}}    
                    <button @click="removeEl(index)">Delete</button>
                </li>
            </ul>
        </div>
        <div class="successful" :class="{'show': check}">
            <img src="https://www.pngall.com/wp-content/uploads/8/Green-Check-Mark-Transparent.png" alt="asdas">
        </div>
        <div class="krug" :class="{'krug-red': list.length>5}">{{lengthArray}}</div>
    </div>
</template>

<script>
export default {
    data: function(){
        return{
            title: "To do list",
            list: ['Obaveza 1', 'Obaveza 2'],
            showList: [],
            newObligation: '',
            id: 1,
            red: false,
            check: false,
            search: ''
        }
    },
    methods: {
        addToDo(){
            if(this.newObligation.length <= 0){
                return;
            }
            this.check = true;
            setTimeout(() => {
                this.list.push(this.newObligation);
                this.newObligation = '';
                this.check = false;
            }, 1000);
        },
        removeEl(el){
            console.log(el)
            this.list.splice(el,1);
            
        },
        searchTodo(){
            this.search = this.search.toLowerCase();
            if(this.search.length > 0){
                this.showList = [];
                for(let i=0; i<this.list.length; i++){
                    let a = this.list[i].toLowerCase();
                    if(a.indexOf(this.search) !== -1){
                        this.showList.push(this.list[i]);
                    }
                }
            }else{
                this.showList = this.list;
            }
            
        }
    },
    computed:{
        lengthArray(){
            return 'Duzina niza je ' + this.list.length;
        }
    },
    mounted(){
        this.searchTodo();
    }
}
</script>

<style scoped>
.wrapper{
    margin: 50px auto;
    text-align: center;
}
ul li{
    display: flex;
    justify-content: space-between;
}
.img{
    display: flex;
    justify-content: space-between;
    width: 1200px;
    margin: 150px auto 0;
}
.img img{
    width: 45%;
}
input{
    border: 1px solid gray;
}
.to-do-container{
    width: 300px;
    margin: 100px auto
}
.krug{
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: green;
    position: absolute;
    top: 150px;
    right: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 1s all ease;
}
.krug-red{
    background-color: red;
}
.successful{
    opacity: 0;
    overflow: hidden;
    height: 0;
    width: 400px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: gray;
    padding: 50px;
    border-radius: 20px;
    transition: 1s opacity ease;
}
.successful img{
    max-width: 100%;
    max-height: 100%;
}
.show{
    opacity: 1;
    overflow: visible;
    height: auto;
    transition: 0 all ease;
}
</style>
