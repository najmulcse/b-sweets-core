<template>
    <div>
        <button @click="showModal">
            <div class="card">
                <img class="card-img-top" height="170px;" src="http://www.biryanicentre.com.pk/images/deals/deal-2.jpg" alt="Card image cap">

                <div class="card-body p-2">
                    <p class="card-text text-center text-black">Add More</p>
                </div>
            </div>
        </button>


        <b-modal ref="myModalRef" hide-footer title="Add Category" class="ql-bg-orange">
            <div class="d-block">
                <label for="name">Name:</label>
                <b-form-input id="inputLive"
                              v-model.trim="categoryName"
                              type="text"
                              :state="nameState"
                              aria-describedby="inputLiveHelp inputLiveFeedback"
                              placeholder="Enter category name"></b-form-input>
                <b-form-invalid-feedback id="inputLiveFeedback">

                    Enter at least 3 letters
                </b-form-invalid-feedback>
                <label for="icon">Icon:</label>
                <input type="file" class="" id="customFile"
                       name="upload report" ref="file"
                       @change="changeTitle"
                >

            </div>
            <div class="pt-2 pull-right">
                <b-button
                        class="pl-5 pr-5"
                        type="reset"
                        @click="hideModal"
                        variant="danger">Cancel</b-button>
                <b-button
                        class="pl-5 pr-5"
                        @click="submit"
                        :class="isSubmit ? 'disabled': '' "
                        type="button"
                        variant="success">{{ isSubmit ? 'Saving...': 'Save'}}</b-button>
            </div>
        </b-modal>

    </div>
</template>


<script>
    export default {
        props: ['url'],
        data(){
          return {
              categoryName: '',
              iconFile: null,
              isSubmit: false,
          }
        },
        watch:{

            isSubmit()
                {
                    if(this.categoryName.length > 2 && this.iconFile != null){
                        this.isSubmit = true;
                    }
                }
        },
        methods: {
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
                this.categoryName = '';
                this.iconFile = null;
            },
            changeTitle() {
                this.iconFile = this.$refs.file.files[0];
            },
            submit()
            {
                this.isSubmit = true;

                if(this.$refs.file.files.length> 0){
                    this.iconFile = this.$refs.file.files[0];
                }
                let formData = new FormData();
                formData.append('name', this.categoryName);
                formData.append('icon', this.iconFile);
                axios.post(this.url, formData,{headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => {
                        console.log(response.data);
                        this.hideModal();
                       // window.location.reload();
                    })
                    .catch(response => {
                        console.log(response.data);
                    });
            }
        },
        computed:
        {
            nameState()
            {
                return this.categoryName.length >2 ? true : false;
            },
        }
    }
</script>

<style>

</style>