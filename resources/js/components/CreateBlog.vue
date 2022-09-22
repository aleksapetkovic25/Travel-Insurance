<template>
<div class="wrapper">
  <div class="was-validated">
    <div class="mb-3">
      <label for="validationInput1">Title</label>
      <input type="text" class="form-control is-invalid" id="validationInput1" v-model="title" placeholder="Required example title" required>
      <p class="error-msg" v-if="errors.title">{{errors.title}}</p>
    </div>

    <div class="mb-3">
      <label for="validationInput2">Short Description</label>
      <input type="text" class="form-control is-invalid" id="validationInput2" v-model="shortDescription" placeholder="Required example short description" required>
      <p class="error-msg" v-if="errors.shortDescription">{{errors.shortDescription}}</p>
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
    </div>

    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customControlValidation2" value="0" v-model="type" name="radio-stacked" required>
      <label class="custom-control-label" for="customControlValidation2">Vest</label>
    </div>
    <div class="custom-control custom-radio mb-3">
      <input type="radio" class="custom-control-input" id="customControlValidation3" value="1" v-model="type" name="radio-stacked" required>
      <label class="custom-control-label" for="customControlValidation3">Blog</label>
      <p class="error-msg" v-if="errors.type">{{errors.type}}</p>
    </div>

    

    <div class="custom-file">
      <input type="file" class="custom-file-input" id="formFile" @change="pickFile" required>
      <label class="custom-file-label" for="formFile">Choose file...</label>
      <div class="invalid-feedback">Example invalid custom file feedback</div>
      <p class="error-msg" v-if="errors.image">{{errors.image}}</p>
    </div>
    <button @click="createPost" class="btn btn-light">Add</button>
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
      errors:{
        title: false,
        shortDescription: false,
        description: false,
        type: false,
        image: false
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

      console.log(this.errors)

      for(let item in this.errors){
        if(this.errors[item]){
          this.validate = false;
          return;
        }
      }
    },
    pickFile(e){
      this.image = e.target.files[0];
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
        this.toastPopUp('Successfully created post');
        setTimeout(() => {
          window.location.href = '/posts/'+res.data;
          this.title = '';
          this.shortDescription = '';
          this.description = '';
          this.type = null;
          this.image = null;
        }, 1800);
      })
      .catch((error) => {
        console.log(error)
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