<template>
	<div class="main main-raised">
		<div class="profile-content">
            <div class="container">

                <div class="row">
	                <div class="col-xs-6 col-xs-offset-3">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img :src="getProfileFoto()" alt="Circle Image" class="img-circle img-responsive img-raised">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{ form.fullname }}</h3>
								<h6>{{ form.tipo }}</h6>
	                        </div>
	                    </div>
    	            </div>
                </div>


                <div class="tab-content">
					<div class="card-content">
		                <div class="card-body">
		                    <div class="row">
		                        <form method="POST" action="" enctype="multipart/form-data" data-toggle="validator" role="form">
		                        <div class="col-md-4 text-center">
		                            <h4><b>Subir de perfil</b></h4>
		                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
		                                <div class="fileinput-new thumbnail img-circle img-raised">
		                                    <img src="assets/img/placeholder.jpg" alt="...">
		                                </div>
		                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised "></div>
		                                <div>
		                                    <span class="btn btn-raised btn-round btn-rose btn-file">
		                                        <span class="fileinput-new">Añadir Imagen</span>
		                                        <span class="fileinput-exists">Cambiar</span>
		                                        <input type="file" name="foto"  @change="updateProfile" >
		                                    </span>
		                                    <br>
		                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-md-8 text-center">
		                            <div class="media-body">
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="input-group">
		                                            <span class="input-group-addon">
		                                                <i class="material-icons text-rose">face</i>
		                                            </span>
		                                            <input type="text" v-model="form.fullname" class="form-control" name="fullname" autofocus required  placeholder="Nombre completo">
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="input-group">
		                                            <span class="input-group-addon">
		                                                <i class="material-icons text-rose">stay_current_portrait</i>
		                                            </span>
		                                            <input type="number" v-model="form.celular" class="form-control" name="celular" required placeholder="Número de celular">
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row">
		                                    <div class="col-md-6">
		                                        <div class="input-group">
		                                            <span class="input-group-addon">
		                                                <i class="material-icons">email</i>
		                                            </span>
		                                            <input type="email" v-model="form.email" class="form-control" name="email" placeholder="Correo electrónico" >
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="input-group">
		                                            <span class="input-group-addon">
		                                                <i class="material-icons">room</i>
		                                            </span>
		                                            <input type="text" v-model="form.direccion" class="form-control" name="direccion" placeholder="Dirección especifica">
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row center-block">
		                                    <div class="col-md-6">
		                                        <div class="input-group">
		                                            <span class="input-group-addon">
		                                                <i class="material-icons text-rose">lock_outline</i>
		                                            </span>
		                                            <div class="form-group label-floating is-empty ">
		                                                <label class="control-label">Contraseña:</label>
		                                                <input type="password" class="form-control" name="password" required v-model="form.password">
		                                                <span class="material-input"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="media-footer">
		                                    <button @click.prevent="updateInfo" type="submit" class="btn btn-rose btn-round">
		                                        <i class="material-icons">person_pin</i>
		                                        ENVIAR
		                                    </button>
		                                </div>
		                            </div>
		                        </div>
		                        </form>
		                    </div>
		                </div>
			        </div>
            	</div>
        	</div>
        </div>
	</div>
</template>

<script>
    export default {
    	data(){
    		return {
    			form: new Form({
    				id: '',
    				fullname: '',
				    slug: '',
				    celular: '',
				    email: '',
				    password: '',
				    tipo: '',
				    foto: '',
				    activo: '',
				    acerca: '',
				    direccion: '',
				    location: '',
				    lat: '',
				    lng: ''
    			})
    		}
    	},
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
        	getProfileFoto(){
        		let foto = (this.form.foto.length > 200) ? this.form.foto : "img/profile/"+ this.form.foto;
                return foto;
        	},
        	updateInfo(){
        		this.$Progress.start();
        		this.form.put('api/profile/')
        		.then(()=>{
        			Fire.$emit('AfterCreate');
        			swal.fire(
        				'Actualizado!',
                        'La información del usuario fue actualizado.',
                        'success'
        			)
        			this.$Progress.finish();
        		})
        		.catch(()=>{
        			this.$Progress.fail();
        		})

        	},
        	updateProfile(e){
        		//console.log('uploading...');
        		let file = e.target.files[0];
        		let reader = new FileReader();

        		if(file['size'] < 2111775 )
                {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.form.foto = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    swal.fire(
                    	'Oops...!',
                        'La imagenen es demaciado grande!',
                        'error'
                    )
                }

        	}
        },
        created() {
        	axios.get('api/profile')
        	.then(({data}) => (this.form.fill(data)));
        }
    };
</script>