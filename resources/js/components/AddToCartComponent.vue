<template>
	<div class="footer">
        <div class="author">
        	<span class="title">Cant.</span>
            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" @click="cantidad--" v-if="cantidad>=2">
                <i class="material-icons">remove</i> </button>
            <div class="btncant" style="line-height: 1.8;">
            	<input class="letracard" min="1" name="cantidad" v-model="cantidad" value="1" type="number"  >
            </div>
            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" @click="cantidad++"> <i class="material-icons">add</i> </button>
        </div>
        <div class="stats">
            <div class="btn-group">
                <button @click="addToCart(producto)" class="btn btn-round btn-rose btn-xs" :disabled="estaEnCarrito(producto)">
			        <strong v-if="!estaEnCarrito(producto)"> {{ message }} </strong>
			        <strong v-else>Agregado</strong>
			        <i class="material-icons" >add_shopping_cart</i>
			    </button>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
            return {
				message: 'Añadir',
				endpoint:'/producto_detalles',
				cantidad: 1,
				carrito : this.carri,
				producto: this.product
			}
		},
		props: { product: Object, carri: Array },
		methods:{
			addToCart(producto){
				axios({
					method: 'POST',
					url: this.endpoint,
					data: {
						producto_id: this.product.id,
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
                    this.cantidad = 1;
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
		}
	};
</script>

