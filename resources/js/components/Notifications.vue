<template>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 panel-center">
				<div class="card-body">
					<div class="col-md-6">
						<div class="card card-nav-tabs shadow">
							<div class="header header-rose">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
											<li class="active">
												<a href="#lista" data-toggle="tab">
													NOTIFICACIONES NO LEIDAS
													<i class="material-icons text-danger">report</i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-content">
								<div class="card-body" v-for="(notino, index) in notifynoleidas" :key="index">
									<div class="footer" style="position: relative;">
										<div class="author">
											<a href="#pablo">
												<img src="/img/notifications/incoming-message.svg" style="border-radius:inherit !important;" class="avatar">
												<span class="title">
													Mensaje de {{ notino.data.senduser }}
												</span>
											</a>
											<span class="btn btn-round btn-success btn-xs" style="margin:inherit !important;" @click.prevent="viewSms(notino)">
												<b> LEER </b>
												<i class="material-icons">message</i>
											</span>
											<span class="btn btn-round btn-rose btn-xs" style="margin:inherit !important;" @click="readSms(notino.id)">
												<b> Leido </b>
												<i class="material-icons">check_circle</i>
											</span>
	                                	</div>
	                                </div>
	                                <hr class="hrcardpe" />
	                            </div>
							</div>
						</div>
						<!-- End Tabs with icons on Card -->
					</div>
					<div class="col-md-6">
						<div class="card card-nav-tabs shadow">
							<div class="header header-rose">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs ulcenter" data-tabs="tabs">
											<li class="active">
												<a href="#crear" data-toggle="tab">
													NOTIFICACIONES LEIDAS
													<i class="material-icons text-success">check_circle</i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-content">
								<div class="card-body" v-for="(notisi, index) in notifyleidas" :key="index">
									<div class="footer" style="position: relative;">
										<div class="author">
											<a href="#pablo">
												<img src="/img/notifications/incoming-message.svg" style="border-radius:inherit !important;" class="avatar">
												<span class="title">
													Mensaje de {{ notisi.data.senduser }}
												</span>
											</a>
											<span class="btn btn-round btn-info btn-xs" style="margin:inherit !important;" @click.prevent="viewSms(notisi)">
												<b> LEER </b>
												<i class="material-icons">message</i>
											</span>
											<span class="btn btn-round btn-danger btn-xs" style="margin:inherit !important;" @click="deleteSms(notisi.id)">
												<b> Eliminar </b>
												<i class="material-icons">cancel</i>
											</span>
	                                	</div>
	                                </div>
	                                <hr class="hrcardpe" />
	                            </div>
							</div>
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
	<div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-notice">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
			        <h5 class="modal-title title text-center" id="myModalLabel">Mensaje de {{ form.usersender }}</h5>
			    </div>
		        <div class="modal-body">
		        	<hr class="hrcardpe" />
		        	<div class="row">
						<div class="input-group text-justify">
		                 	<span class="input-group-addon">
		                        <i class="material-icons text-rose">drafts</i>
		                    </span>
		                    <div class="form-group" >
		                    	<b> Contenido: </b>  {{ form.body }}
		                    </div>
		                </div>
	              	</div>
	            	<div class="row">
	            		<div class="col-md-6">
	            			<div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="material-icons text-rose">event_note</i>
								</span>
	                        	<div class="form-group">
                            		<b>Hora:</b> {{ form.fecha | dateHuman }}
							    </div>
							</div>
	                    </div>
	                    <div class="col-md-6">
							<div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="material-icons text-rose">remove_red_eye</i>
								</span>
								<div class="form-group" v-if="form.estado">
	                            	<b>Estado:</b> Leido {{ form.estado | dateHuman }}
	                            </div>
	                            <div class="form-group" v-else>
	                            	<b>Estado:</b> No leido
	                            </div>
	                        </div>
	                    </div>
	                </div>
		        </div>
		        <div class="modal-footer text-center">
		            <button type="button" class="btn btn-rose btn-round" data-dismiss="modal">ok! entendido.</button>
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
                notifynoleidas : [],
                notifyleidas : [],
                form: new Form({
                	usersender:'',
                	body:'',
                	fecha:'',
                	estado:''
                })
            }
        },
        methods: {
        	async loadNotify(){
				const re = await axios.get('api/notifynole');
				this.notifynoleidas = re.data;
                const resul = await axios.get('api/notifyle');
				this.notifyleidas = resul.data;
            },
            viewSms(noti){
            	//console.log(noti);
            	this.form.usersender = noti.data.senduser
            	this.form.body = noti.data.sms.body
            	this.form.fecha = noti.data.sms.created_at
            	this.form.estado = noti.read_at
            	$('#smsModal').modal('show');
            },
            readSms(id){
            	this.$Progress.start();
            	swal.fire({
				  title: '¿Estás seguro?',
				  text: "Deseas marcar esta notificación como leido!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, Leido!',
				  cancelButtonText: 'Cancelar!'
				}).then((result) => {
				   if (result.value)
				   {
				      	axios.put('api/notifications/'+id)
				      	.then((re)=>{
                            swal.fire(
                                `<b>${re.data.message}</b>`,
                                'La notificación fue marcada como leida.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
        					this.$Progress.finish();
                        }).catch(()=>{
                            swal.fire(
                                'Ooops...!',
                                'Revisa algo salió mal.',
                                'error'
                            )
                            this.$Progress.fail();
                      	})
				   }
				})
            },
            deleteSms(id){
            	this.$Progress.start();
            	swal.fire({
				  title: '¿Estás seguro?',
				  text: "Deseas eliminar está notificación!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, Eliminar!',
				  cancelButtonText: 'Cancelar!'
				}).then((result) => {
				   if (result.value)
				   {
				      	axios.delete('api/notifications/'+id)
				      	.then((re)=>{
                            swal.fire(
                                `<b>${re.data.message}</b>`,
                                'La notificación fue eliminada.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
        					this.$Progress.finish();
                        }).catch(()=>{
                            swal.fire(
                                'Ooops...!',
                                'Revisa algo salió mal.',
                                'error'
                            )
                            this.$Progress.fail();
                      	})
				   }
				})
            }
        },
        created(){
        	this.loadNotify();
        	Fire.$on('AfterCreate',() => {
                this.loadNotify();
            });
        }
    };
</script>
























