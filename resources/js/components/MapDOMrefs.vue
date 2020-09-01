
<template>
<div class="main main-raised">
    <div class="profile-content" style="margin-top: -100px;">
        <div class="container">

            <div class="col-md-12">
               <div class="profile" style="margin-bottom: -70px;">
                    <div class="avatar">
                        <img src="/img/secondary/cart1.svg" alt="Circle Image" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-tabs" style="margin-top: -12px;">
                        <div class="nav-align-center">
							<div class="wizard"  >
	            				<div class="wizard-inner">
					                <div class="connecting-line"></div>
					                <ul class="nav nav-tabs navbar-rose ulcenter" role="tablist" style="background: #e91e63 !important;">

					                    <li role="presentation" class="active">
					                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Paso 1 - Lista">
					                            <span class="round-tab">
					                                <img src="/img/secondary/cart1.svg" style="width: 90%; vertical-align: initial; margin-top:1px;">
					                            </span>
					                        </a>
					                    </li>

					                    <li role="presentation" class="disabled">
					                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Paso 2 - Datos">
					                            <span class="round-tab">
					                                <img src="/img/welcome/customer.svg" style="width: 90%; vertical-align: initial; margin-top:2px;">
					                            </span>
					                        </a>
					                    </li>
					                    <!--<li role="presentation" class="disabled">
					                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Paso 3 - Confirmar">
					                            <span class="round-tab">
					                                <img src="/img/wizard/stationery.svg" style="width: 90%; vertical-align: initial; margin-top:1px;">
					                            </span>
					                        </a>
					                    </li>-->

					                    <li role="presentation" class="disabled">
					                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completo!">
					                            <span class="round-tab">
					                                <img src="/img/wizard/checked.svg" style="width: 90%; vertical-align: initial; margin-top:2px;">
					                            </span>
					                        </a>
					                    </li>
					                </ul>
					            </div>

				                <div class="tab-content">
				                    <div class="tab-pane active" role="tabpanel" id="step1">
				                    	<h3 class="card-title text-center" >LISTA DE PRODUCTOS</h3>
				                        <div class="table-responsive">
			                                <table class="table ">
			                                    <thead>
			                                        <tr class="almuerzo">
			                                            <th class="text-center">#</th>
			                                            <th class="text-center">Producto</th>
			                                            <th class="text-center">Cantidad</th>
			                                            <th class="text-center">Precio</th>
			                                            <th class="text-center">Descuento</th>
			                                            <th class="text-center">Sub Total</th>
			                                            <th></th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                    	<tr v-for="(cade, index) in carridetas" :key="cade.id" >
						                                <td v-text="cade.id"  ></td>
						                                <td class="td-usertable" >
															<div class="media text-left" style="display: flex !important;  align-items: center !important;">
						                                		<a class="pull-left td-usertable">
						                                			<div class="listcategoria" v-for="foto in cade.producto.fotos" :key="foto.id" >
			                                							<img :src="getFoto(foto.imagen)" class="img img-raised " alt="Producto foto" style="height: 100%;">
			                                						</div>
						                                		</a>
						                                		<div class="media-body" style="width: auto !important;">
						                                			<h6 class="media-heading">
																		{{ cade.producto.nombre }}
																		<small> * <span class="media-heading">Código:</span>  {{ cade.producto.codigo }}</small>
						                                			</h6>
						                                			<p class="usertable" v-text="cade.producto.descripcion"></p>
						                                			<h6 class="media-heading productlist">
						                                				<span v-show="cade.producto.cant_personas">
						                                					* Num. Personas:
						                                					<small>: {{ cade.producto.cant_personas }}</small>
						                                				</span>
						                                				<button class="btn btn-default btn-xs productcate">
						                                					{{ cade.producto.categoria.nombre }}
						                                				</button>
						                                			</h6>
						                                			<h6  class="media-heading productlist" v-if="cade.producto.descuento">
						                                				Descuento: Del
						                                				<button class="btn btn-warning btn-xs productcate">
						                                				   {{ cade.producto.descuento }} %
						                                				</button> Mayor a:
						                                				<small> {{ cade.producto.actides }} </small> Unids.
						                                			</h6>
						                                    	</div>
						                                    </div>
						                                </td>
						                                <td class="td-actions">
        													<i class="material-icons"  v-on:click="cambiarCantidad(index,false)">remove_circle_outline</i>
        														<span class="letracard" style="position:absolute !important;"> {{cade.cantidad}}</span>
        													<i class="material-icons"  v-on:click="cambiarCantidad(index, true)" style="padding-left:1rem !important;">add_circle_outline</i>
			                                            </td>
														<td class="text-center text-default">
						                                	<h6 class="media-heading">
				                                				{{ cade.producto.precio }}
				                                			</h6>
														</td>
						                                <td class="text-center">
						                                	<button class="btn btn-xs productcate" :class="cade.descuento_bs>0 ? 'btn-info' : 'btn-default'">
			                                				    {{ convertMoney(cade.descuento_bs) }} Bs.
			                                				</button>
						                                </td>
						                                <td class="text-center text-rose">
						                                	<h6 class="media-heading">
						                                	    {{ convertMoney((cade.cantidad*cade.producto_precio)-cade.descuento_bs) }}
						                                	</h6>
						                                </td>
						                                <td class="text-center">
						                                	<i @click="deletePro(cade.id)" class="material-icons btn-danger" title="Eliminar Producto">clear</i>
						                                </td>
						                            </tr>
						                            <tr class="text-rose">
						                            	<td class="text-right" colspan="4">
						                            		<b> Total: </b>
						                            	</td>
						                            	<td class="text-left" colspan="2">
						                            		{{onViewTotal()}} Bs.
						                            	</td>
						                            </tr>
			                                    </tbody>
			                                </table>
			                                <div class="pull-right" style="padding-right: 15px;">
					                            <button type="button" class="btn btn-rose btn-round next-step" v-on:click="onSendOrder()">Guardar y continuar</button>
					                        </div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" role="tabpanel" id="step2">
						                <h3 class="card-title text-center" >DATOS DEL USUARIO</h3>
						                <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
						                <div class="card-body">
						                	<form method="POST">
				                            <div class="row ">
				                                <div class="col-md-5">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">face</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('fullname') }">
				                                            <label class="control-label">Nombre completo:</label>
				                                            <input type="text" class="form-control" name="fullname" v-model="form.fullname" autofocus required value=" ">
				                                            <span class="material-input"></span>
				                            				<has-error :form="form" field="fullname"></has-error>
				                                        </div>
				                                    </div>
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">stay_current_portrait</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty " :class="{ 'has-error is-focused': form.errors.has('celular') }">
				                                            <label class="control-label">Número de celular:</label>
				                                            <input v-model.number="form.celular" type="number" class="form-control" name="celular" required >
				                                            <span class="material-input"></span>
				                            				<has-error :form="form" field="celular"></has-error>
				                                        </div>
				                                    </div>
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">room</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty " :class="{ 'has-error is-focused': form.errors.has('direccion') }">
				                                            <label class="control-label">Detalle su dirección especifica:</label>
				                                            <textarea class="form-control bg-light border-0" :class="{ 'has-error is-focused': form.errors.has('direccion') }" name="direccion" id="direccion" rows="2" v-model.trim="form.direccion" required > </textarea>
				                                            <span class="material-input"></span>
				                            				<has-error :form="form" field="direccion"></has-error>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="col-md-7 big-map">
				                                    <div class="form-group">
				                                        <h6 class="title" style="margin-top:1px; margin-bottom:1px;" >
				                                    		Mueva el icono <i class="material-icons text-rose">room</i>  en donde esta su casa exactamente.
				                                    	</h6>
				                                        <input type="hidden" name="lat" id="lat" v-model="form.lat" ref="posilat" />
				                                        <input type="hidden" name="lng" id="lng" v-model="form.lng" ref="posilng" />
				                                    </div>
				                                    <div style="width:100%;height:400px; ">
				                                        <div style="width: 100%; height: 100%" id="map"></div>
				                                    </div>
				                                </div>
				                            </div>

					                        <ul class="list-inline pull-right">
				                            	<li>
				                            		<button type="button" class="btn btn-default prev-step">Atrás</button>
				                            	</li>
				                            	<li>
				                            		<button @click.prevent="infoPerson" type="submit" class="next-step btn btn-rose btn-round">Continuar</button>
				                        		</li>
				                        	</ul>
				                        	</form>
						            	</div>
				                    </div>
				                    <!--<div class="tab-pane" role="tabpanel" id="step3">
				                        <h3>Step 3</h3>
				                        <p>This is step 3</p>
				                        <ul class="list-inline pull-right">
				                            <li><button type="button" class="btn btn-default prev-step">Atrás</button></li>
				                            <li><button type="button" class="btn btn-default next-step">Omitir</button></li>
				                            <li>
				                            	<button    type="button" class="btn btn-rose btn-round btn-info-full next-step">Guardar y continuar</button>
				                            </li>
				                        </ul>
				                    </div>-->
				                    <div class="tab-pane" role="tabpanel" id="complete">
				                        <h3 class="card-title text-center"> DATOS GENERALES </h3>
						                <div class="col-md-4 col-md-offset-4" style="padding-right: 0px; padding-left: 0px;">
				                            <div class="card card-blog shadow" style="background-color: #f2f2f2;">
				                                <div class="card-image">
				                                    <a href="#">
				                                        <img src="img/welcome/logo.png" class="imgcard"  alt="Producto foto" style="height: 100%;" />
				                                    </a>
				                                </div>
				                                <div class="card-pricing card-content">
			                                        <ul class="list-unstyled">
			                                            <li >
			                                            	<b><i class="material-icons text-rose">contacts</i> Nombre:</b> Jorge Denys Peralta
			                                            </li>
			                                            <li>
			                                            	<b> <i class="material-icons text-rose">tap_and_play</i> Celular:</b> 75729198
			                                            </li>
			                                            <li class="card-description text-justify">
			                                            	<b><i class="material-icons text-rose text-rose">my_location</i> Dirección</b> Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Sunt delectus magnam id, optio provident.
			                                            </li>
			                                            <li class="card-description text-justify">
			                                            	<b> <i class="material-icons text-rose">local_offer</i> Especificación:</b> Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Sunt delectus magnam id, optio provident.
			                                            </li>
			                                            <li><i class="material-icons text-success">check</i> <i class="material-icons text-rose">pin_drop</i> Con datos en el mapa</li>
			 											<li>
			 												<i class="material-icons text-danger">close</i>
			 												<i class="material-icons text-rose">pin_drop</i>  Sin datos en el mapa
			 											</li>
			 											<li>
			 												<b><i class="material-icons text-rose">local_grocery_store</i> En producto:</b> 107 Bs.
			 											</li>
			 											<li>
			 												<b> <i class="material-icons text-rose">motorcycle</i> Delivery:</b> 10 Bs.
			 											</li>
			                                        </ul>
				                                    <h6 class="card-title">Total</h6>
			                                        <h1 class="card-title"><small>Bs.</small>117</h1>
			                                        <a href="#pablo" class="btn btn-rose btn-round">
			                                            <b> ENVIAR PEDIDO </b>
			                                        </a>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="clearfix"></div>
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
            	carridetas : [],
            	desmessage: '0.00',
            	error: '',
            	myLatLng: {lat: -19.589263, lng: -65.754102},
                form: new Form({
                	fullname: '',
                	celular:'',
                	direccion:'',
                	lat:'',
                	lng:'',
                	especificacion:''
                })
			}
		},
		async mounted() {
		    await this.initializeMap()
		},
		methods: {
			getFoto(ufoto){
        		let foto = "img/producto/"+ufoto;
                return foto;
        	},
			async loadProductos(){
                //axios.get('api/user').then(({data}) => (this.users = data));
                const  resul = await axios.get('/carripro');
				//console.log(resul.data.data);
				this.carridetas = resul.data.data;
				//console.log(this.users);

            },
            cambiarCantidad(index,type){
              // sacar variable de carrito
              const dataCar = this.carridetas

              // sacar la cantidad de producto
              let cantd = dataCar[index].cantidad;
              let desbs = dataCar[index].descuento_bs;
              let subbs = dataCar[index].subtotal_bs;

              let descubs = ((dataCar[index].producto.descuento*dataCar[index].producto_precio)/100);

              if (type) {
                cantd = cantd + 1
                if(cantd > dataCar[index].producto.actides){
                	//desbs = desbs+descubs
                	desbs = cantd*descubs
                }
                subbs = (cantd*dataCar[index].producto_precio)-desbs
              }
              else if (type==false&&cantd>=1) {
                cantd = cantd - 1
                if(cantd <= dataCar[index].producto.actides){
                	desbs = 0
                }else{
                	desbs = desbs-descubs
                }
                subbs = (cantd*dataCar[index].producto_precio)-desbs
              }

              if ((type==false&&cantd>=1)||type) {
                dataCar[index].cantidad = cantd

                dataCar[index].descuento_bs = desbs
                dataCar[index].subtotal_bs = subbs

                this.carridetas
              }

          	},
          	convertMoney(value){
		        const formatterPeso = new Intl.NumberFormat('es-CO', {
		            style: 'currency',
		            currency: 'COP',
		            minimumFractionDigits: 0
		        })
		        let valueFinal = formatterPeso.format(value);
		        return valueFinal
		    },
          	onViewTotal(){
	            let total = 0
	            this.carridetas.map((data)=>{
	              	//total = total + parseFloat(data.subtotal_bs)
	              	total = total + ((data.cantidad * data.producto.precio)-data.descuento_bs)
	            })
	            return this.convertMoney(total)
	        },
	        deletePro(id){
	        	swal.fire({
				  title: '¿Estás seguro?',
				  text: "No podrás revertir esto!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, Eliminar!'
				}).then((result) => {
				   if (result.value)
				   {
				      axios.delete('carripro/'+id).then(()=>{
                            swal.fire(
                                'Deleted!',
                                'El producto eliminado de tu carrito.',
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
        	onSendOrder(){
                this.$Progress.start();
                axios.post('carriproductos',this.carridetas)
                .then(() => {
                    swal.fire(
                        'Ok. continua.!',
                        'Tu carrito de compras se guardo con éxito.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            initializeMap(){
            	/*Inicio el mapa con la ubicacion señalada en myLatLng*/
				let map = new google.maps.Map(document.getElementById('map'),
			    {
			        center: this.myLatLng,
			        mapTypeId: google.maps.MapTypeId.SATELLITE,
			        scrollwheel: true,
			        zoom: 16
			    });
				//hasta aqui se ve el mapa

				/*Inicio el icono para que se mueva*/
			    let marker = new google.maps.Marker({
			      map: map,
			      draggable: true,
			      position: this.myLatLng,
			      title: 'Mové esto a tu casa!'
			    });
			    //agarro las coordenadas de la posición donde mueva

			    google.maps.event.addListener(marker,'position_changed',function(){
			        let lat = marker.getPosition().lat();
			        let lng = marker.getPosition().lng();
			        $('#lat').val(lat);
			        $('#lng').val(lng);
			    });
			    //console.log(posilat);
			    //hasta aqui muestro el icono con  lat, lng

			    /*Aqui inicio con el cuadro de busqueda*/
			    /*let input = document.getElementById('autocomplete');
	          	let searchBox = new google.maps.places.SearchBox(input);
	          	// Sesgar los resultados del Cuadro de búsqueda hacia los mapas actuales de la vista.
		        map.addListener('bounds_changed', function() {
		            searchBox.setBounds(map.getBounds());
		        });
		        let markers = [];
		        //Detecta el evento cuando el usuario escribe una predicción y recuperar más detalles para ese lugar
		        searchBox.addListener('places_changed', function()
		        {
		            let places = searchBox.getPlaces();
		            if (places.length == 0) {
		            	return;
		            }
		            // Borrar los viejos marcadores.
		            markers.forEach(function(marker) {
		            	marker.setMap(null);
		            });
		            markers = [];
		            // Para cada lugar, obtener el icono, el nombre y la ubicación.
		            let bounds = new google.maps.LatLngBounds();
		            places.forEach(function(place) {
		              	let icon = {
		                	url: place.icon,
		                	size: new google.maps.Size(71, 71),
		                	origin: new google.maps.Point(0, 0),
		                	anchor: new google.maps.Point(17, 34),
		                	scaledSize: new google.maps.Size(25, 25)
		            	};
		              	// Cree un marcador para cada lugar.
		              	markers.push(new google.maps.Marker({
			                map: map,
			                icon: icon,
			                title: place.name,
			                position: place.geometry.location
			            }));
			            if (place.geometry.viewport) {
			            	//Sólo los códigos geográficos tienen ventana.
			                bounds.union(place.geometry.viewport);
			            } else {
			                bounds.extend(place.geometry.location);
			            }
		            });
		            map.fitBounds(bounds);
		        });*/
		        //hasta aqui detecta lo que escribe el evento

		        /*Aqui detectamos la ubicación*/
	    		/*let infoWindow = new google.maps.InfoWindow({map: map});
	      		// Empieza la Geolocalización con HTML5
	    		if (navigator.geolocation) {
	        		navigator.geolocation.getCurrentPosition(function(position) {
	          			let pos = {
				            lat: position.coords.latitude,
				            lng: position.coords.longitude
				        };
				        infoWindow.setPosition(pos);
				        infoWindow.setContent('¡Tú ubicación!');
				        map.setCenter(pos);
	        		}, function() {
			          	handleLocationError(true, infoWindow, map.getCenter());
			        });
	      		} else {
	        		// Si el navegador no admite la localización
	        		handleLocationError(false, infoWindow, map.getCenter());
	    		}
	    		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	          		infoWindow.setPosition(pos);
	          		infoWindow.setContent(browserHasGeolocation ?
	                                'Habilite el servicio de geolocalización en su dispositivo.' :
	                                'Error: Su navegador no admite geolocalización.');
	        	}*/
            },
            getPosition(){
            	this.form.lat = this.$refs.posilat.value
        		this.form.lng = this.$refs.posilng.value
        		if(this.form.lat !=""){
        			Fire.$emit('AfterCreate');
        			this.$Progress.start();
        			swal.fire(
						'Ok. continua.!',
		                'Puedes continuar.',
		                'success'
    				)
        			this.$Progress.finish();
        		}else{
        			swal.fire(
						'El icono rojo!',
		                'Muevalo donde su casa.',
		                'error'
    				)
        			this.$Progress.fail();
        		}

            },
            infoPerson(){
            	this.form.lat = this.$refs.posilat.value
        		this.form.lng = this.$refs.posilng.value
        		//console.log(this.form.lat);
        		this.$Progress.start();
        		this.form.post('/infoperson')
        		.then(()=>{
        			Fire.$emit('AfterCreate');
        			swal.fire(
        				'Ok. continua.!',
                        'La información del usuario fue guardada.',
                        'success'
        			)
        			this.$Progress.finish();
        		})
        		.catch(()=>{
        			this.$Progress.fail();
        		})
        	}
		},
        created(){
        	this.loadProductos();
        	Fire.$on('AfterCreate',() => {
                this.loadProductos();
            });
        },
        watch: {
        	initializeMap(){
        		this.form.lat = this.$refs.posilat.value
        		this.form.lng = this.$refs.posilng.value
        	}
        }
	};
</script>