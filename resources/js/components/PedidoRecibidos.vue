<template>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                       <div class="profile">
                            <div class="avatar">
                                <img src="/img/secondary/menu.svg" alt="Circle Image" class="img-responsive">
                            </div>
                            <div class="name">
                                <h3 class="title">PEDIDOS - RECIBIDOS</h3>
                            </div>
                        </div>
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
                                        <hr class="hrcardpe" />
                                        <span class="title">Dirección:</span> <small> {{ pedido.user.direccion }} </small>
                                        <hr class="hrcardpe" />
                                        <span v-show="pedido.user.lat">
	                                        <span class="title">Ubicado en el mapa?</span> <span class="text-success"> <b>SI</b> </span> <span class="btn-xs" style="background-color:#e91e63; color:#fff;"> Ver. </span>
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
	                                        			<span class="title">Total:</span>
	                                        			<small> {{ prodetaca.descuento_bs }} Bs.</small>
	                                        		</span>
	                                        		<span class="title">Total:</span>
	                                        		<small> {{ prodetaca.subtotal_bs }} Bs.</small>
	                                        		<span class="btn-xs" style="background-color:#e91e63; color:#fff;"> <b>Ver</b></span>
                                        		</small>
                                        	</li>
                                        </ul>
                                        <hr class="hrcardpe" />
                                        <span class="title">Fecha Pedido:</span> <small> {{ pedido.dates.fecha_orden }} </small>
                                        <hr class="hrcardpe" />
                                        <span class="title">Precio total:</span> <span class="btn btn-round btn-rose btn-xs"> {{ pedido.total_bs }} Bs. </span>
                                        <hr class="hrcardpe" />
                                    </div>
                                    <div class="footer" style="position:relative !important;">
								        <div class="author">
								            <div class="btn-group">
								                <button class="btn btn-round btn-danger btn-xs">
											        <strong> Rechazar</strong>
											        <i class="material-icons ">info</i>
											    </button>
								            </div>
								        </div>
								        <div class="stats">
								            <div class="btn-group">
								                <button class="btn btn-round btn-success btn-xs" >
											        <strong> Aceptar </strong>
											        <i class="material-icons ">check_circle</i>
											    </button>
								            </div>
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
</template>

<script>
	export default {
        data() {
            return {
                pedidos : [],
            }
        },
        methods: {
        	async loadPedidos(){
                const  resul = await axios.get('api/pedidos');
				this.pedidos = resul.data.data;
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


