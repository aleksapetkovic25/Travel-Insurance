<template>
<div class="wrapper">
  <div class="was-validated">
    <div class="mb-3">
      <label for="validationInput1">Title</label>
      <input type="text" class="form-control is-invalid" id="validationInput1" v-model="title" placeholder="Required example title" required>
    </div>

    <div class="mb-3">
      <label for="validationInput2">Short Description</label>
      <input type="text" class="form-control is-invalid" id="validationInput2" v-model="shortDescription" placeholder="Required example short description" required>
    </div>

    <div class="mb-3">
      <label for="validationTextarea">Description</label>
        <QuillEditor theme="snow"
        required
        v-model:content="description" 
        contentType="html" 
        ref="content"
      />
    </div>

    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customControlValidation2" value="0" v-model="type" name="radio-stacked" required>
      <label class="custom-control-label" for="customControlValidation2">Vest</label>
    </div>
    <div class="custom-control custom-radio mb-3">
      <input type="radio" class="custom-control-input" id="customControlValidation3" value="1" v-model="type" name="radio-stacked">
      <label class="custom-control-label" for="customControlValidation3">Post</label>
    </div>

    

    <div class="custom-file">
      <input type="file" class="custom-file-input" id="formFile" @change="pickFile" required>
      <label class="custom-file-label" for="formFile">Choose file...</label>
      <div class="invalid-feedback">Example invalid custom file feedback</div>
    </div>
    <button @click="editPost" class="btn btn-light">Edit</button>
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
  props:['post'],
  mounted(){
    console.log(this.post)
    this.title = this.post.title;
    this.shortDescription = this.post.short_description;
    this.type = this.post.type;
    let d = this.$refs.content;
    d.setContents(this.post.description);
    if(this.post.date_published){
        this.publish = true;
    }else{
        this.publish = false;
    }
  },
  data(){
    return{
      title: '',
      shortDescription: '',
      description: '',
      publish: false,
      type: null,
      image: null
    }
  },
  methods:{
    pickFile(e){
      this.image = e.target.files[0];
    },
    createPost(){
      let fd = new FormData();

      fd.append('img', this.image)
      fd.append('title', this.title)
      fd.append('shortDesc', this.shortDescription)
      fd.append('description', this.description)
      fd.append('publish', this.publish)
      fd.append('type', this.type)

      axios.post('/create', fd ,{
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then((res) => {
        console.log(res)
        
      }).catch((error) => {

        console.log(error)
      })
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

</style>