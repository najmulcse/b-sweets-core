<template>
    <div>
        <div class="auto-form-wrapper">
            <form method="POST" action="#">

                <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                        <input name="email" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="*********">
                        <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['url','user'],
        data(){
            return {

            }
        },

    }
</script>

<style>

</style>