<style>
.card-img-top {
    width: 100%;
    /*height: 25vw;*/
    height: 350px;
    /*object-fit: cover;*/
}
</style>
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
                                <h3 class="title">CATÁLOGO - MENÚ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 follow">
                        <router-link to="/carrito" @click.native="$router.go()" class="btn btn-fab btn-rose" rel="tooltip" title="Carrito de compras">
                            <i class="material-icons">local_grocery_store</i>
                        </router-link>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="profile-tabs" style="margin-top: 2px;">
                            <div class="nav-align-center">
                                <ul class="nav nav-pills nav-pills-rose nav-pills-icons" role="tablist">
                                    <li class="active">
                                        <a href="#tortas" role="tab" data-toggle="tab">
                                            <img src="/img/secondary/torta.svg"  class="material-icons img-responsive">
                                            TORTAS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#comidas" role="tab" data-toggle="tab">
                                            <img src="/img/secondary/comida2.svg"  class="material-icons img-responsive">
                                            COMIDAS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#varios" role="tab" data-toggle="tab">
                                            <img src="/img/secondary/store.svg"  class="material-icons img-responsive">
                                            VARIOS
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="tortas">
                        <material-transition tag="div"  class="row">
                            <div v-for="(torta, index) in tortas" :key="torta.id" :data-index="index">
                            <div class="col-md-3  ">
                                <div class="card card-blog card-img-top shadow" style="background-color: #f2f2f2;">
                                    <div class="card-image">
                                        <div class="ribbon ribbon-top-right " v-show="torta.descuento">
                                            <span><strong> {{ torta.descuento }} % DTO. </strong></span>
                                        </div>
                                        <a href="#pablo">
                                            <label class="cardprecio label label-primary" > Bs. <strong>{{ torta.precio }} </strong> </label>
                                            <span v-for="foto in torta.fotos" :key="foto.id" v-show="torta.fotos.length>0">
                                                <img :src="getFoto(foto.imagen)" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                            </span>
                                            <span v-show="!torta.fotos.length>0">
                                                <img src="/img/producto/panal1.png" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                            </span>
                                        </a>
                                    </div>

                                    <div class="card-content">
                                        <h4 class="card-title text-center">
                                            <a href="#pablo"> {{ torta.nombre }} </a>
                                        </h4>
                                        <p class="card-description text-justify cut-text" style="margin-bottom: 0px;">
                                            {{ torta.descripcion }}
                                        </p>
                                    </div>
                                    <add-producto-btn v-bind:product="torta" v-bind:carri="carrito"> </add-producto-btn>
                                </div>
                            </div>
                            </div>
                        </material-transition>
                    </div>
                    <div class="tab-pane" id="comidas" >
                        <div class="row">
                            <div class="col-md-3" style="margin-top:35px;">
                                <div class="card" style="background-color:rgba(233, 32, 99, 0.46);" v-for="(almu, index) in almuerzo" :key="almu.id">
                                    <div class="card-image">
                                        <div class="ribbon ribbon-top-right">
                                            <span><strong> {{ almu.precio }} Bs. </strong></span>
                                        </div>
                                        <a href="#pablo">
                                        <span v-for="foto in almu.fotos" :key="foto.id">
                                            <img :src="getFoto(foto.imagen)" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                        </span>
                                        </a>
                                    </div>
                                    <div class="card-content card-pricing"  >
                                        <h4 class="title ">ALMUERZO FAMILIAR</h4>
                                        <ul>
                                            <li v-show="almu.prodetalle.entrada"><b>Entrada:</b>
                                               <span class="text-width title">{{ almu.prodetalle.entrada }}</span>
                                            </li>
                                            <li v-show="almu.prodetalle.sopa"><b>Sopa:</b>
                                                <span class="text-width title">{{ almu.prodetalle.sopa }}</span>
                                            </li>
                                            <li v-show="almu.prodetalle.segundo"><b>Segundo:</b>
                                                <span class="text-width title">{{ almu.prodetalle.segundo }}</span>
                                            </li>
                                            <li v-show="almu.prodetalle.postre"><b>Refresco:</b>
                                                <span class="text-width title">{{ almu.prodetalle.refresco }}</span>
                                            </li>
                                            <li v-show="almu.prodetalle.refresco"><b>Postre:</b>
                                                <span class="text-width title">{{ almu.prodetalle.refresco }}</span>
                                            </li>
                                        </ul>
                                        <p class="card-description text-width title text-justify" style="margin-bottom: 0px;">
                                            {{ almu.descripcion }}
                                        </p>
                                    </div>
                                    <hr style="height: 20px !important;">
                                    <add-producto-btn v-bind:product="almu" v-bind:carri="carrito"> </add-producto-btn>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h4 class="title">Platos extras</h4>
                                <div class="row collections">
                                    <div v-for="(comida, index) in comidas" :key="comida.id">
                                    <div class="col-md-4">
                                        <div class="card card-img-top card-blog shadow" style="background-color: #f2f2f2;">

                                            <div class="card-image">
                                                <div class="ribbon ribbon-top-right " v-show="comida.descuento">
                                                    <span><strong> {{ comida.descuento }}% DTO. </strong></span>
                                                </div>
                                                <a href="#pablo">
                                                <label class="cardprecio label label-primary" >
                                                    Bs. <strong>{{ comida.precio }} </strong>
                                                </label>
                                                    <span v-for="foto in comida.fotos" :key="foto.id" v-show="comida.fotos.length>0">
                                                        <img :src="getFoto(foto.imagen)" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                                    </span>
                                                    <span v-show="!comida.fotos.length>0">
                                                        <img src="/img/producto/panal1.png" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="card-content">
                                                <h4 class="card-title text-center">
                                                    <a href="#pablo">{{ comida.nombre }}</a>
                                                </h4>
                                                <p class="card-description text-justify cut-text" >
                                                    {{ comida.descripcion }}
                                                </p>
                                            </div>
                                            <hr>
                                            <add-producto-btn v-bind:product="comida" v-bind:carri="carrito"> </add-producto-btn>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="varios" >
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div v-for="(vario, index) in varios" :key="vario.id">
                                <div class="col-md-6">
                                    <div class="card card-img-top card-blog shadow" style="background-color: #f2f2f2;">
                                        <div class="card-image">
                                            <div class="ribbon ribbon-top-right " v-show="vario.descuento">
                                                <span><strong> {{ vario.descuento }}% DTO. </strong></span>
                                            </div>
                                            <a href="#pablo">
                                            <label class="cardprecio label label-primary" > Bs. <strong>{{ vario.precio }}</strong> </label>
                                            <span v-for="foto in vario.fotos" :key="foto.id" v-show="vario.fotos.length>0">
                                                <img :src="getFoto(foto.imagen)" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                            </span>
                                            <span v-show="!vario.fotos.length>0">
                                                <img src="/img/producto/panal1.png" class="imgcard"  alt="Producto foto" style="height: 100%;">
                                            </span>
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title text-center">
                                                <a href="#pablo">{{ vario.nombre }}</a>
                                            </h4>
                                            <p class="card-description text-justify cut-text" style="margin-bottom: 0px;">
                                                {{ vario.descripcion }}
                                            </p>
                                        </div>
                                        <add-producto-btn v-bind:product="vario" v-bind:carri="carrito"> </add-producto-btn>
                                    </div>
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
                productos : [],
                categorias : [],
                tortas : [],
                comidas : [],
                almuerzo : [],
                varios : [],
                carrito : [],
                form: new Form({
                    id:'',
                    nombre: '',
                    codigo: '',
                    descripcion: '',
                    descuento: '',
                    precio: '',
                    stock: '',
                    cant_personas: '',
                    oferta: '',
                    estado:'',
                    entrada:'',
                    sopa:'',
                    segundo:'',
                    postre:'',
                    refresco:'',
                    especificacion:'',
                    foto:'',
                    categoria:''
                })
            }
        },
        methods:{
            getFoto(ufoto){
                let foto = "img/producto/"+ufoto;
                return foto;
            },
            async loadProductos(){
                //axios.get('api/user').then(({data}) => (this.users = data));

                const  resul = await axios.get('api/productos');
                //console.log(resul);
                this.productos = resul.data.data;
                //console.log(this.users);

                const  cat = await axios.get('api/categorias');
                this.categorias = cat.data.data;

                const  tor = await axios.get('api/tortas');
                this.tortas = tor.data.data;

                const  com = await axios.get('api/comidas');
                this.comidas = com.data.data;

                const  almu = await axios.get('api/almuerzo');
                this.almuerzo = almu.data.data;

                const  va = await axios.get('api/varios');
                this.varios = va.data.data;

            }
        },
        created(){
            this.loadProductos();
            Fire.$on('AfterCreate',() => {
                this.loadProductos();
            });
        },
        mounted() {
            console.log('Component mounted.')
        }
    };
</script>