<template>
	<li>
        <a href="" target="_blank" class="btn btn-rose btn-round btn-sm" data-toggle="tooltip" data-placement="bottom" title="Carrito/Compras">
            <img src="/img/secondary/cart.svg" alt="pedidos" width="30" class="nav-icon" ><b>
             Carrito</b>
             <span class="label label-warning"> {{ productsCount }}</span>
        </a>
    </li>
</template>
<script>
	export default {
		props: ["count"],
		created(){
			 window.store.commit("set", this.count)
		},
		computed: {
			productsCount(){
				return window.store.state.productsCount;
			}
		}
	};
</script>

