<template>
  <div>
    <VueElementLoading :active="loading" spinner="line-wave" color="var(--primary)" />
    <form method="post" class="form-group" enctype="multipart/form-data" @submit.prevent="saveImage">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <!-- HTML block to preview the image -->
                <div
                id="preview"
                style="display: flex; justify-content: center; align-items: center;"
                class="col-md-12 mb-3"
                >
                <img v-if="url" :src="url" style="max-width: 100%; max-height: 100px;" />
                </div>
                <!-- Input field to get the image -->
                <div class="col-md-12">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"></span>
                </div>
                <div class="custom-file">
                    <input
                    type="file"
                    class="custom-file-input"
                    id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01"
                    @change="onFileChange"
                    required
                    />
                    <label class="custom-file-label" for="inputGroupFile01">{{fileName}}</label>
                </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-12 mb-3">
            <b-button variant="primary" type="submit" class="float-right">Save</b-button>
            <button type="button" class="mr-2 btn btn-hover-shine btn-link btn-sm float-right" @click="closeMe">Cancel</button>
        </div>
    </form>
  </div>
</template>

<script>
import toastr from "toastr";
export default {
  components: {},

  data() {
    return {
      url: null,
      fileName: "Select an image...",
      imgValue: null,
      loading:false,
      image:''
    };
  },

  /////component props to be decleared by the parent component
  props: {
      my_modal:Object,
      user_id:String,
  },

  methods: {
      //save image
    saveImage(){
        this.loading = true;
        const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
        let formData = new FormData();
        formData.append('featured_image', this.image);
        formData.append('user_id', this.user_id);
        axios
        .post('/profile/update-image', formData, config)
        .then(res=>{
            this.$emit('update-user');
            toastr["success"]('Profile picture uploaded',"Success");
            this.loading = false;
            this.$inertia.reload();
            this.closeMe();
        })
        .catch(err => {
            this.loading = false;
            toastr["error"]('Profile picture not uploaded',"error");
        });
    },
    ////////function to convert image to base64, show preview image, show image name
    onFileChange(e) {
      const file = e.target.files[0];
      this.image = file;
      //////variable to preview image (image local url)
      this.url = URL.createObjectURL(file);
      //////variable to show mage name
      this.fileName = file.name;

      /////function to convert to base64
      let reader = new FileReader();
      reader.onloadend = (e) => {
        let photo = e.target;
        this.imgValue = photo.result;
        ////////an event is created and you can listen to this event in any component to get base64 value
        this.$emit("imgData", photo.result);
      };
      reader.readAsDataURL(file);
    },
    closeMe() {
        this.my_modal.hide("edit-image");
    },
  },
};
</script>
