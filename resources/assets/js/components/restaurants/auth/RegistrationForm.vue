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
                        <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <b-img
                                    src="https://picsum.photos/300/150/?image=41"
                                    fluid alt="Fluid image" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <input type="file" class="" id="customFile"
                                   name="upload report" ref="file"
                                   @change="changeTitle"
                            >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-lg-6  col-xs-12">
                            <div class="input-group">
                                <input name="name"
                                       type="text"
                                       class="form-control border"
                                       :class="{'is-invalid': errors.has('name')}"
                                       v-validate="'required'"
                                       v-model="name"
                                       placeholder="Name">
                                <div class="invalid-feedback" v-if="errors.has('name')">
                                    {{ errors.first('name') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-lg-6  col-xs-12">
                            <div class="input-group">
                                <input name="phone"
                                       type="text"
                                       :class="{'is-invalid': errors.has('phone')}"
                                       v-validate="'required'"
                                       v-model="phone"
                                       class="form-control border"
                                       placeholder="Phone">
                                <div class="invalid-feedback" v-if="errors.has('phone')">
                                    {{ errors.first('phone') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="input-group">
                                <textarea name="address"
                                          type="text"
                                          v-model="address"
                                          :class="{'is-invalid': errors.has('address')}"
                                          v-validate="'required'"
                                          class="form-control border"
                                          placeholder="Address"></textarea>
                                <div class="invalid-feedback" v-if="errors.has('address')">
                                    {{ errors.first('address') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="input-group">
                                <input name="price"
                                       type="text"
                                       :class="{'is-invalid': errors.has('price_range')}"
                                       v-validate="'required'"
                                       v-model="price_range"
                                       class="form-control border"
                                       placeholder="Price Range exp($,$$,$$$..)">
                                <div class="invalid-feedback" v-if="errors.has('price_range')">
                                    {{ errors.first('price_range') }}
                                </div>
                            </div>
                        </div>
                    </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                               <div class="input-group">
                                   <open-hour
                                           title="Open hour"
                                   ></open-hour>
                                   <div class="invalid-feedback" v-if="errors.has('open')">
                                       {{ errors.first('open') }}
                                   </div>
                               </div>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                               <div class="input-group">
                                   <close-hour
                                           title="Close hour"
                                   ></close-hour>
                                   <div class="invalid-feedback" v-if="errors.has('close')">
                                       {{ errors.first('close') }}
                                   </div>
                               </div>
                           </div>
                       </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <google-map
                            @geo_location="getGeoLocation">

                            </google-map>
                            <div class="invalid-feedback" v-if="errors.has('location')">
                                {{ errors.first('location') }}
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 col-xs-12">
                            <div class="input-group">
                                <button type="button"
                                        @click="next"
                                        class="next-button btn btn-rounded form-control">Next</button>
                            </div>
                        </div>
                    </div>
                   </div>
                   <div v-if="step===2">
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <label for="Parking" class="control-label"> Parking</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input
                                           class="form-check-input"
                                           name="parking"
                                           type="radio"
                                           id="inlineCheckbox1"
                                           v-model="is_parking"
                                           value="1">
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
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <label for="Delivery" class="control-label"> Delivery</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
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
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <label for="Kids_corner" class="control-label"> Kids Corner</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_kids_corner" type="radio" value="1">
                                   <label class="form-check-label" for="kids_corner">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_kids_corner" type="radio"value="0">
                                   <label class="form-check-label" for="kids_corner">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <label for="Smoking_zone" class="control-label"> Smoking Zone</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_smoking_zone" type="radio" value="1">
                                   <label class="form-check-label" for="smoking_zone">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_smoking_zone" type="radio"value="0">
                                   <label class="form-check-label" for="smoking_zone">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <label for="wifi" class="control-label"> Wifi</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_wifi" type="radio" value="1">
                                   <label class="form-check-label" for="wifi">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_wifi" type="radio"value="0">
                                   <label class="form-check-label" for="wifi">No</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <label for="buffet" class="control-label"> Buffet</label>
                           </div>
                           <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-6">
                               <div class="form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_buffet" type="radio" value="1">
                                   <label class="form-check-label" for="buffet">Yes</label>
                               </div>
                               <div class="form-check form-check-flat mt-0 form-check-inline">
                                   <input class="form-check-input" name="is_buffet" type="radio"value="0">
                                   <label class="form-check-label" for="buffet">No</label>
                               </div>
                           </div>
                           <hr>
                       </div>
                       <div class="form-row">
                           <div class="form-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 col-xs-12">
                               <div class="input-group">
                                   <button type="button" @click.prevent="submit" class="next-button btn btn-rounded form-control">Submit</button>
                               </div>
                           </div>
                       </div>
                   </div>
                </form>
            </div>
            <p class="footer-text text-center">copyright © 2018 Bombay sweets.</p>
        </b-card>
    </div>
</template>

<script>
    import GoogleMap from "../../plugins/maps/GoogleMap.vue";
    import CloseHour from "../../plugins/times/CloseHour.vue";
    import OpenHour from "../../plugins/times/OpenHour.vue";

    export default {
        props: ['url','user'],
        components: {
            GoogleMap,
            CloseHour,
            OpenHour
        },
        data(){
            return {
                step: 1,
                submitting: false,
                name: '',
                thumbnail: '',
                location: '',
                phone: '',
                address: '',
                price_range: '',
                open: '',
                close: '',
                is_parking: 0,
                is_delivery: false,
                is_kids_corner: false,
                is_smoking_zone: false,
                is_wifi: false,
                is_buffet: false,
                center:{
                    latitude: 0,
                    longitude: 0,
                }
            }
        },
        methods: {
            next(){
                this.step = 2;
            },
            getGeoLocation(position)
            {
                this.center = position;
                this.address = this.center.address.formatted_address;
                console.log(this.center.lat);
            },
            submit()
            {
                this.$validator.validate().then(result => {
                    if (result) {
                        console.log(this.url);
                        this.submitting = true;
                       let formData = new FormData();
                           formData.append('name', this.name);
                           formData.append('phone', this.phone);
                           formData.append('address', this.address);
                           formData.append('latitude', this.center.latitude);
                           formData.append('longitude', this.center.longitude);
                           formData.append('price_range', this.price_range);
                           formData.append('thumbnail', this.thumbnail);
                           formData.append('open', this.open);
                           formData.append('close', this.close);
                           formData.append('user_type', 'admin');

                        axios.post(this.url, formData,{headers: {'Content-Type': 'multipart/form-data'}})
                            .then(response => {
                                console.log(response);
                            }).catch(errors => {

                        });
                        this.submitting = false;
                    }
                });
            },
            back(){
              this.step = 1;
            },
            changeTitle() {
                this.thumbnail = this.$refs.file.files[0];
            },
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