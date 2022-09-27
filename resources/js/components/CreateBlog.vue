<template>
<div class="wrapper">
  <div class="was-validated">
    <div class="mb-3">
      <label for="validationInput1">Title</label>
      <input type="text" class="form-control is-invalid" id="validationInput1" v-model="title" placeholder="Required example title" required>
      <p class="error-msg" v-if="errors.title">{{errors.title}}</p>
      <p class="error-msg" v-if="errorsBack['title']">{{errorsBack.title[0]}}</p>
    </div>

    <div class="mb-3">
      <label for="validationInput2">Short Description</label>
      <input type="text" class="form-control is-invalid" id="validationInput2" v-model="shortDescription" placeholder="Required example short description" required>
      <p class="error-msg" v-if="errors.shortDescription">{{errors.shortDescription}}</p>
      <p class="error-msg" v-if="errorsBack['shortDesc']">{{errorsBack.shortDesc[0]}}</p>
    </div>

    <div class="mb-3">
      <label for="validationTextarea">Description</label>
        <QuillEditor theme="snow"
        required
        v-model:content="description" 
        contentType="html" 
        ref="tested"
      />
      <p class="error-msg" v-if="errors.description">{{errors.description}}</p>
      <p class="error-msg" v-if="errorsBack['description']">{{errorsBack.description[0]}}</p>
    </div>

    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customControlValidation2" value="0" v-model="type" name="radio-stacked" required>
      <label class="custom-control-label" for="customControlValidation2">News</label>
    </div>
    <div class="custom-control custom-radio mb-3">
      <input type="radio" class="custom-control-input" id="customControlValidation3" value="1" v-model="type" name="radio-stacked" required>
      <label class="custom-control-label" for="customControlValidation3">Blog</label>
      <p class="error-msg" v-if="errors.type">{{errors.type}}</p>
      <p class="error-msg" v-if="errorsBack['type']">{{errorsBack.type[0]}}</p>
    </div>

    

    <div class="custom-file">
      <input type="file" class="custom-file-input" id="formFile" @change="pickFile" required>
      <label class="custom-file-label" for="formFile">Choose file...</label>
      <p>{{imgName}}</p>
      <p class="error-msg" v-if="errors.image">{{errors.image}}</p>
      <p class="error-msg" v-if="errorsBack['img']">{{errorsBack.img}}</p>
    </div>
    <button @click="createPost" class="btn btn-light mt-2">Add</button>
  </div>
</div>
</template>


<script>
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
  components:{
    QuillEditor
  },
  mounted() {
    let t = this.$refs.tested;

    console.log(t)
  },
  data(){
    return{
      title: '',
      shortDescription: '',
      description: '',
      type: null,
      image: null,
      imgName: null,
      errors:{
        title: false,
        shortDescription: false,
        description: false,
        type: false,
        image: false
      },
      errorsBack:{},
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

      this.errors.title = false;
      this.errors.shortDescription = false;
      this.errors.description = false;
      this.errors.type = false;
      this.errors.image = false;

      if(this.title == null || this.title.trim().length === 0){
        this.errors.title = "This field can't be empty";
      }
      if(this.shortDescription == null || this.shortDescription.trim().length === 0){
        this.errors.shortDescription = "This field can't be empty";
      }
      if(this.description == null || this.description.trim().length === 0){
        this.errors.description = "This field can't be empty";
      }
      if(this.type == null){
        this.errors.type = "This field can't be empty";
      }
      if(this.type == null){
        this.errors.image = "This field can't be empty";
      }


      for(let item in this.errors){
        if(this.errors[item]){
          this.validate = false;
          return;
        }
      }
    },
    pickFile(e){
      this.image = e.target.files[0];
      this.imgName = this.image.name;
    },
    createPost(){
      this.checkValidation();
      if(this.validate == false){
        return;
      }

      let fd = new FormData();

      fd.append('img', this.image);
      fd.append('title', this.title);
      fd.append('shortDesc', this.shortDescription);
      fd.append('description', this.description);
      fd.append('type', this.type);

      axios.post('/create', fd ,{
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
      .then((res) => {
        if(res.data.success === true){
          this.toastPopUp('success','Successfully created post');
            setTimeout(() => {
              window.location.href = '/posts/'+res.data.id;
              this.title = '';
              this.shortDescription = '';
              this.description = '';
              this.type = null;
              this.image = null;
            }, 2000);
        }
        else{
          this.toastPopUp('error','Creation failed');
        }
        
      })
      .catch((error) => {
        if(error.response.status == 422){
          this.errorsBack = error.response.data.errors;
        }
        else{
          console.log(error);
        }
      });
    }
  }
}
</script>



<style scoped>
.wrapper{
  width: 1270px;
  max-width: 80%;
  margin: 60px auto 60px;
}
.error-msg{
  color: red;
}
</style>