<template>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                       <div class="profile">
                            <div class="avatar">
                                <img src="/img/secondary/coding.svg" alt="Circle Image" class="img-responsive">
                            </div>
                            <div class="name">
                                <h3 class="title">DEVELOPER</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
				<passport-clients></passport-clients>
				<passport-authorized-clients></passport-authorized-clients>
				<passport-personal-access-tokens></passport-personal-access-tokens>
				</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>