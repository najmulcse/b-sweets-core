<template>
    <div>
        {{ categoryList }}
        <div v-for="category in categoryList" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <img class="card-img-top" height="170px;" src="http://www.biryanicentre.com.pk/images/deals/deal-2.jpg" alt="Card image cap">
                <div class="card-body p-2">
                    <p class="card-text text-center">{{ category->name }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories','url'],
        data(){
            return {
                isCategoryAvailable : true,
                categoryList: this.categories
            }
        },
        mounted(){
            this.getCategories();
        },
        methods: {
            getCategories()
            {
                axios.get(this.url)
                    .then(response => {
                        this.categoryList = response.data;
                    }).catch(error => {

                });
            }
        }
    }
</script>