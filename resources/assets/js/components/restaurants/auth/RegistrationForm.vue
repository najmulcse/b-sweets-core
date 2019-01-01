<template>
    <div>
        <h3 class="p-2">Restaurant Registration Form</h3>

        <b-card bg-variant="light">
            <div class="auto-form-wrapper">
                <form method="POST" action="">
                    <div v-if="step===2">
                        <button @click="back" type="button" class="next-button btn btn-rounded">Back</button>
                    </div>
                   <div v-if="step===1">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-12">
                            <b-img src="https://picsum.photos/300/150/?image=41" fluid alt="Fluid image" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-12">
                            <div class="input-group">
                                <input name="name"
                                       type="text"
                                       class="form-control border"
                                       placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-lg-4  col-xs-12">
                            <div class="input-group">
                                <input name="phone"
                                       type="text"
                                       class="form-control border"
                                       placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-lg-8 col-lg-offset-2 col-xs-12">
                            <div class="input-group">
                                <textarea name="address" type="text" class="form-control border" placeholder="Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-12">
                            <div class="input-group">
                                <input name="price" type="text" class="form-control border" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-12">
                            <div class="input-group">
                                <input name="location" type="text" class="form-control border" placeholder="Location">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-12">
                            <div class="input-group">
                                <input name="open_hour" type="text" class="form-control border" placeholder="Open hour">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-12">
                            <div class="input-group">
                                <input name="close_hour" type="text" class="form-control border" placeholder="Close hour">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 col-xs-12">
                            <div class="input-group">
                                <button type="button" @click="next" class="next-button btn btn-rounded form-control">Next</button>
                            </div>
                        </div>
                    </div>
                   </div>
                   <div v-if="step===2">
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-6">
                               <label for="Parking" class="control-label"> Parking</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   {{ is_parking }}
                                   <input
                                           class="form-check-input"
                                           name="parking"
                                           type="radio"
                                           id="inlineCheckbox1"
                                           v-if="is_parking? 'checked': ''"
                                           value="1"
                                           v-model="is_parking">
                                   <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input"
                                          name="parking"
                                          type="radio"
                                          id="inlineCheckbox2"
                                          value="0"
                                          v-model="is_parking">
                                   <label class="form-check-label" for="inlineCheckbox2">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-6">
                               <label for="Delivery" class="control-label"> Delivery</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="delivery" type="radio" value="1">
                                   <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="delivery" type="radio" value="0">
                                   <label class="form-check-label" for="inlineCheckbox2">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-6">
                               <label for="Kids_corner" class="control-label"> Kids Corner</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="kids_corner" type="radio" value="1">
                                   <label class="form-check-label" for="kids_corner">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="kids_corner" type="radio"value="0">
                                   <label class="form-check-label" for="kids_corner">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-6">
                               <label for="Smoking_zone" class="control-label"> Smoking Zone</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="smoking_zone" type="radio" value="1">
                                   <label class="form-check-label" for="smoking_zone">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="smoking_zone" type="radio"value="0">
                                   <label class="form-check-label" for="smoking_zone">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-6">
                               <label for="wifi" class="control-label"> Wifi</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="wifi" type="radio" value="1">
                                   <label class="form-check-label" for="wifi">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="wifi" type="radio"value="0">
                                   <label class="form-check-label" for="wifi">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-lg-offset-2 col-xs-6">
                               <label for="buffet" class="control-label"> Buffet</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-4 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="buffet" type="radio" value="1">
                                   <label class="form-check-label" for="buffet">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="buffet" type="radio"value="0">
                                   <label class="form-check-label" for="buffet">No</label>
                               </div>
                           </div>
                           <hr>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 col-xs-12">
                               <div class="input-group">
                                   <button type="button" @click="submit" class="next-button btn btn-rounded form-control">Submit</button>
                               </div>
                           </div>
                       </div>
                   </div>
                </form>
            </div>
        </b-card>

    </div>
</template>

<script>
    export default {
        props: ['url','user'],
        data(){
            return {
                step: 1,
                name: '',
                phone: '',
                address: '',
                price: '',
                latitude: '',
                longitude: '',
                open_hour: '',
                close_hour: '',
                is_parking: 0,
                is_delivery: false,
                is_kids_corner: false,
                is_smoking_zone: false,
                is_wifi: false,
                is_buffet: false
            }
        },
        methods: {
            next(){
                this.step = 2;
                this.submit();
            },
            submit()
            {
                return ;
            },
            back(){
              this.step = 1;
            }
        }

    }
</script>

<style>
        .next-button{
            background-color: #ff6a00f5;
            border-radius: 20px !important;
            color: white;
        }
</style>