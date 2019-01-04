<template>
    <div>
        <div class="input-group">
                <gmap-autocomplete
                        name="location"
                        @place_changed="setPlace"
                        class="form-control border"
                        v-validate="'required'"
                        :class="{'is-invalid': errors.has('location')}"
                        placeholder="Enter restaurant location"
                        @change="addMarker">

                </gmap-autocomplete>
            <span>
                <button class="btn-primary" type="button" @click="addMarker">Search</button>
            </span>
        </div>
        <br>
        <gmap-map
                :center="center"
                :zoom="12"
                style="width:100%;  height: 400px;"
        >
            <gmap-marker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    @click="center=m.position"
            ></gmap-marker>
        </gmap-map>
    </div>
</template>

<script>
    export default {
        name: "GoogleMap",
        data() {
            return {
                // default to Montreal to keep it simple
                // change this to whatever makes sense
                center: { lat: 45.508, lng: -73.587, address: '' },
                markers: [],
                places: [],
                currentPlace: null
            };
        },

        mounted() {
            this.geolocate();
        },

        methods: {
            // receives a place object via the autocomplete component
            setPlace(place) {
                this.currentPlace = place;
            },
            addMarker() {
                if (this.currentPlace) {
                    const marker = {
                        lat: this.currentPlace.geometry.location.lat(),
                        lng: this.currentPlace.geometry.location.lng(),
                        address: this.currentPlace.formatted_address,
                    };
                    this.markers.push({ position: marker });
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                    this.$emit('geo_location', this.center)
                    console.log(this.center)

                }
            },
            geolocate: function() {
                navigator.geolocation.getCurrentPosition(position => {
                    this.center = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        address: this.currentPlace,
                    };
                    this.$emit('geo_location', this.center)

                });
            }
        }
    };
</script>