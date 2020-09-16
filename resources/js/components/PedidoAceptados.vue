<template>
	<div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                       <div class="profile">
                            <div class="avatar">
                                <img src="/img/secondary/food.svg" alt="Circle Image" class="img-responsive">
                            </div>
                            <div class="name">
                                <h3 class="title">PEDIDOS - ACEPTADOS</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 follow">
                        <span class="btn btn-fab btn-rose" rel="tooltip" title="Escribenos" data-toggle="modal" data-target="#smsclientModal">
				            <i class="material-icons">speaker_notes</i>
				        </span>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active">
                        <material-transition tag="div" class="row">
                        <div v-for="(pedido, index) in pedidos" :key="pedido.id" :data-index="index">
                            <div class="col-md-3">
                                <div class="card card-blog shadow" style="background-color: #f2f2f2;">
                                    <div class="card-image">
                                        <div class="ribbon ribbon-top-right ">
                                            <span><strong> $ {{ pedido.total_bs }} Bs. </strong></span>
      	                                </div>
                                        <a>
                                        	<label class="cardprecio label label-rose" >
                                            	<strong>{{ pedido.estado }}</strong>
                                            </label>
                                            <label class="cardvery label label-rose" >
                                            	<i class="material-icons">motorcycle</i> <strong>{{ pedido.delivery }} Bs. </strong>
                                            </label>
                                            <img src="/img/producto/panal1.png" class="imgcard"  alt="Pedido foto" style="height: 100%;">
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title text-center text-rose">
                                            {{ pedido.user.fullname }}
                                        </h4>
                                        <p class="card-description text-justify cut-text" style="margin-bottom: 0px;" v-show="pedido.especificacion">
                                             <small> {{ pedido.especificacion }} </small>
                                        </p>
                                        <hr class="hrcardpe" />
                                        <span class="title">Celular:</span> <small> {{ pedido.user.celular }} </small>
                                        <span class="title">Orden #:</span>
                                        <span class="btn-xs" style="background-color:#e91e63; color:#fff;">
				                            <b>{{ pedido.id}}-{{pedido.user.id }}</b>
                                        </span>
                                        <hr class="hrcardpe" />
                                        <span class="title">Dirección:</span> <small> {{ pedido.user.direccion }} </small>
                                        <hr class="hrcardpe" />
                                        <span v-show="pedido.user.lat">
	                                        <span class="title">Ubicado en el mapa?</span> <span class="text-success"> <b>SI</b> </span>
	                                        <span @click.prevent="viewMap(pedido.user)" class="btn-xs" style="background-color:#e91e63; color:#fff;" data-toggle="modal" data-target="#mapaModal">
					                            <b>Ver.</b>
	                                        </span>
	                                        <hr class="hrcardpe" />
	                                    </span>
                                        <span class="title">Productos:</span> <small> Son <b class="text-rose title"> {{ pedido.carritodetalle.length }} </b> productos:</small>
                                        <ul v-for="(prodetaca, index) in pedido.carritodetalle" :key="prodetaca.id" style="margin-bottom: 1px !important;">
                                        	<li>
                                        		<small>
	                                        		<span class="title">Nombre:</span>
	                                        		<small> {{ prodetaca.producto.nombre }} </small>
	                                        		<span class="title">Cantidad:</span>
	                                        		<small> {{ prodetaca.cantidad }} </small>
	                                        		<span class="title">Precio:</span>
	                                        		<small> {{ prodetaca.producto_precio }} Bs.</small>
	                                        		<span v-show="prodetaca.descuento_bs">
	                                        			<span class="title">Descuento:</span>
	                                        			<small> {{ prodetaca.descuento_bs }} Bs.</small>
	                                        		</span>
	                                        		<span class="title">Total:</span>
	                                        		<small> {{ prodetaca.subtotal_bs }} Bs.</small>
	                                        		<span @click.prevent="viewPro(prodetaca.producto)" class="btn-xs" style="background-color:#e91e63; color:#fff;" data-toggle="modal"  >
							                            <b>Ver.</b>
			                                        </span>
                                        		</small>
                                        	</li>
                                        </ul>
                                        <hr class="hrcardpe" />
                                        <span class="title">Fecha Pedido:</span> <small> {{ pedido.dates.fecha_orden }} </small>
                                        <hr class="hrcardpe" />
                                        <span class="title">Precio total:</span> <span class="btn btn-round btn-rose btn-xs"><b>  {{convertMoney(pedido.total_bs,pedido.delivery) }} </b>Bs. </span>
                                        <hr class="hrcardpe" />

                                         <span class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('delivery') }">
                                        	<v-select class="style-chooser" :options="deliverys"  label="fullname" :reduce="fullname => fullname.fullname" index="fullname" v-model="delivery" placeholder="Seleccione un delivery"></v-select>
                							<has-error :form="form" field="delivery"></has-error>
                						</span>
                                        <!--<div class="btn-group bootstrap-select">
		                                    <select class="selectpicker" data-style="btn btn-rose btn-round" data-size="7" v-model="delivery">
		                                        <option disabled selected>Seleccione Delivery</option>
		                                        <option v-for="delivery in deliverys" v-bind:value="delivery.fullname">
		                                        	<i class="material-icons">account_circle</i>
		                                        {{ delivery.fullname }}</option>
		                                    </select>
					            		</div>-->

                                        <hr class="hrcardpe" />
                                    </div>
                                    <div class="footer text-center" style="position:relative !important;">
							            <div class="btn-group">
							                <button type="button" @click="successPro(pedido.id)" class="btn btn-round btn-success btn-xs" >
										        <strong> Enviar </strong>
										        <i class="material-icons">motorcycle</i>
										    </button>
							            </div>
								    </div>
                                </div>
                            </div>
                        </div>
                        </material-transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mapa modal -->
	<div class="modal fade" id="mapaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-notice">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
		        <h5 class="modal-title title text-center" id="myModalLabel">Domicilio del cliente {{ cliente }}</h5>
		      </div>
		      <div class="modal-body">
		        <div class="instruction text-center">
		        	<span class="title">Donde se encuentrar este icono
		        		<i class="material-icons text-danger">pin_drop</i>
		        		se encuentra el domicilio del cliente
		        	</span>
		        	<div style="width:100%;height:400px; ">
	                    <div style="width: 100%; height: 100%" id="map"></div>
	                </div>
		        </div>
		        <p>Puede habilitar las etiquetas para ver los nombres de las calles.</p>
		      </div>
		      <div class="modal-footer text-center">
		            <button type="button" class="btn btn-rose btn-round" data-dismiss="modal">ok! entendido.</button>
		      </div>
		    </div>
	  	</div>
	</div>
	<!-- end mapa modal -->
	<!-- producto modal -->
	<div class="modal fade" id="proModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-notice">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
			        <h5 class="modal-title title text-center" id="myModalLabel">Domicilio del cliente {{ cliente }}</h5>
			    </div>
		        <div class="modal-body" >
			      	<span v-show="form.descuento">
			      		Este producto tiene un {{ form.descuento }} % de descuento aparatir de {{ form.actides }} unidades.
			      	</span>
	            	<div class="row">
	            		<div class="col-md-6">
	            			<div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="material-icons text-rose">bookmark</i>
								</span>
	                        	<div class="form-group">
									<small>
	                            		<b>Categoria:</b> {{ form.categoria }}
	                            		<span v-show="form.cant_personas">
	                            			<b> # personas:</b> {{ form.cant_personas }}
	                            		</span>
	                            	</small>
							    </div>
							</div>
	                    </div>
	                    <div class="col-md-6">
							<div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="material-icons text-rose">local_offer</i>
								</span>
								<div class="form-group is-empty">
	                            	<small>
	                            		<b>Nombre:</b> {{ form.nombre }}
	                            	</small>
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
	                            <div class="form-group is-empty">
	                            	<small>
	                            		<b>Precio:</b> {{ form.precio }}
	                            	</small>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4">
							<div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="material-icons text-rose">offline_pin</i>
	                            </span>
	                            <div class="form-group is-empty">
	                            	<small>
	                            		<b>Stock:</b> {{ form.stock }}
	                            	</small>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 text-center">
	                    	<img :src="form.foto" alt="Producto foto" style="height: 5em !important" />
	                    </div>
	                </div>
	                <div class="row">
						<div class="input-group text-justify">
		                 	<span class="input-group-addon">
		                        <i class="material-icons text-rose">line_weight</i>
		                    </span>
		                    <div class="form-group is-empty" >
		                		<small>
		                    		<b>Descripción:</b> {{ form.descripcion }}
		                    	</small>
		                    </div>
		                </div>
	              	</div>
	              	<div class="row" v-show="form.oferta">
		              	<div class="input-group">
		                 	<span class="input-group-addon">
		                        <i class="material-icons">line_weight</i>
		                    </span>
		                    <div class="form-group is-empty" >
		                		<small>
		                    		<b>Oferta:</b> {{ form.oferta }}
		                    	</small>
		                    </div>
		              	</div>
		            </div>
	                <div class="row" v-show=" form.categoria==='Almuerzo' ">
	            		<div class="panel panel-default text-center">
	            			<div role="tab" id="headingOne" class="panel-heading " >
	            				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed btn   btn-round btn-sm">
	            					<h4 class="panel-title text-rose">
	                    				¿Menú del Almuerzo?
	                   					<i class="material-icons">keyboard_arrow_down</i>
	                   				</h4>
	                   			</a>
	                   		</div>
	                   		<div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
	                   			<div class="panel-body">
	                                <span class="input-group-addon">
	                                	<span v-show="form.entrada">
	                                        <i class="material-icons text-rose">local_offer</i>
	                                        <small>
			                            		<b>Entrada:</b> {{ form.entrada }}
			                            	</small>
										</span>
	                                    <i class="material-icons text-rose">local_offer</i>
	                                    <small>
		                            		<b>Sopa:</b> {{ form.sopa }}
		                            	</small>
		                            	<i class="material-icons text-rose">local_offer</i>
		                            	<small>
		                            		<b>Segundo:</b> {{ form.segundo }}
		                            	</small>
		                            	<span v-show="form.postre ">
		                            		<i class="material-icons text-rose">local_offer</i>
		                            		<small>
			                            		<b>Postre:</b> {{ form.postre }}
			                            	</small>
		                            	</span>
		                            	<span v-show="form.refresco ">
		                            		<i class="material-icons text-rose">local_offer</i>
		                            		<small>
			                            		<b>Refresco:</b> {{ form.refresco }}
			                            	</small>
		                            	</span>
									</span>
	                   			</div>
	                   		</div>
	                   	</div>
	                </div>
		        </div>
		        <div class="modal-footer text-center">
		            <button type="button" class="btn btn-rose btn-round" data-dismiss="modal">ok! entendido.</button>
		        </div>
		    </div>
	  	</div>
	</div>
	<!-- end mapa modal -->
	<!-- mensaje modal -->
	<div class="modal fade" id="smsclientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-notice">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
			        <h5 class="modal-title title text-center" id="myModalLabel">REALIZA TU CONSULTA</h5>
			    </div>
		        <div class="modal-body">
		        	<hr class="hrcardpe" />
		        	<div class="input-group">
        				<span class="input-group-addon">
        					<i class="material-icons text-rose">email</i>
        				</span>
    					<div class="form-group label-floating  is-empty" :class="{ 'has-error is-focused': form.errors.has('mensaje') }">
    						<label class="control-label">Escriba aqui su mensaje.</label>
    						<textarea rows="2" class="form-control" v-model="form.mensaje"></textarea>
    						<span class="material-input"></span>
    						<has-error :form="form" field="mensaje"></has-error>
    					</div>
    				</div>
		        </div>
		        <div class="modal-footer text-center">
		            <button @click="sendMessage" type="button" class="btn btn-rose btn-round"> <b>Enviar</b> </button>
		        </div>
		    </div>
	  	</div>
	</div>
	<!-- end mensaje modal -->
	</div>
</template>

<script>
	export default {
        data() {
            return {
                pedidos : [],
                deliverys : [],
                delivery : '',
                cliente:'',
                myLatLng: {},
                user:{lat: -19.589263,lng:-65.754102},
                form: new Form({
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
                    categoria:'',
                    mensaje:''
                })
            }
        },
        async mounted() {
		    await this.viewMap(this.user)
		},
        methods: {
        	async viewMap(user){
        		this.cliente = user.fullname;
        		this.myLatLng = {lat: user.lat, lng: user.lng};
        		let map = new google.maps.Map(document.getElementById('map'), {
	                zoom: 15,
	                center: this.myLatLng,
	                mapTypeId: google.maps.MapTypeId.SATELLITE,
	                //scrollwheel: true,
	            });
	            let marker = new google.maps.Marker({
	                position: this.myLatLng,
	                map: map,
	                draggable: false,
	                title: 'Aqui está el cliente!'
	            });
	            const infowindow = new google.maps.InfoWindow({
				    content: "<b>"+user.direccion+"</b>"
				});
	            google.maps.event.addListener(marker, "mouseover", () => {
				    infowindow.open(map, marker);
				});

        	},
        	async loadPedidos(){
                const  resul = await axios.get('api/aceptados');
				this.pedidos = resul.data.data;

				const  re = await axios.get('api/deliverys');
				this.deliverys = re.data.data;
            },
            viewPro(producto){
            	//console.log(producto.fotos[0].imagen);
                this.form.nombre = producto.nombre;
                this.form.codigo = producto.codigo;
                this.form.descripcion = producto.descripcion;
                this.form.descuento = producto.descuento;
                this.form.actides = producto.actides;
                this.form.precio = producto.precio;
                this.form.stock = producto.stock;
                this.form.cant_personas = producto.cant_personas;
                this.form.estado = producto.estado;
                this.form.oferta = producto.oferta;
                this.form.categoria = producto.categoria.nombre;
                this.form.foto = "img/producto/"+producto.fotos[0].imagen;
                if(producto.prodetalle){
                	this.form.entrada = producto.prodetalle.entrada;
	                this.form.sopa = producto.prodetalle.sopa;
	                this.form.segundo = producto.prodetalle.segundo;
	                this.form.postre = producto.prodetalle.postre;
	                this.form.refresco = producto.prodetalle.refresco;
                }
                $('#proModal').modal('show');
            },
            convertMoney(value1, value2){
  	            let money = parseFloat(value1)+parseFloat(value2);
           		return (money.toFixed(2));
		    },
        	successPro(id){
	        	swal.fire({
				  title: 'Estás enviando este pedido?',
				  text: "No podrás revertir esto!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, Enviar!',
				  cancelButtonText: 'Cancelar!'
				}).then((result) => {
				   if (result.value)
				   {
				   	    this.$Progress.start();
				        //axios.get('api/enviados/'+id)
				        //axios.put('api/enviados/'+id, data=this.delivery)
				        axios({
						  method: 'PUT',
						  url: 'api/enviados/'+id,
						  data: {
						    nomdelivery: this.delivery
						  }
						})
				        .then((re)=>{
                            swal.fire(
                                `<b>${re.data.message}</b>`,
                                'El pedido fue ENVIADO al cliente.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                            this.$Progress.finish();
                        }).catch(()=>{
                            swal.fire(
                                'Ooops...!',
                                'Revisa algo salió mal.',
                                'warning'
                            )
                            this.$Progress.fail();
                      })
				   }
				})
        	},
            sendMessage(){
            	this.$Progress.start();
        		this.form.post('api/sendsmsclient')
        		.then((res)=>{
        			Fire.$emit('AfterCreate');
        			swal.fire(
        				`<b>${res.data.message}</b>`,
                        'El mensaje fue enviado correctamente.',
                        'success'
        			)
        			this.form.reset();
        			this.$Progress.finish();
        		})
        		.catch(()=>{
        			swal.fire(
        				'Oops..!',
                        'Existen algunos errores.',
                        'error'
        			)
        			this.$Progress.fail();
        		})
            }
        },
        created(){
        	this.loadPedidos();
        	Fire.$on('AfterCreate',() => {
                this.loadPedidos();
            });
        }
    };
</script>





