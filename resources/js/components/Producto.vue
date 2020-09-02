<template>
<div>
<div class="container">
	<div class="row">
		<div class="col-md-12 panel-center">
			<div class="card-body">
				<div class="card card-nav-tabs shadow">
					<div class="header header-rose">
						<div class="nav-tabs-navigation">
							<div class="nav-tabs-wrapper">
								<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
									<li class="active">
										<a href="#lista" data-toggle="tab">
											<i class="material-icons">input</i>
											LISTA DE PRODUCTOS
										</a>
									</li>
									<li >
										<a @click="modalPro" data-toggle="tab">
											<i class="material-icons">add</i>
											NUEVO PRODUCTOS
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
				                                <th class="text-center"><b>Datos</b></th>
				                                <th class="text-center"><b>Precio</b></th>
				                                <th class="text-center"><b>Estado</b></th>
				                                <th class="text-center"><b>Cantidad</b></th>
				                                <th class="text-center"><b>Acciones</b></th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            <tr v-for="(producto, index) in productos" :key="producto.id" >
				                                <td v-text="producto.id"></td>
				                                <td class="td-usertable col-md-5 col-xs-4" >
													<div class="media text-left" style="display: flex !important;  align-items: center !important;">
				                                		<a class="pull-left td-usertable">
				                                			<div class="listcategoria" v-for="foto in producto.fotos" :key="foto.id" v-show="producto.fotos.length>0">
				                                				<img :src="getFoto(foto.imagen)" class="img img-raised " alt="Producto foto" style="height: 100%;">
				                                			</div>
				                                			<div class="listcategoria" v-show="!producto.fotos.length>0">
				                                				<img src="/img/producto/panal1.png" class="img img-raised " alt="Producto foto" style="height: 100%;">
				                                			</div>
				                                		</a>
				                                		<div class="media-body" style="width: auto !important;">
				                                			<h6 class="media-heading">
																{{ producto.nombre }}
																<small> * <span class="media-heading">Código:</span>  {{ producto.codigo }}</small>
				                                			</h6>
				                                			<p class="usertable" v-text="producto.descripcion"></p>
				                                			<h6 class="media-heading productlist">
																Stock
				                                				<small>: {{ producto.stock }}</small> Unid.
				                                				<span v-show="producto.cant_personas">
				                                					* Num. Personas:
				                                					<small>: {{ producto.cant_personas }}</small>
				                                				</span>
				                                				<button class="btn btn-default btn-xs productcate">
				                                					{{ producto.categoria.nombre }}
				                                				</button>
				                                			</h6>
				                                			<h6  class="media-heading productlist" v-if="producto.descuento">
				                                				Descuento: Del
				                                				<button class="btn btn-warning btn-xs productcate">
				                                				   {{ producto.descuento }} %
				                                				</button> A partir de :
				                                				<small> {{ producto.actides }} </small> Unids.
				                                			</h6>
				                                    	</div>
				                                    </div>
				                                </td>
												<td class="text-center text-default col-md-1 col-xs-1">
				                                	<h6 class="media-heading productlist">
														Bs.
		                                				<small>: {{ producto.precio }}</small> Unid.
		                                			</h6>
																					</td>
				                                <td class="text-center text-warning col-md-1 col-xs-1">
				                                	<b>{{ producto.estado ? 'ACTIVO' : 'INACTIVO' }}</b>
				                                	<button class="btn btn-rose btn-xs"> Detalles <div class="ripple-container"></div></button>
				                                </td>
				                                <td class="card-content text-center col-md-3 col-xs-4" style="position: relative !important;">
													<add-producto-btn v-bind:product="producto" v-bind:carri="carrito"> </add-producto-btn>
				                                </td>
				                                <td class="td-actions text-center col-md-2 col-xs-2">
				                                    <a @click="editModal(producto)" href="#" rel="tooltip" class="btn btn-success" data-original-title="" title="Editar Usuario">
				                                        <i class="material-icons">edit</i>
				                                    </a>
				                                    <a href="#" v-show="producto.estado" @click="deletePro(producto.id)" class="btn btn-danger" data-original-title="" title="Dar de Baja">
				                                        <i class="material-icons">close</i>
				                                    </a>
				                                    <a href="#" v-show="!producto.estado" @click="activoPro(producto.id)" class="btn btn-warning" data-original-title="" title="Activar producto">
				                                        <i class="material-icons">done</i>
				                                    </a>
				                                    <!--<button class="btn btn-rose btn-xs" style="margin-top:3px;" @click="agregarCarro(producto)"  :disabled="estaEnCarrito(producto)">
														<i class="material-icons">add_shopping_cart</i>
				                                     	<span v-if="!estaEnCarrito(producto)">Añadir</span>
				                                     	<span v-else>Agregado</span>
				                                     	<div class="ripple-container"></div>
				                                    </button>-->
				                                    <router-link :to="{name: 'editar', params:{ id: producto.id}}">
														<button class="btn btn-info btn-sm mr-2">Editar</button>
													</router-link>
				                                </td>
				                            </tr>
				                        </tbody>
				                    </table>
				            	</div>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="col-md-5">
					<div class="card card-nav-tabs shadow">
						<div class="header header-rose">
							<div class="nav-tabs-navigation">
								<div class="nav-tabs-wrapper">
									<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
										<li class="active">
											<a href="#crear" data-toggle="tab">Carrito de compras</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<carrito-list :items="carrito"></carrito-list>
					</div>
				</div>-->
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
                	<div class="tab-content">
                		<form @submit.prevent="editmode  ? updatePro() : createPro()"  >
                		<div class="row">
                            <div class="col-md-8">
                            	<div class="row">
                            		<div class="col-md-6">
                            			<div class="input-group">
		                                    <span class="input-group-addon">
		                                        <i class="material-icons text-rose">bookmark</i>
											</span>
		                                	<div class="form-group" :class="{ 'has-error is-focused': form.errors.has('categoria') }">
												<select data-style="btn btn-rose btn-round" v-model="form.categoria" title="Categoria" data-size="7" class="form-control" tabindex="-98"  >
												 	<option class="bs-title-option" value="">Seleccione una categoría</option>
										            <option v-for="categoria in categorias" v-bind:value="categoria.id">{{categoria.nombre}}</option>
										        </select>
										        <has-error :form="form" field="categoria"></has-error>
										    </div>
										</div>
	                                </div>
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
			                    </div>
                                <div class="row">
	                                <div class="col-md-4">
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
	                                <div class="col-md-4">
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
	                                <div class="col-md-4">
	                                	<div class="input-group" >
		                                    <span class="input-group-addon">
		                                        <i class="material-icons">people_outline</i>
		                                    </span>
		                                    <input v-model.number="form.cant_personas" type="number" class="form-control" name="cant_personas" placeholder="Cant. personas.">
		                                    <has-error :form="form" field="cant_personas"></has-error>
		                                </div>
	                                </div>
	                            </div>
								<div class="input-group">
		                         	<span class="input-group-addon">
		                                <i class="material-icons text-rose">line_weight</i>
		                            </span>
		                            <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('descripcion') }">
		                        		<textarea placeholder="Descripción del producto." rows="2" class="form-control" name="descripcion" v-model.trim="form.descripcion"></textarea>
		                        		<span class="material-input"></span>
			                            <has-error :form="form" field="descripcion"></has-error>
		                            </div>

		                         	<span class="input-group-addon">
		                                <i class="material-icons">line_weight</i>
		                            </span>
		                            <div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('oferta') }">
		                        		<textarea placeholder="Oferta del producto. Ejm.: más de 3 platos una soda gratis." rows="2" class="form-control" name="oferta" v-model.trim="form.oferta"></textarea>
		                        		<span class="material-input"></span>
			                            <has-error :form="form" field="oferta"></has-error>
		                            </div>
		                      	</div>
		                      	<div class="row">
		                        	<div class="col-md-4">
		                        		<div class="input-group" >
		                                    <div class="input-group-addon">
					                        	<span class="input-group-text"> <h4> % </h4></span>
					                      	</div>
		                                    <input  v-model.number="form.descuento" type="number" step="any" min="0" max="100" value="0" class="form-control" name="descuento" id="descuento" placeholder="Porcentaje del descuento.">
		                                    <has-error :form="form" field="descuento"></has-error>

		                                <div class="progress" style="height: 19px;  margin-bottom: 2px !important;">
										  <div class="progress-bar progress-bar-rose " role="progressbar" aria-valuenow="form.descuento"
										  aria-valuemin="0" aria-valuemax="100" v-bind:style="{width: form.descuento+'%'}">
										    {{ form.descuento }}%
										  </div>
										</div>
										</div>
		                        	</div>
		                        	<div class="col-md-4"  style="margin-top:20px !important;">
		                        		<span class="text-rose"><b>{{ generardescuento }}</b></span>
		                        	</div>
									<div class="col-md-4">
		                        		<div class="input-group" >
		                                    <input  v-model.number="form.actides" type="number" step="any" min="0" max="100" value="0" class="form-control" name="actides" placeholder="Ej.: 3 ">
		                                    <div class="input-group-addon">
					                        	<span class="input-group-text"> Unids. </span>
					                      	</div>
		                                    <has-error :form="form" field="actides"></has-error>
		                                </div>
		                        	</div>
		                        </div>
		                        <div class="row">
	                        		<div class="panel panel-default text-center">
	                        			<div role="tab" id="headingOne" class="panel-heading " >
	                        				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed btn   btn-round btn-sm">
	                        					<h4 class="panel-title">
	                                				¿Menú del Almuerzo?
	                               					<i class="material-icons">keyboard_arrow_down</i>
	                               				</h4>
	                               			</a>
	                               		</div>
	                               		<div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
	                               			<div class="panel-body">
	                               				<div class="row">
					                                <div class="col-md-4">
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
					                                <div class="col-md-4">
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
					                                <div class="col-md-4">
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
					                            </div>
					                            <div class="row">
					                                <div class="col-md-4">
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
					                                <div class="col-md-4">
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
					                                <div class="col-md-4">

					                                </div>
					                            </div>
	                               			</div>
	                               		</div>
	                               	</div>
		                        </div>
		                    </div>
	                        <div class="col-md-4 text-center" v-show="!editmode">
								<h4><b>Imagen de la categoría</b></h4>
								<div class="fileinput fileinput-new text-center" data-provides="fileinput" :class="{ 'has-error is-focused': form.errors.has('foto') }" style="margin-bottom: 0px;">
									<div class="fileinput-new thumbnail img-rounded img-raised " >
										<img src="/img/categoria/catedefault.jpg" alt="Foto Usuario" style="width: 20rem;" >
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail img-rounded img-raised"></div>
									<div>
										<span class="btn btn-raised btn-sm btn-round btn-rose btn-file">
											<span class="fileinput-new">Añadir Imagen</span>
											<span class="fileinput-exists">Cambiar</span>
											 	<input type="file" @change="proFoto" name="foto"  >
										</span>

										<a href="#pablo" class="btn btn-sm btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
									</div>
									<has-error :form="form" field="foto"></has-error>
								</div>
                            </div>
                            <div class="col-md-4 text-center" v-show="editmode">
                            	<img src="/img/secondary/panal2.png" alt="Producto foto" style="height: 18em !important" />
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
                carrito : [],
                smsdescuento:'',
                form: new Form({
                	id:'',
                    nombre: '',
                    codigo: '',
                    descripcion: '',
                    descuento: '',
                    actides:'',
                    precio: '',
                    stock: '',
                    cant_personas: '',
                    estado:'',
                    entrada:'',
                    sopa:'',
                    segundo:'',
                    postre:'',
                    oferta:'',
                    refresco:'',
                    especificacion:'',
                    foto:'',
                    categoria:''
                })
            }
        },
        computed: {
        	generardescuento : function(){
	            if (this.form.descuento > 100) {
		            swal.fire({
		                icon: 'error',
		                title: 'Oops...',
		                text: 'No puedes poner un valor mayor a 100.'
		            });
	                this.form.descuento = 0;
	                //this.form.descuento = (this.form.precio * this.form.descuento) /100;
	                //this.form.precio = this.form.precio  - this.form.descuento;
	                this.smsdescuento = 'Hay un descuento de '+((this.form.precio * this.form.descuento) /100) +' Bs. Apartir de :';
	                return this.smsdescuento;

	            } else
		            if (this.form.descuento < 0) {
			            swal.fire({
			                icon: 'error',
			                title: 'Oops...',
			                text: 'No puedes poner un valor menor a 0.'

			            });
		                this.form.descuento = 0 ;
		                //this.form.descuento = (this.form.precio * this.form.descuento) /100;
		                //this.form.precio = this.form.precio - this.form.descuento;
		                this.smsdescuento = '';
		                return this.smsdescuento;
		            } else
		              if (this.form.descuento > 0) {
		                  //this.form.descuento = (this.form.precio * this.form.descuento) /100;
		                  //this.form.precio = this.form.precio - this.form.descuento;
		                  if (this.form.descuento == 100) {
		                      this.smsdescuento = 'Este producto tiene el 100% de descuento, por ende es gratis.';
		                  }
		                  else {
		                      this.smsdescuento = 'Hay un descuento de '+ ((this.form.precio * this.form.descuento) /100)+' Bs. Apartir de :';
		                  }
		                  return this.smsdescuento;
		              }
		              else {
		                  //this.form.descuento = '';
		                  //this.form.precio = this.form.precio;
		                  this.smsdescuento = 'Sin descuento.';
		                  return this.smsdescuento;
		              }
	            }

        },
        methods: {
        	getFoto(ufoto){
        		let foto = "img/producto/"+ufoto;
                return foto;
        	},
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
                	swal.fire(
                        'Oops..!',
                        'Revisa los errores.',
                        'error'
                    )
                    this.$Progress.fail();
                });
            },
        	editModal(producto){
                this.editmode = true;
                this.form.reset();
                $('#proModal').modal('show');
                this.form.fill(producto);
                if ($(producto.prodetalle).length){
                	this.form.entrada = producto.prodetalle.entrada;
	                this.form.sopa    = producto.prodetalle.sopa;
	                this.form.segundo = producto.prodetalle.segundo;
	                this.form.postre  = producto.prodetalle.postre;
	                this.form.refresco= producto.prodetalle.refresco;
                }
            },
        	modalPro(){
        		this.editmode = false;
                this.form.reset();
                $('#proModal').modal('show');
        	},
        	deletePro(id){
	        	swal.fire({
				  title: '¿Estás seguro?',
				  text: "No podrás revertir esto!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, Dar de baja!'
				}).then((result) => {
				   if (result.value)
				   {
				      this.form.delete('api/productos/'+id).then(()=>{
                            swal.fire(
                                'Deleted!',
                                'El producto fue dado de baja.',
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
        	activoPro(id){
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
				      this.form.get('api/productos/'+id).then(()=>{
                            swal.fire(
                                'Excelente!',
                                'El producto.nombre fue activado.',
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
                	swal.fire(
                        'Oops...!',
                        'Revisa los errores.',
                        'success'
                    )
                	this.$Progress.fail()
                    console.log(error)

                })
	        },
	        proFoto(e){
        		//console.log('uploading...');
        		let file = e.target.files[0];
        		let reader = new FileReader();
        		if(file){
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
        	}

        },
        created(){
        	this.loadProductos();
        	Fire.$on('AfterCreate',() => {
                this.loadProductos();
            });
        }
    };
</script>






















