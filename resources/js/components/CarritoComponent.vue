<template>
	<div class="card-content">
        <div class="table-responsive">
	        <table class="table table-shopping">
	            <thead>
	                <tr class="almuerzo">
	                    <th class="text-center"><b>Producto</b></th>
	                    <th class="text-center"><b>Cantidad</b></th>
	                    <th class="text-center"><b>Sub Total</b></th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr  v-for="(item, index) in items" :key="item.id" :data-index="index">
	                    <td class="td-usertable " colspan="1">
							<div class="media text-left">
	                    		<div class="media-body">
	                    			<h6 class="media-heading ">
										<span class="text-rose">{{ item.nombre }}</span>
	                    			</h6>
	                    			<p class="usertable"  > {{ item.descripcion }}</p>
	                    			<h6 class="media-heading productlist">
										Precio
	                    				<small>: {{ item.precio }}</small> Bs.
	                    			</h6>
	                        	</div>
	                        </div>
	                    </td>
	                    <td class="td-number" colspan="1">
	                        <div class="text-center">
					            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" v-on:input="cantidad--">
					                <i class="material-icons">remove</i> </button>
					            <div class="btncant " style="line-height: 1.8;">
					            	<input class="letracard" style="max-width: 3rem !important;" min="1" name="cantidad" v-on:input="cantidad++" value="1" type="number"  >
					            </div>
					            <button type="button" class="btn btn-round btn-rose btn-xs" style="padding: 4px 8px !important;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"  > <i class="material-icons" >add</i> </button>
					        </div>
	                    </td>
	                    <td class="td-number" colspan="1">
	                    	<div class="text-center">
	                        <small>Bs.</small>549
	                        </div>
	                    </td>
	                </tr>
	                <tr>
	                    <td  class="text-right">
	                       Total: 2,346 <small>Bs.</small>
	                    </td>
	                    <td class="td-number" colspan="2">
	                    	<button type="button" class="btn btn-rose btn-round">
	                    		Realizar Pedido
	                    		<i class="material-icons">keyboard_arrow_right</i>
	                    	</button>
	                    </td>
	                </tr>
	            </tbody>
	        </table>
        </div>
    </div>
</template>
<script>
	export default {
		data() {
            return {
				cantidad: 1,
				cants:[]
			}
		},
		props: ['items'],
		methods: {

		}
	};
</script>