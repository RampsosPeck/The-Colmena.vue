<template>
	<div class="container">
		<div class="row">
			<div class="col-md-10 panel-center">
				<div class="card card-nav-tabs">
					<div class="header header-rose">
						<div class="nav-tabs-navigation">
							<div class="nav-tabs-wrapper">
								<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
									<li>
										<a data-toggle="tab">
											<b>LISTA DE USUARIOS</b>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="card-content">
						<button class="btn btn-raised btn-round btn-rose" @click="newModal">
							<i class="material-icons">person</i>
								Nuevo Usuario
							<div class="ripple-container"></div>
						</button>
						<div class="tab-content text-center">
							<div class="tab-pane active">
		                        <div class="table-responsive">
			                        <table class="table">
			                            <thead>
			                                <tr class="almuerzo">
			                                    <th class="text-center"><b>#</b></th>
			                                    <th class="text-center"><b>Datos</b></th>
			                                    <th class="text-center"><b>Celular</b></th>
			                                    <th class="text-center"><b>Tipo</b></th>
			                                    <th class="text-center"><b>Estado</b></th>
			                                    <th class="text-center"><b>Acciones</b></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr v-for="(user, index) in users" :key="user.id" >
			                                    <td v-text="user.id" class="col-sm-1 col-md-1"></td>
			                                    <td class="col-sm-5 col-md-5 td-usertable">
			                                    	<div class="media text-left">
			                                    		<a class="pull-left td-usertable">
			                                    			<div class="avatar">
			                                    				<img alt="Usuario" :src="getFoto(user.foto)" class="media-object" style="height: 100%;">
			                                    			</div>
			                                    		</a>
			                                    		<div class="media-body" >
			                                    			<h6 class="media-heading">
																{{ user.fullname }}
			                                    				<small>* {{ user.created_at | dateSimple }}</small>
			                                    			</h6>
			                                    			<p class="usertable" v-text="user.direccion"></p>
			                                    			<p class="usertable" v-text="user.email"></p>
                                                    	</div>
                                                    </div>
			                                    </td>
			                                    <td v-text="user.celular" class="col-sm-2 col-md-2"></td>
			                                    <td v-text="user.tipo" class="col-sm-1 col-md-1"></td>
			                                    <td class="col-sm-1 col-md-1">{{ user.activo ? 'ACTIVO':'ELIMINADO' }}</td>
			                                    <td class="td-actions text-center col-sm-2 col-md-2">
			                                        <a @click="editModal(user)" href="#" rel="tooltip" class="btn btn-success" data-original-title="" title="Editar Usuario">
			                                            <i class="material-icons">edit</i>
			                                        </a>
			                                        <a href="#" v-show="user.activo" @click="deleteUser(user.id)" class="btn btn-danger" data-original-title="" title="Eliminar usuario">
			                                            <i class="material-icons">close</i>
			                                        </a>
			                                        <a href="#" v-show="!user.activo" @click="activoUser(user.id)" class="btn btn-warning" data-original-title="" title="Activar usuario">
			                                            <i class="material-icons">done</i>
			                                        </a>
			                                    </td>
			                                </tr>
			                            </tbody>
			                        </table>
		                    	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
	                    <h2 class="modal-title card-title text-center" v-show="!editmode" id="myModalLabel">NUEVO USUARIO</h2>
	                    <h2 class="modal-title card-title text-center" v-show="editmode" id="myModalLabel">EDITAR USUARIO</h2>
	                    <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
	                </div>
	                <div class="modal-body">
	                	<div class="row">
	                		<div class="media media-post">
								<div class="row">
        							<form @submit.prevent="editmode  ? updateUser() : createUser()" enctype="multipart/form-data">
									<div class="col-md-4 text-center">
										<h4><b>Foto de perfil</b></h4>
										<div class="fileinput fileinput-new text-center" data-provides="fileinput">
											<div class="fileinput-new thumbnail img-circle img-raised">
												<img src="/img/profile/avatar.jpg" alt="Foto Usuario" v-show="!editmode">
												<img :src="getFotousuario()" alt="Foto Usuario" v-show="editmode">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
											<div>
												<span class="btn btn-raised btn-round btn-rose btn-file">
													<span class="fileinput-new">Añadir Imagen</span>
													<span class="fileinput-exists">Cambiar</span>
 												 	<input type="file" @change="userFoto" name="foto"  >
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
				                                    <div class="input-group" :class="{ 'has-error is-focused': form.errors.has('fullname') }">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">face</i>
														</span>
					                                    <input v-model.trim="form.fullname" type="text" class="form-control" name="fullname" placeholder="Nombre completo">
					                                    <has-error :form="form" field="fullname"></has-error>
				                                    </div>
        		                                </div>
        		                                <div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon" :class="{ 'has-error is-focused': form.errors.has('celular') }">
				                                            <i class="material-icons text-rose">stay_current_portrait</i>
				                                        </span>
					                                    <input v-model.number="form.celular" type="text" class="form-control" name="celular" placeholder="Número de celular">
					                                    <has-error :form="form" field="celular"></has-error>
				                                    </div>
        		                                </div>
        		                            </div>
        		                            <div class="row">
        		                                <div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons">email</i>
				                                        </span>
					                                    <input v-model.trim="form.email" type="text" class="form-control" name="email" placeholder="Correo electrónico">
				                                    </div>
        		                                </div>
        		                                <div class="col-md-6">
													<div class="input-group" :class="{ 'has-error is-focused': form.errors.has('direccion') }">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">room</i>
				                                        </span>
					                                    <input  v-model.trim="form.direccion" type="text" class="form-control" name="direccion" placeholder="Dirección exacta">
					                                    <has-error :form="form" field="direccion"></has-error>
				                                    </div>
        		                                </div>
        		                            </div>
        		                            <div class="row">
        		                            	<div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">lock_outline</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('password') }">
					                                    	<label class="control-label">Contraseña:</label>
					                                    	<input v-model.trim="form.password" type="password" class="form-control" name="password">
					                                    	<span class="material-input"></span>
					                                    	<has-error :form="form" field="password"></has-error>
					                                    </div>
				                                    </div>
        		                            	</div>
        		                            	<div class="col-md-6">
        		                            		<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">assignment_ind</i>
				                                        </span>
														<div class="btn-group bootstrap-select show-tick dropup open">
															<select data-style="select-with-transition" title="Tipo de Usuario" data-size="7" class="selectpicker" tabindex="-98" name="tipo" v-model="form.tipo">
																<option disabled="disabled"> Seleccione</option>
																<option value="Administrador">Administrador </option>
																<option value="Vendedor">Vendedor</option>
																<option value="Delivery">Delivery</option>
																<option value="Cliente">Cliente</option>
															</select>
														</div>
													</div>
        		                            	</div>
        		                            </div>
        		                            <div class="media-footer">
        		                            	<button class="btn btn-default btn-round" type="botton" data-dismiss="modal">
													<i class="material-icons">close</i>
													CANCELAR
												</button>
												<button class="btn btn-primary btn-round" type="submit" v-show="editmode">
													<i class="material-icons">edit</i>
													ACTUALIZAR
												</button>
												<button v-show="!editmode" class="btn btn-rose btn-round" type="submit">
													<i class="material-icons">person_pin</i>
													GUARDAR
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
	</div>
</template>

<script>
    export default {
        data() {
            return {
            	editmode : false,
                users : [],
                form: new Form({
                	id:'',
                    fullname: '',
                    celular: '',
                    email: '',
                    direccion: '',
                    foto: '',
                    password: '',
                    activo: '',
                    tipo:''
                })
            }
        },
        methods: {
        	getFoto(ufoto){
        		let foto = "img/profile/"+ufoto;
                return foto;
        	},
        	getFotousuario(){
        		let foto = (this.form.foto.length > 200) ? this.form.foto : "img/profile/"+ this.form.foto;
                return foto;
        	},
        	updateUser(id){
                this.$Progress.start();
                this.form.put('api/users/'+this.form.id)
                .then(() => {
                    $('#userModal').modal('hide');
                    swal.fire(
                        'Actualizado!',
                        'La información del usuario fue actualizada.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
        	editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#userModal').modal('show');
                this.form.fill(user);
            },
        	newModal(){
        		this.editmode = false;
                this.form.reset();
                $('#userModal').modal('show');
        	},
        	deleteUser(id){
        		swal.fire({
				  title: '¿Estás seguro?',
				  text: "No podrás revertir esto!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, eliminar!'
				}).then((result) => {
				   if (result.value)
				   {
				      this.form.delete('api/users/'+id).then(()=>{
                            swal.fire(
                                'Deleted!',
                                'El usuario fue eliminado.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                        }).catch(()=>{
                            swal.fire(
                                'Failed!',
                                'Revisa algo salió mal.',
                                'warning'
                            )
                      })
				   }
				})
        	},
        	activoUser(id){
        		swal.fire({
				  title: '¿Estás seguro?',
				  text: "No podrás revertir esto!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, activar!'
				}).then((result) => {
				   if (result.value)
				   {
				      this.form.get('api/users/'+id).then(()=>{
                            swal.fire(
                                'Excelente!',
                                'El usuario fue activado.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                        }).catch(()=>{
                            swal.fire(
                                'Failed!',
                                'Revisa algo salió mal.',
                                'warning'
                            )
                      })
				   }
				})
        	},
        	async loadUsers(){
                //axios.get('api/user').then(({data}) => (this.users = data));

                const  resul = await axios.get('api/users');
				//console.log(resul);
				this.users = resul.data.data;
				//console.log(this.users);

            },
        	createUser(){
        		this.$Progress.start();
                this.form.post('api/users')
                .then(()=>{
                	Fire.$emit('AfterCreate');
                	$('#userModal').modal('hide')
					swal.fire({
                        icon: 'success',
                        title: 'Usuario creado correctamente',
                        showConfirmButton: false,
  						timer: 2000
                    })
                    this.form.reset();
                	this.$Progress.finish()

                }).catch(error => {

                	this.$Progress.fail()
                    console.log(error)

                })
	        },
	        userFoto(e){
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
                        'La imagen es demaciado grande!',
                        'error'
                    )
                }

        	}
        },
        created(){
        	this.loadUsers();
        	Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }
    };
</script>