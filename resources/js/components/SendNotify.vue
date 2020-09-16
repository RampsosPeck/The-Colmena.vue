<template>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                       <div class="profile">
                            <div class="avatar">
                                <img src="/img/notifications/notification.svg" alt="Circle Image" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 follow">
                        <router-link to="/carrito" @click.native="$router.go()" class="btn btn-fab btn-rose" rel="tooltip" title="Carrito de compras">
                            <i class="material-icons">local_grocery_store</i>
                        </router-link>
                    </div>
                </div>
                <div class="tab-content" >
                	<div class="col-md-4 col-md-offset-4" style="padding-right:inherit !important; padding-left:inherit !important;">
	                	<div class="card card-pricing">
	                		<div class="card-content shadow" style="background-color: rgb(242, 242, 242);border-radius:33px;">
	                			<h3 class="card-title text-rose">ENVIAR NOTIFICACIONES</h3>
	                			<div class="input-group">
	                				<span class="input-group-addon">
	                					<i class="material-icons text-rose">person</i>
	                				</span>
                					<div class="form-group is-empty" :class="{ 'has-error is-focused': form.errors.has('recipient_id') }">
                						<v-select class="style-chooser" :options="usuarios"  label="fullname" :reduce="fullname => fullname.id" index="id" v-model="form.recipient_id" placeholder="Seleccione un usuario"></v-select>
                						<has-error :form="form" field="recipient_id"></has-error>
                					</div>
                				</div>
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
	                            <button type="button" @click.prevent="sendMensaje" class="btn btn-rose btn-round">
	                            	<b> Enviar notificación </b>
	                            	<i class="material-icons">send</i>
	                            </button>
	                        </div>
	                    </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
  .style-chooser .vs__search::placeholder,
  .style-chooser .vs__dropdown-toggle,
  .style-chooser .vs__dropdown-menu {
    background: #dfe5fb;
    border: none;
    color: #3C4858;
    text-transform: lowercase;
    font-variant: small-caps;
    font-size: 1.1em;
    font-weight: 700;
  }

  .style-chooser .vs__clear,
  .style-chooser .vs__open-indicator {
    fill: #e91e63;
  }

</style>
<script>
    export default {
        data() {
            return {
                usuarios : [],
                form: new Form({
                    recipient_id:'',
                    mensaje: ''
                })
            }
        },
        methods:{
            async loadUsers(){
                const  resul = await axios.get('api/sendusers');
                this.usuarios = resul.data;
            },
            sendMensaje(){
            	this.$Progress.start();
        		this.form.post('api/sendusers')
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
            this.loadUsers();
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }
    };
</script>