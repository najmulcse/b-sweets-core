<template>
    <div>
        <b-button @click="showModal">
            <div class="card">
                <img class="card-img-top" height="170px;" src="http://www.biryanicentre.com.pk/images/deals/deal-2.jpg" alt="Card image cap">

                <div class="card-body p-2">
                    <p class="card-text text-center text-black">Add More</p>
                </div>
            </div>
        </b-button>


        <b-modal ref="myModalRef" hide-footer title="Add Category" class="ql-bg-orange">
            <div class="d-block">
                <label for="name">Name:</label> {{ url }}
                <b-form-input id="inputLive"
                              v-model.trim="name"
                              type="text"
                              :state="nameState"
                              aria-describedby="inputLiveHelp inputLiveFeedback"
                              placeholder="Enter category name"></b-form-input>
                <b-form-invalid-feedback id="inputLiveFeedback">

                    Enter at least 3 letters
                </b-form-invalid-feedback>
                <label for="icon">Icon:</label>
                <b-form-file
                        accept="image/*"
                        style="cursor: pointer"
                        ref="categoryIcon"
                        v-model="iconFile" :state="Boolean(iconFile)"
                        placeholder="Choose a file..."></b-form-file>

            </div>
            <div class="pt-2 pull-right">
                <b-button class="pl-5 pr-5" type="reset" @click="hideModal" variant="danger">Cancel</b-button>
                <b-button class="pl-5 pr-5"  @click="submit" type="button" variant="success">Save</b-button>
            </div>
        </b-modal>

    </div>
</template>


<script>
    export default {
        props: ['url'],
        data(){
          return {
              name: '',
              iconFile: null,
              isSubmit: false,
          }
        },
        watch:{

            isSubmit()
                {
                    if(this.name.length > 2 && this.icon != null){
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
                this.name = '';
                this.iconFile = null;
            },
            submit()
            {
                this.isSubmit = true;

                console.log(this.url)
                if(this.name.length && this.icon.length)
                {

                    axios.post(this.url)
                        .then(response => {

                        })
                        .cache(response => {

                        });
                }
            }
        },
        computed:
        {

            nameState()
            {
                return this.name.length >2 ? true : false;
            },
        }
    }
</script>

<style>

</style>