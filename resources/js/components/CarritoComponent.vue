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
    border: 3px solid #e91e63;

}
.wizard li.active span.round-tab i{
    color: #e91e63;
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
    border-bottom-color: #e91e63;
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
    border-bottom-color: #e91e63;
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
					                <ul class="nav nav-tabs" role="tablist" style="background: rgba(46, 51, 56, 0.2)!important;">

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

					            <form role="form">
					                <div class="tab-content">
					                    <div class="tab-pane active" role="tabpanel" id="step1">
					                    	<h3 class="card-title text-center" >LISTA DE PRODUCTOS</h3>
					                        <div class="table-responsive">
				                                <table class="table table-shopping">
				                                    <thead>
				                                        <tr>
				                                            <th class="text-center"></th>
				                                            <th >Product</th>
				                                            <th class="th-description">Color</th>
				                                            <th class="th-description">Size</th>
				                                            <th class="text-right">Price</th>
				                                            <th class="text-right">Qty</th>
				                                            <th class="text-right">Amount</th>
				                                            <th></th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>
				                                        <tr>
				                                            <td>
				                                                <div class="img-container" style="margin-top:-12px; margin-bottom:-12px;"  >
				                                                    <img src="assets/img/product1.jpg" style="width: 80% !important; ">
				                                                </div>
				                                            </td>
				                                            <td class="td-name">
				                                                <a href="#jacket">Spring Jacket</a>
				                                                <br /><small>by Dolce&Gabbana</small>
				                                            </td>
				                                            <td>
				                                                Red
				                                            </td>
				                                            <td>
				                                                M
				                                            </td>
				                                            <td class="td-number">
				                                                <small>&euro;</small>549
				                                            </td>
				                                            <td class="td-number">
				                                                1
				                                                <div class="btn-group">
				                                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
				                                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
				                                                </div>
				                                            </td>
				                                            <td class="td-number">
				                                                <small>&euro;</small>549
				                                            </td>
				                                            <td class="td-actions">
				                                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
				                                                    <i class="material-icons">close</i>
				                                                </button>
				                                            </td>
				                                        </tr>
				                                        <tr>
				                                             <td>
				                                                <div class="img-container" style="margin-top:-12px; margin-bottom:-12px;">
				                                                    <img src="assets/img/product2.jpg" alt="..."/>
				                                                </div>
				                                            </td>
				                                            <td class="td-name">
				                                                <a href="#pants">Short Pants</a>
				                                                <br /><small>by Pucci</small>
				                                            </td>
				                                            <td>
				                                                Purple
				                                            </td>
				                                            <td>
				                                                M
				                                            </td>

				                                            <td class="td-number">
				                                                <small>&euro;</small>499
				                                            </td>
				                                            <td class="td-number">
				                                                2
				                                                <div class="btn-group">
				                                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
				                                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
				                                                </div>
				                                            </td>
				                                            <td class="td-number">
				                                                <small>&euro;</small>998
				                                            </td>
				                                            <td class="td-actions">
				                                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
				                                                    <i class="material-icons">close</i>
				                                                </button>
				                                            </td>
				                                        </tr>
				                                        <tr>
				                                            <td>
				                                                <div class="img-container" style="margin-top:-12px; margin-bottom:-12px;">
				                                                    <img src="assets/img/product3.jpg" alt="...">
				                                                </div>
				                                            </td>
				                                            <td class="td-name">
				                                                <a href="#nothing">Pencil Skirt</a>
				                                                <br /><small>by Valentino</small>
				                                            </td>
				                                            <td>
				                                                White
				                                            </td>
				                                            <td>
				                                                XL
				                                            </td>

				                                            <td class="td-number">
				                                                <small>&euro;</small>799
				                                            </td>
				                                            <td class="td-number">
				                                                1
				                                                <div class="btn-group">
				                                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
				                                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
				                                                </div>
				                                            </td>
				                                            <td class="td-number">
				                                                <small>&euro;</small>799</td>
				                                            <td class="td-actions">
				                                                <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-simple">
				                                                    <i class="material-icons">close</i>
				                                                </button>
				                                            </td>
				                                        </tr>
				                                        <tr>
				                                            <td colspan="3">
				                                            </td>
				                                            <td class="td-total">
				                                               Total
				                                            </td>
				                                            <td class="td-price">
				                                                <small>&euro;</small>2,346
				                                            </td>
				                                            <td colspan="3" class="text-right"> <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button></td>

				                                        </tr>
				                                    </tbody>
				                                </table>
					                        </div>
					                        <ul class="list-inline pull-right">
					                            <li><button type="button" class="btn btn-rose btn-round next-step">Guardar y continuar</button></li>
					                        </ul>
					                    </div>
					                    <div class="tab-pane" role="tabpanel" id="step2">
							                <h3 class="card-title text-center" >DATOS DEL USUARIO</h3>
							                <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
							                <p class="description text-center" style="margin-top:-2px;">Mueva el icono <i class="material-icons text-rose">room</i>  en donde esta su casa exactamente. </p>
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
					                                            <textarea class="form-control bg-light border-0" :class="{ 'has-error is-focused': form.errors.has('direccion') }" name="direccion" id="direccion" rows="4" > </textarea>
					                                            <span class="material-input"></span>
					                            				<has-error :form="form" field="direccion"></has-error>
					                                        </div>
					                                    </div>
					                                    <button type="button" class="btn btn-primary btn-round">Capturar mi ubicación</button>
					                                </div>
					                                <div class="col-md-7 big-map">
					                                    <div class="form-group">
					                                        <input type="text" id="mibusqueda" name="location" class="form-control map-input"  placeholder="Registre o busque su dirección." >
					                                        <input type="hidden" name="lat" id="lat"/>
					                                        <input type="hidden" name="lng" id="lng" />
					                                    </div>
					                                    <div id="address-map-container" style="width:100%;height:300px; ">
					                                        <div style="width: 100%; height: 100%" id="map-canvas"></div>
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
					            </form>
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
                form: new Form({
                	fullname: ''
                })
			}
		},
		//props: ['items'],
		methods: {

		}
	};
</script>