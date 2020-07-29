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
											<b>LISTA DE PRODUCTOS</b>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="card-content">
						<button class="btn btn-raised btn-round btn-rose" @click="modalPro">
							<i class="material-icons">content_copy</i>
								Nuevo Producto
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
			                                    <th class="text-center"><b>Descuento</b></th>
			                                    <th class="text-center"><b>Stock</b></th>
			                                    <th class="text-center"><b>Oferta</b></th>
			                                    <th class="text-center"><b>Estado</b></th>
			                                    <th class="text-center"><b>Acciones</b></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr v-for="(producto, index) in productos" :key="producto.id" >
			                                    <td v-text="producto.id" class="col-sm-1 col-md-1"></td>
			                                    <td class="td-usertable col-sm-5 col-md-5">
													<div class="media text-left">
			                                    		<a class="pull-left td-usertable">
			                                    			<div class="listcategoria">
			                                    				<img src="/img/producto/prodefault.jpg" class="img img-raised img-rounded" alt="Producto foto" style="height: 100%;">
			                                    			</div>
			                                    		</a>
			                                    		<div class="media-body">
			                                    			<h6 class="media-heading">
																{{ producto.nombre }}
			                                    				<small>* {{ producto.codigo }}</small>
			                                    			</h6>
			                                    			<p class="usertable" v-text="producto.descripcion"></p>
			                                    			<h6 class="media-heading">
																Precio
			                                    				<small>: {{ producto.precio }}</small> Bs.
			                                    			</h6>
			                                    			<h6 class="media-heading">
																Num. Personas:
			                                    				<small>: {{ producto.cant_personas }}</small>
			                                    			</h6>
                                                    	</div>
                                                    </div>
			                                    </td>
			                                    <td v-text="producto.descuento" class="col-sm-1 col-md-1"></td>
			                                    <td v-text="producto.stock" class="col-sm-1 col-md-1"></td>
			                                    <td v-text="producto.oferta" class="col-sm-2 col-md-2 text-justify"></td>
			                                    <td v-text="producto.estado ? 'ACTIVO' : 'INACTIVO'" class="col-sm-1 col-md-1 text-justify"></td>
			                                    <td class="td-actions text-center col-sm-1 col-md-1">
			                                        <!--<a @click="editModal(user)" href="#" rel="tooltip" class="btn btn-success" data-original-title="" title="Editar Usuario">
			                                            <i class="material-icons">edit</i>
			                                        </a>
			                                        <a href="#" v-show="user.activo" @click="deleteUser(user.id)" class="btn btn-danger" data-original-title="" title="Eliminar usuario">
			                                            <i class="material-icons">close</i>
			                                        </a>
			                                        <a href="#" v-show="!user.activo" @click="activoUser(user.id)" class="btn btn-warning" data-original-title="" title="Activar usuario">
			                                            <i class="material-icons">done</i>
			                                        </a>-->
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
		<div class="modal fade" id="proModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
	                    <h2 class="modal-title card-title text-center" v-show="!editmode" id="myModalLabel">NUEVO PRODUCTO</h2>
	                    <h2 class="modal-title card-title text-center" v-show="editmode" id="myModalLabel">EDITAR PRODUCTO</h2>
	                    <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
	                </div>
	                <div class="modal-body">
                		<div class="media media-post">
    						<form @submit.prevent="editmode  ? updatePro() : createPro()"  >
							<div class="row">
								<div class="col-md-7 text-center">
    	                        	<div class="media-body">
    		                            <div class="row">
    		                                <div class="col-md-6">
			                                    <div class="input-group">
			                                        <span class="input-group-addon">
			                                            <i class="material-icons text-rose">local_offer</i>
													</span>
													 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('nombre') }">
				                                    	<input v-model.trim="form.nombre" type="text" class="form-control" name="nombre" placeholder="Nombre del producto">
				                                    	<span class="material-input"></span>
							                            <has-error :form="form" field="nombre"></has-error>
						                            </div>
			                                    </div>
    		                                </div>
    		                                <div class="col-md-6">
												<div class="input-group">
			                                        <span class="input-group-addon">
			                                            <i class="material-icons text-rose">more</i>
			                                        </span>
			                                        <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('descripcion') }">
				                                    	<input v-model.trim="form.descripcion" type="text" class="form-control" name="descripcion" placeholder="Describa el producto.">
				                                    	<span class="material-input"></span>
							                            <has-error :form="form" field="descripcion"></has-error>
						                            </div>
			                                    </div>
    		                                </div>
    		                            </div>
    		                            <div class="row">
    		                                <div class="col-md-6">
												<div class="input-group">
			                                        <span class="input-group-addon">
			                                            <i class="material-icons text-rose">attach_money</i>
			                                        </span>
			                                        <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('precio') }">
				                                    	<input v-model.number="form.precio" type="number" step="0.01" class="form-control" name="precio" placeholder="Precio del producto.">
				                                    	<span class="material-input"></span>
							                            <has-error :form="form" field="precio"></has-error>
						                            </div>
			                                    </div>
    		                                </div>
    		                                <div class="col-md-6">
												<div class="input-group" >
			                                        <span class="input-group-addon">
			                                            <i class="material-icons">money_off</i>
			                                        </span>
				                                    <input  v-model.number="form.descuento" type="number" step="0.01" class="form-control" name="descuento" placeholder="Descuento del producto.">
				                                    <has-error :form="form" field="descuento"></has-error>
			                                    </div>
    		                                </div>
    		                            </div>
										<div class="row">
    		                                <div class="col-md-6">
												<div class="input-group">
			                                        <span class="input-group-addon">
			                                            <i class="material-icons text-rose">offline_pin</i>
			                                        </span>
			                                        <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('stock') }">
				                                    	<input v-model.number="form.stock" type="number"  class="form-control" name="stock" placeholder="Stock del producto.">
				                                    	<span class="material-input"></span>
							                            <has-error :form="form" field="stock"></has-error>
						                            </div>
			                                    </div>
    		                                </div>
    		                                <div class="col-md-6">
												<div class="input-group" >
			                                        <span class="input-group-addon">
			                                            <i class="material-icons ">people_outline</i>
			                                        </span>
				                                    <input v-model.number="form.cant_personas" type="number" class="form-control" name="cant_personas" placeholder="Para cuantas personas.">
				                                    <has-error :form="form" field="cant_personas"></has-error>
			                                    </div>
    		                                </div>
    		                            </div>
    		                            <div class="row">
    		                                <div class="col-md-6">
												<div class="input-group">
						                         	<span class="input-group-addon">
						                                <i class="material-icons text-rose">line_weight</i>
						                            </span>
						                            <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('descripcion') }">
						                        		<textarea placeholder="Descripción del producto." rows="2" class="form-control" name="descripcion" v-model.trim="form.descripcion"></textarea>
						                        		<span class="material-input"></span>
							                            <has-error :form="form" field="descripcion"></has-error>
						                            </div>
						                      	</div>
    		                                </div>
    		                                <div class="col-md-6">
												<div class="input-group">
						                         	<span class="input-group-addon">
						                                <i class="material-icons">indeterminate_check_box</i>
						                            </span>
						                        	<textarea placeholder="Oferta del producto." rows="2" class="form-control" name="oferta" v-model.trim="form.oferta"></textarea>
						                      	</div>
    		                                </div>
    		                            </div>
    	                        	</div>
    	                    	</div>
    	                    	<div class="col-md-5 text-center" >
									<div class="media-body">
										<h4><b>Imagen de la categoría</b></h4>
										<div class="fileinput fileinput-new text-center" data-provides="fileinput" :class="{ 'has-error is-focused': form.errors.has('imagen') }">
											<div class="fileinput-new thumbnail img-rounded img-raised " >
												<img src="/img/categoria/catedefault.jpg" alt="Foto Usuario" style="width: 20rem;" v-show="!editmode">

											</div>
											<div class="fileinput-preview fileinput-exists thumbnail img-rounded img-raised"></div>
											<div>
												<span class="btn btn-raised btn-round btn-rose btn-file">
													<span class="fileinput-new">Añadir Imagen</span>
													<span class="fileinput-exists">Cambiar</span>
 												 	<input type="file"  name="imagen"  >
												</span>

												<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
											</div>
											<has-error :form="form" field="imagen"></has-error>
										</div>
										<span v-show="false">
											<h4><b>Almuerzo Familiar</b></h4>
	    		                            <div class="row">
	    		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">local_offer</i>
														</span>
														 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('entrada') }">
					                                    	<input v-model.trim="form.entrada" type="text" class="form-control" name="entrada" placeholder="Entrada">
					                                    	<span class="material-input"></span>
								                            <has-error :form="form" field="entrada"></has-error>
							                            </div>
				                                    </div>
	    		                                </div>
	    		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">local_offer</i>
														</span>
														 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('sopa') }">
					                                    	<input v-model.trim="form.sopa" type="text" class="form-control" name="sopa" placeholder="Sopa">
					                                    	<span class="material-input"></span>
								                            <has-error :form="form" field="sopa"></has-error>
							                            </div>
				                                    </div>
	    		                                </div>
	    		                            </div>
	    		                            <div class="row">
	    		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">local_offer</i>
														</span>
														 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('segundo') }">
					                                    	<input v-model.trim="form.segundo" type="text" class="form-control" name="segundo" placeholder="Segundo">
					                                    	<span class="material-input"></span>
								                            <has-error :form="form" field="segundo"></has-error>
							                            </div>
				                                    </div>
	    		                                </div>
	    		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">local_offer</i>
														</span>
														 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('postre') }">
					                                    	<input v-model.trim="form.postre" type="text" class="form-control" name="postre" placeholder="Postre">
					                                    	<span class="material-input"></span>
								                            <has-error :form="form" field="postre"></has-error>
							                            </div>
				                                    </div>
	    		                                </div>
	    		                            </div>
	    		                            <div class="row">
	    		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">local_offer</i>
														</span>
														 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('refresco') }">
					                                    	<input v-model.trim="form.refresco" type="text" class="form-control" name="refresco" placeholder="Refresco">
					                                    	<span class="material-input"></span>
								                            <has-error :form="form" field="refresco"></has-error>
							                            </div>
				                                    </div>
	    		                                </div>
	    		                                <div class="col-md-6">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">local_offer</i>
														</span>
														 <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('especificacion') }">
					                                    	<input v-model.trim="form.especificacion" type="text" class="form-control" name="especificacion" placeholder="Especificar">
					                                    	<span class="material-input"></span>
								                            <has-error :form="form" field="especificacion"></has-error>
							                            </div>
				                                    </div>
	    		                                </div>
	    		                            </div>
	    		                        </span>
									</div>
								</div>
							</div>
                            <div class="media-footer text-center">
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
	                    	</form>
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
                productos : [],
                categorias : [],
                form: new Form({
                	id:'',
                    nombre: '',
                    codigo: '',
                    descripcion: '',
                    descuento: '',
                    precio: '',
                    stock: '',
                    cant_personas: '',
                    oferta: '',
                    estado:''
                })
            }
        },
        methods: {
        	/*getFoto(ufoto){
        		let foto = "img/profile/"+ufoto;
                return foto;
        	},
        	getFotousuario(){
        		let foto = (this.form.foto.length > 200) ? this.form.foto : "img/profile/"+ this.form.foto;
                return foto;
        	},*/
        	updatePro(id){
                this.$Progress.start();
                this.form.put('api/productos/'+this.form.id)
                .then(() => {
                    $('#proModal').modal('hide');
                    swal.fire(
                        'Actualizado!',
                        'La información del producto fue actualizada.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },/*
        	editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#userModal').modal('show');
                this.form.fill(user);
            },*/
        	modalPro(){
        		this.editmode = false;
                this.form.reset();
                $('#proModal').modal('show');
        	},/*
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
        	},*/
        	async loadProductos(){
                //axios.get('api/user').then(({data}) => (this.users = data));

                const  resul = await axios.get('api/productos');
				//console.log(resul);
				this.productos = resul.data.data;
				//console.log(this.users);

				const  cat = await axios.get('api/categorias');
				this.categorias = cat.data.data;

            },
        	createPro(){
        		this.$Progress.start();
                this.form.post('api/productos')
                .then(()=>{
                	Fire.$emit('AfterCreate');
                	$('#proModal').modal('hide')
					swal.fire({
                        icon: 'success',
                        title: 'Producto creado correctamente',
                        showConfirmButton: false,
  						timer: 2000
                    })
                    this.form.reset();
                	this.$Progress.finish()

                }).catch(error => {

                	this.$Progress.fail()
                    console.log(error)

                })
	        },/*
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

        	}*/
        },
        created(){
        	this.loadProductos();
        	Fire.$on('AfterCreate',() => {
                this.loadProductos();
            });
        }
    };
</script>