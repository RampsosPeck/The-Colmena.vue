/*WIZARD*/
<style>
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 4px;
    background: #fff;
    position: absolute;
    width: 70%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 3px solid #3C4858;

}
.wizard li.active span.round-tab i{
    color: #3C4858;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #3C4858;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #3C4858;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 30px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }


    .pac-item {
    	font-size:  16px;
    	cursor:  pointer;
    }
    .pac-item-query {
    	font-size:  16px;
    }
}
</style>
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
					                <ul class="nav nav-tabs navbar-rose" role="tablist" style="background: #e91e63 !important;">

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
					                    <li role="presentation" class="disabled">
					                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Paso 3 - Confirmar">
					                            <span class="round-tab">
					                                <img src="/img/wizard/stationery.svg" style="width: 90%; vertical-align: initial; margin-top:1px;">
					                            </span>
					                        </a>
					                    </li>

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
				                            <div class="row ">
				                                <div class="col-md-5">
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">face</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty" :class="{ 'has-error is-focused': form.errors.has('fullname') }">
				                                            <label class="control-label">Nombre completo:</label>
				                                            <input type="text" class="form-control" name="fullname" autofocus required value=" ">
				                                            <span class="material-input"></span>
				                            				<has-error :form="form" field="fullname"></has-error>
				                                        </div>
				                                    </div>
				                                    <div class="input-group">
				                                        <span class="input-group-addon">
				                                            <i class="material-icons text-rose">stay_current_portrait</i>
				                                        </span>
				                                        <div class="form-group label-floating is-empty " :class="{ 'has-error is-focused': form.errors.has('celular') }">
				                                            <label class="control-label">Celular:</label>
				                                            <input type="number" class="form-control" name="celular" required value=" ">
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
				                                            <textarea class="form-control bg-light border-0" :class="{ 'has-error is-focused': form.errors.has('direccion') }" name="direccion" id="direccion" rows="3" > </textarea>
				                                            <span class="material-input"></span>
				                            				<has-error :form="form" field="direccion"></has-error>
				                                        </div>
				                                    </div>

				                                    <div class="media media-post" style="margin-top:1px;">
				                                    	<h6 class="title" style="margin-top:1px; margin-bottom:1px;" >
				                                    		Click en la imagen para capturar su Ubicación o sino escriba.
				                                    	</h6>
				                                    	<div class="alert alert-danger" role="alert" v-show="error">
											            	{{ error }}
											            </div>
			                                          	<a class="pull-left author" href="#">
			                                              	<div class="listcategoria" >
			                                                    <img class="media-object" alt="64x64" src="/img/wizard/map.svg" @click="locatorButton" />
			                                              	</div>
			                                          	</a>
				                                        <div class="media-body" style="width: 10000px !important;">
															<input type="text" name="address" v-model="address" id="autocomplete" class="form-control" placeholder="Direccíon Ejm. Las Delicias, Potosi, Bolivia."/>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="col-md-7 big-map">
				                                    <div class="form-group">
				                                        <h6 class="title" style="margin-top:1px; margin-bottom:1px;" >
				                                    		Mueva el icono <i class="material-icons text-rose">room</i>  en donde esta su casa exactamente.
				                                    	</h6>
				                                        <input type="hidden" name="lat" id="lat"/>
				                                        <input type="hidden" name="lng" id="lng" />
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
				                            		<button type="button" class="btn btn-rose btn-round next-step">Guardar y continuar</button>
				                            	</li>
				                        	</ul>
						            	</div>
				                    </div>
				                    <div class="tab-pane" role="tabpanel" id="step3">
				                        <h3>Step 3</h3>
				                        <p>This is step 3</p>
				                        <ul class="list-inline pull-right">
				                            <li><button type="button" class="btn btn-default prev-step">Atrás</button></li>
				                            <li><button type="button" class="btn btn-default next-step">Omitir</button></li>
				                            <li><button type="button" class="btn btn-rose btn-round btn-info-full next-step">Guardar y continuar</button></li>
				                        </ul>
				                    </div>
				                    <div class="tab-pane" role="tabpanel" id="complete">
				                        <h3>Complete</h3>
				                        <p>You have successfully completed all steps.</p>
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
            	address: "",
            	error: '',
                form: new Form({
                	fullname: '',
                	celular:'',
                	direccion:''
                })
			}
		},
		mounted(){
			let autocomplete = new google.maps.places.Autocomplete(document.getElementById("autocomplete"),{
					bounds: new google.maps.LatLngBounds(
						new google.maps.LatLng( -65.7530600, -19.5836100)
					)
			});
			autocomplete.addListener("place_changed", () => {
				let place = autocomplete.getPlace();
				console.log(place);
				this.showUserLocationOnTheMap(
					place.geometry.location.lat(),
					place.geometry.location.lng()
				);
			});
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
                        'Excelente!',
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
            locatorButton(){
            	if(navigator.geolocation){
            		navigator.geolocation.getCurrentPosition(
            			position=>{
	            			this.getAddressFrom(
	            				position.coords.latitude,
	            				position.coords.longitude
	            			);
	            			//console.log(position.coords.latitude);
	            			//console.log(position.coords.longitude);
	            			this.showUserLocationOnTheMap(
	            				position.coords.latitude,
	            				position.coords.longitude
	            			);
	            		},
            			error=>{
            				this.error = "El localizador no puede encontrar su dirección. Escriba su dirección manualmente.";
            				console.log(error.message);
            			}
            		);
            	}else{
            		this.error = "Su navegador no es compatible con la API de geolocalización.";
            		console.log("Su navegador no es compatible con la API de geolocalización.");
            	}
            },
            getAddressFrom(lat, long){
            	axios.get("https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/geocode/json?latlng="
            		+ lat +
            		","
            		+ long
            		+ "&key=AIzaSyAGWmTpyFKvxX4Z5q6O11yWCgWRamgviGY" )
            	.then(response => {
            		if(response.data.error_message){
            			this.error = response.data.error_message;
            			console.log(response.data.error_message);
            		}else{
            			this.address = response.data.results[0].formatted_address;
            			console.log(response.data.results[0].formatted_address);
            		}
            	}).catch(error => {
            		this.error = error.message;
            		console.log(error.message);
            	});
            },
            showUserLocationOnTheMap(latitude, longitude){
            	//Craete A Map Object
            	let map = new google.maps.Map(document.getElementById("map"),{
            		zoom: 15,
            		center: new google.maps.LatLng(latitude, longitude),
            		mapTypeId: google.maps.MapTypeId.SATELLITE
            	});

            	//Add Marker
            	new google.maps.Marker({
            		position: new google.maps.LatLng(latitude, longitude),
            		map: map
            	});
            }
		},
        created(){
        	this.loadProductos();
        	Fire.$on('AfterCreate',() => {
                this.loadProductos();
            });
        },
        computed: {
        }
	};
</script>