<template>
	<div class="footer">
        <div class="author">
        	<span class="title">Unid.</span>
            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" @click="cantidad--" v-if="cantidad>=2">
                <i class="material-icons">remove</i> </button>
            <div class="btncant" style="line-height: 1.8;">
            	<input class="letracard" min="1" name="cantidad" v-model="cantidad" value="1" type="number"  >
            </div>
            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" @click="cantidad++"> <i class="material-icons">add</i> </button>
        </div>
        <div class="stats">
            <div class="btn-group">
                <button @click="addToCart" class="btn btn-round btn-rose btn-xs">
			        <strong> {{ message }} </strong>
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
				cantidad: 1
			}
		},
		props: { product: { type: Object } },
		methods:{
			addToCart(){
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
                    swal.fire(
                        'Producto agregado!',
                        'Puede verlo en el carrito de compras.XXX',
                        'success'
                    );
                    this.cantidad = 1;
                    window.store.commit("increment");
                })
			}
		}
	};
</script>

