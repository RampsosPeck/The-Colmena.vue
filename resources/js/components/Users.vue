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
			                                    <th class="text-center"><b>Nombre</b></th>
			                                    <th class="text-center"><b>Celular</b></th>
			                                    <th class="text-center"><b>E-mail</b></th>
			                                    <th class="text-center"><b>Tipo</b></th>
			                                    <th class="text-center"><b>Creado</b></th>
			                                    <th class="text-center"><b>Acciones</b></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr v-for="(user, index) in users" :key="user.id" >
			                                    <td v-text="user.id"></td>
			                                    <td v-text="user.fullname"></td>
			                                    <td v-text="user.celular"></td>
			                                    <td v-text="user.email"></td>
			                                    <td v-text="user.tipo"></td>
			                                    <td>{{ user.created_at | myDate }}</td>
			                                    <td class="td-actions text-right">
			                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
			                                            <i class="material-icons">person</i>
			                                        </button>
			                                        <a @click="editModal(user)" href="#" rel="tooltip" class="btn btn-success" data-original-title="" title="Editar Usuario">
			                                            <i class="material-icons">edit</i>
			                                        </a>
			                                        <a href="#" @click="deleteUser(user.id)" class="btn btn-danger" data-original-title="" title="Eliminar usuario">
			                                            <i class="material-icons">close</i>
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
												<img src="assets/img/placeholder.jpg" alt="...">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
											<div>
												<span class="btn btn-raised btn-round btn-rose btn-file">
													<span class="fileinput-new">Añadir Imagen</span>
													<span class="fileinput-exists">Cambiar</span>
 												 	<input type="file" name="foto"  >
												</span>
												<br>
												<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
											</div>
										</div>
										<div class="media-footer">
			                                <h6>Ingresar con:</h6>
			                                <a href="" class="btn btn-just-icon btn-round btn-twitter">
			                                      <i class="fa fa-twitter"></i>
			                                </a>
			                                <a href="" class="btn btn-just-icon btn-round btn-facebook">
			                                      <i class="fa fa-facebook-square"></i>
			                                </a>
			                                <a href="" class="btn btn-just-icon btn-round btn-google">
			                                      <i class="fa fa-google-plus-square"></i>
			                                </a>
			                            </div>
									</div>
									<div class="col-md-8 text-center">
        	                        	<div class="media-body">
        		                            <div class="row">
        		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons">face</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('fullname') }">
					                                    	<label class="control-label">Nombre completo:</label>
					                                    	<input v-model.trim="form.fullname" type="text" class="form-control" name="fullname" >
					                                    	<span class="material-input">
					                                    		<has-error :form="form" field="fullname"></has-error>
					                                    	</span>
					                                    </div>
				                                    </div>
        		                                </div>
        		                                <div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons">stay_current_portrait</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('celular') }">
					                                    	<label class="control-label">Celular:</label>
					                                    	<input v-model.number="form.celular" type="text" class="form-control" name="celular">
					                                    	<span class="material-input"></span>
					                                    	<has-error :form="form" field="celular"></has-error>
					                                    </div>
				                                    </div>
        		                                </div>
        		                            </div>
        		                            <div class="row">
        		                                <div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons">email</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" >
					                                    	<label class="control-label">Correo electrónico:</label>
					                                    	<input v-model.trim="form.email" type="text" class="form-control" name="email">
					                                    	<span class="material-input"></span>
					                                    </div>
				                                    </div>
        		                                </div>
        		                                <div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons">room</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('formatted_address') }">
					                                    	<label class="control-label">Ubicación:</label>
					                                    	<input  v-model.number="form.formatted_address" type="text" class="form-control" name="formatted_address" >
					                                    	<span class="material-input"></span>
					                                    	<has-error :form="form" field="formatted_address"></has-error>
					                                    </div>
				                                    </div>
        		                                </div>
        		                            </div>
        		                            <div class="row">
        		                            	<div class="col-md-6">
													<div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons">lock_outline</i>
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
				                                            <i class="material-icons">account_balance_wallet</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('password_confirmation') }">
					                                    	<label class="control-label">Confirmar contraseña:</label>
					                                    	<input v-model.trim="form.password_confirmation" type="password" class="form-control" name="password_confirmation">
					                                    	<span class="material-input"></span>
					                                    	<has-error :form="form" field="password_confirmation"></has-error>
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
                    formatted_address: '',
                    foto: '',
                    password: '',
                    password_confirmation: ''
                })
            }
        },
        methods: {
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
        },
        created(){
        	this.loadUsers();
        	Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }
    };
</script>