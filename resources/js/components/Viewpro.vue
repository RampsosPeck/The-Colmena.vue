<template>
<div class="product-page">
    <div class="container">
        <div class="main main-raised main-product" style="margin: -10vh 0px 0px;">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                   <div class="tab-content">
						<img :src="getFotocate()" alt="Foto Usuario"  class=" img-rounded" style="background-color:#fff;">
                    </div>
                    <ul class="navbar flexi-nav list-inline" style="box-shadow: none; background-color:rgba(233, 32, 99, 0.46); border-radius:30px;" role="tablist" id="flexiselDemo1">
						<li v-for="(foto, index) in fotos" :key="foto.id" >
							<a role="tab" data-toggle="tab" aria-expanded="false" style="border-color:none;">
								<img :src="getFotopro(foto.imagen)"  alt="Producto foto" style="max-width: 70px;" @click.prevent="mosFoto(foto.id)" >
							</a>
						</li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6">
					<h2 class="title text-center"> {{ producto.nombre }} </h2>
					<h3 class="main-price" style="margin-bottom: 5px;">
						<b>Precio:</b>
						<span class="text-rose">{{ producto.precio }}</span>
						<b>Bs.</b>
					</h3>
					<small class="text-muted"> <b>Código:</b> {{ producto.codigo }}</small>
					<div id="acordeon">
	                    <div class="panel-group" id="accordion">
		                    <div class="panel panel-border panel-rose">
		                        <div class="panel-heading" role="tab" id="headingOne">
		                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		                                <h4 class="panel-title">
		                                <span class="text-rose"><b> Descripción </b></span>
		                                <i class="material-icons">keyboard_arrow_down</i>
		                                </h4>
		                            </a>
		                        </div>
		                        <div id="collapseOne" class="panel-collapse collapse in">
		                          <div class="panel-body text-justify">
		                            <b>{{ producto.descripcion }}</b>
		                          </div>
		                        </div>
		                    </div>
		                    <div class="panel panel-border panel-default" v-if="producto.prodetalle">
		                        <div class="panel-heading" role="tab" id="headingOne">
		                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseOne">
		                                <h4 class="panel-title">
		                                <span class="text-rose"><b> Menú </b></span>
		                                <i class="material-icons">keyboard_arrow_down</i>
		                                </h4>
		                            </a>
		                        </div>
		                        <div id="collapseTwo" class="panel-collapse collapse">
			                        <div class="panel-body" style="padding-left:30px;">
			                        	<h6 v-show="producto.prodetalle.entrada"><b>Entrada:</b> {{ producto.prodetalle.entrada }}</h6>
			                        	<h6 v-show="producto.prodetalle.sopa"><b>Sopa:</b> {{ producto.prodetalle.sopa }}</h6>
			                        	<h6 v-show="producto.prodetalle.segundo"><b>Segundo:</b> {{ producto.prodetalle.segundo }}</h6>
			                        	<h6 v-show="producto.prodetalle.refresco"><b>Refresco:</b> {{ producto.prodetalle.refresco }}</h6>
			                        	<h6 v-show="producto.prodetalle.postre"><b>Postre:</b> {{ producto.prodetalle.postre }}</h6>
			                        </div>
		                        </div>
		                    </div>
		                    <div class="panel panel-border panel-default" v-if="producto.descuento">
		                        <div class="panel-heading" role="tab" id="headingOne">
		                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoo" aria-controls="collapseOne">
		                                <h4 class="panel-title">
		                                <span class="text-rose"><b> Descuento </b></span>
		                                <i class="material-icons">keyboard_arrow_down</i>
		                                </h4>
		                            </a>
		                        </div>
		                        <div id="collapseTwoo" class="panel-collapse collapse">
			                        <div class="panel-body text-justify">
			                            <b>Este producto tiene un <span class="text-rose"> {{ producto.descuento }}% </span> de descuendo, a partir de una cantidad mayor a {{ producto.actides }} productos.</b>
			                        </div>
		                        </div>
	                        </div>
	                        <div class="panel panel-border panel-default" v-if="producto.oferta">
		                        <div class="panel-heading" role="tab" id="headingOne">
		                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
		                                <h4 class="panel-title">
		                                <span class="text-rose"><b> Oferta </b></span>
		                                <i class="material-icons">keyboard_arrow_down</i>
		                                </h4>
		                            </a>
		                        </div>
		                        <div id="collapseThree" class="panel-collapse collapse">
			                        <div class="panel-body text-justify">
			                            <b>{{ producto.oferta }}</b>
			                        </div>
		                        </div>
	                        </div>
	                    </div>
                    </div>
		            <div class="row pick-size">
                        <div class="col-md-6 col-sm-6">
                            <b><span class="text-rose">Stock: </span>{{ producto.stock }} </b>
                        </div>
                        <div class="col-md-6 col-sm-6" v-if="producto.cant_personas">
                            <b><span class="text-rose">Cantidad-Personas: </span>{{ producto.cant_personas }} </b>
                        </div>
                    </div>
                    <div class="row text-center">
                    	<div class="form-group">
				            <div class="btn-group">
				                <button @click="addToCart(producto)" class="btn btn-round btn-rose " :disabled="estaEnCarrito(producto)">
							        <strong v-if="!estaEnCarrito(producto)"> {{ message }} </strong>
							        <strong v-else>Agregado</strong>
							        <i class="material-icons" >add_shopping_cart</i>
							    </button>
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
				producto: Object,
				fotos: [],
				url:'',
				message:'Añadir al carrito',
				carrito:[],
				cantidad:1
			}
		},
		methods:{
			getFotopro(profo){
                let foto = "/img/producto/"+profo;
                //console.log(foto);
                return foto;
            },
            mosFoto(idfo){
            	let imagen = ''
	            this.fotos.map((data)=>{
	              	if(data.id == idfo){
	              		imagen = data.imagen
	              	}
	            })
	            this.url = this.getFotopro(imagen);
	            return  this.getFotopro(imagen)
            },
            getFotocate(){
            	let foto = '';
            	if(!this.url){
            		this.fotos.map((data)=>{
		              	if(data.favorito == true){
		              		foto = data.imagen
		              	}
		            })
		            return this.getFotopro(foto);
            	}else{
            		foto = this.url;
                	return foto;
            	}
        	},
			async loadPro(){
                const  resul = await axios.get(`/api/viewpro/${this.$route.params.slug}`);
				//console.log(resul);
				this.producto = resul.data.data;
				this.fotos = this.producto.fotos;
            },
            addToCart(producto){
				axios({
					method: 'POST',
					url: '/producto_detalles',
					data: {
						producto_id: this.producto.id,
						cantidad: this.cantidad,
					},
					headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
					}
				}).then(() => {
					this.carrito.push(producto);
                    swal.fire(
                        'Producto agregado!',
                        'Puede verlo en el carrito de compras.',
                        'success'
                    );
                    window.store.commit("increment");
                })
			},
        	estaEnCarrito(producto){
        		const item = this.carrito.find(item => item.id === producto.id);
        		if(item){
        			return true;
        		}
        		return false;
        	}
		},
     	created() {
        	this.loadPro();
        	Fire.$on('AfterCreate',() => {
                this.loadPro();
            });
        }
	};
</script>

