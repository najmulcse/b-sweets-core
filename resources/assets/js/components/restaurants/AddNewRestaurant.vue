<template>
    <div>
        <button
                class="btn btn-success btn-block"
                @click="showModal"> Add restaurant
            <i class="mdi mdi-plus"></i>
        </button>

        <b-modal ref="myModalRef"
                 hide-footer title="Add Restaurant"
                 class="ql-bg-orange"
                 :header-bg-variant="'primary'"
                 :header-text-variant="'light'">

            <div v-if="errorMsg.length >0" class="alert alert-danger">
                <p>{{ errorMsg }}</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <b-form action="#">
                        <b-form-group
                                label="Email"
                                label-for="email">
                            <b-form-input
                                    type="email"
                                    name="email"
                                    v-model="email"
                                    placeholder="Email"

                                    autofocus="autofocus">

                            </b-form-input>

                        </b-form-group>

                        <b-form-group class="pull-right">
                            <b-button
                                    class="btn-primary"
                                    variant="danger"
                                    :class="isSubmit ? 'disabled': '' "
                                    @click="hideModal"
                            >Cancel</b-button>
                            <b-button
                                    class="btn-primary"
                                    variant="success"
                                    type="button"
                                    :class="isSubmit ? 'disabled': '' "
                                    @click="submit"
                            >{{ isSubmit ? 'Submitting': 'Save'}}</b-button>
                        </b-form-group>
                    </b-form>
                </div>
            </div>
        </b-modal>

    </div>
</template>


<script>
    export default {
        props: ['url'],
        data(){
            return {
                email: "",
                isSubmit: false,
                errorMsg: "",
            }
        },

        methods: {
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
               this.reset();
            },
            reset(){
              this.isSubmit = false;
              this.errorMsg = "";
              this.email = "";
            },
            submit()
            {
                this.isSubmit = true;
                let formData = new FormData();
                formData.append('email', this.email);

                    axios.post(this.url, formData)
                        .then(response => {
                            if(response.data.status === 'error'){
                                this.errorMsg =  response.data.message;
                                this.isSubmit = false;
                            }else{
                                this.hideModal();
                            }
                        })
                        .catch(response => {

                        });
            }
        },

    }
</script>

<style>
    .is-invalid{
        border-color: red;
    }
    .is-invalid-msg{
        color:red;
    }
</style>