<template>
	<div class="container">
		<div class="row">
			<div class="col-md-12 panel-center">
				<div class="card-body">
					<div class="col-md-7">
						<div class="card card-nav-tabs shadow">
							<div class="header header-rose">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
											<li class="active">
												<a href="#lista" data-toggle="tab">
													<i class="material-icons">input</i>
													LISTA DE CATEGORIAS
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="lista">
										<div class="table-responsive">
					                        <table class="table">
					                            <thead>
					                                <tr class="almuerzo">
					                                    <th class="text-center"><b>#</b></th>
					                                    <th class="text-center"><b>Imagen</b></th>
					                                    <th class="text-center"><b>Estado</b></th>
					                                    <th class="text-center"><b>Acciones</b></th>
					                                </tr>
					                            </thead>
					                            <tbody>
					                                <tr v-for="(categoria, index) in categorias" :key="categoria.id" >
					                                    <td v-text="categoria.id" ></td>
					                                    <td class="td-usertable">
															<div class="media text-left">
					                                    		<a class="pull-left td-usertable">
					                                    			<div class="listcategoria">
					                                    				<img :src="getFoto(categoria.imagen)" class="img img-raised img-rounded" alt="Categoria foto" style="height: 100%;">
					                                    			</div>
					                                    		</a>
					                                    		<div class="media-body">
					                                    			<h6 class="media-heading">
																		{{ categoria.nombre }}
					                                    				<small>* {{ categoria.create_dates.created_at_human }}</small>
					                                    			</h6>
					                                    			<p class="usertable" v-text="categoria.descripcion"></p>
		                                                    	</div>
		                                                    </div>
					                                    </td>

					                                    <td >{{ categoria.estado ? 'ACTIVO':'INACTIVO' }}</td>
					                                    <td class="td-actions text-center">
					                                        <a @click.prevent="editForm(categoria)" href="#" rel="tooltip" class="btn btn-success" data-original-title="" title="Editar Categoría">
					                                            <i class="material-icons">edit</i>
					                                        </a>
					                                        <a href="#" v-show="categoria.estado" @click="deleteCate(categoria.id)" class="btn btn-danger" data-original-title="" title="Dar de Baja">
					                                            <i class="material-icons">close</i>
					                                        </a>
					                                        <a href="#" v-show="!categoria.estado" @click="activoCate(categoria.id)" class="btn btn-warning" data-original-title="" title="Activar categoría">
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
						<!-- End Tabs with icons on Card -->
					</div>
					<div class="col-md-5">
						<div class="card card-nav-tabs shadow">
							<div class="header header-rose">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
											<li class="active">
												<a href="#crear" data-toggle="tab">Nueva Categoría</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="crear">
									<form @submit.prevent="editmode  ? updateCate() : createCate()" enctype="multipart/form-data">
										<div class="card-content">
											<h4><b>Imagen de la categoría</b></h4>
											<div class="fileinput fileinput-new text-center" data-provides="fileinput" :class="{ 'has-error is-focused': form.errors.has('imagen') }">
												<div class="fileinput-new thumbnail img-rounded img-raised">
													<img src="/img/categoria/catedefault.jpg" alt="Foto Usuario" style="width: 20rem;" v-show="!editmode">
					                                <img :src="getFotocate()" alt="Foto Usuario" v-show="editmode">
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail img-rounded img-raised"></div>
												<div>
													<span class="btn btn-raised btn-round btn-rose btn-file">
														<span class="fileinput-new">Añadir Imagen</span>
														<span class="fileinput-exists">Cambiar</span>
	 												 	<input type="file" @change="cateFoto" name="imagen"  >
													</span>

													<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
												</div>
												<has-error :form="form" field="imagen"></has-error>
											</div>
					                        <div class="input-group">
					                            <span class="input-group-addon">
					                                <i class="material-icons text-rose">card_membership</i>
					                            </span>
					                            <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('nombre') }">
						                            <input type="text" class="form-control" name="nombre"  placeholder="Nombre de categoría" v-model="form.nombre">
						                            <span class="material-input"></span>
						                            <has-error :form="form" field="nombre"></has-error>
					                            </div>
					                        </div>
					                        <div class="input-group">
					                         	<span class="input-group-addon">
					                                <i class="material-icons">line_weight</i>
					                            </span>
					                        	<textarea placeholder="Descripción de la categoría" rows="2" class="form-control" name="descripcion" v-model="form.descripcion"></textarea>
					                      	</div>

					                    </div>
					                    <div class="text-center">
					                        <button class="btn btn-rose btn-round" type="submit" v-show="editmode">
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
            </div>
		</div>
	</div>

</template>

<script>
    export default {
        data() {
            return {
            	editmode : false,
                categorias : [],
                form: new Form({
                	id:'',
                    imagen: '',
                    nombre: '',
                    descripcion: '',
                    estado: '',
                    create_dates:[]
                })
            }
        },
        methods: {
        	getFoto(ufoto){
        		let foto = "img/categoria/"+ufoto;
                return foto;
        	},
        	getFotocate(){
        		let foto = (this.form.imagen.length > 200) ? this.form.imagen : "img/categoria/"+ this.form.imagen;
                return foto;
        	},
        	updateCate(id){
                this.$Progress.start();
                this.form.put('api/categorias/'+this.form.id)
                .then(() => {
                	this.form.reset();
                	this.editmode = false;
                    swal.fire(
                        'Actualizado!',
                        'La información de la categoría fue actualizada.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
        	editForm(categoria){
                this.editmode = true;
                this.form.reset();
                this.form.fill(categoria);
            },
        	deleteCate(id){
        		swal.fire({
				  title: '¿Estás seguro?',
				  text: "No podrás revertir esto!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, dar de baja!'
				}).then((result) => {
				   if (result.value)
				   {
				      this.form.delete('api/categorias/'+id).then(()=>{
                            swal.fire(
                                'Deleted!',
                                'La categoria fue dado de baja.',
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
        	activoCate(id){
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
				      this.form.get('api/categorias/'+id).then(()=>{
                            swal.fire(
                                'Excelente!',
                                'La categoría fue activada.',
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
        	async loadCategorias(){
                const  resul = await axios.get('api/categorias');
				this.categorias = resul.data.data;

            },
        	createCate(){
        		this.$Progress.start();
                this.form.post('api/categorias')
                .then(()=>{
                	Fire.$emit('AfterCreate');
					swal.fire({
                        icon: 'success',
                        title: 'Categoria creada correctamente',
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
	        cateFoto(e){
        		//console.log('uploading...');
        		let file = e.target.files[0];
        		let reader = new FileReader();

        		if(file['size'] < 2111775 )
                {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result)
                        this.form.imagen = reader.result;
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
        	this.loadCategorias();
        	Fire.$on('AfterCreate',() => {
                this.loadCategorias();
            });
        }
    };
</script>
























