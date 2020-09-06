@extends('layouts.authentication')

@section('authcontent')
<div class="container">
    <div class="row ">
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-signup">
                <h2 class="card-title text-center" >REGISTRATE GRATIS</h2>
                <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
                <p class="description text-center">Mueva el icono <i class="material-icons text-rose">room</i>  en donde esta su casa exactamente. </p>
                <div class="card-body">

                    <div class="row">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf
                        <div class="col-md-3 text-center">
                            <h4><b>Foto de perfil</b></h4>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle img-raised">
                                    <img src="assets/img/placeholder.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised @error('foto') has-error is-focused @enderror"></div>
                                <div>
                                    <span class="btn btn-raised btn-round btn-rose btn-file">
                                        <span class="fileinput-new">Añadir Imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="foto"  >
                                    </span>
                                    <br>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                                </div>
                                @error('foto')
                                    <span class="has-error text-danger" >
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9 text-center">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-rose">face</i>
                                        </span>
                                        <div class="form-group label-floating is-empty @error('fullname') has-error is-focused @enderror">
                                            <label class="control-label">Nombre completo:</label>
                                            <input type="text" class="form-control" name="fullname" autofocus required value="{{ old('fullname') }}">
                                            <span class="material-input"></span>
                                        </div>
                                        @error('fullname')
                                            <span class="has-error text-danger" >
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-rose">stay_current_portrait</i>
                                        </span>
                                        <div class="form-group label-floating is-empty @error('celular') has-error is-focused @enderror">
                                            <label class="control-label">Celular:</label>
                                            <input type="number" class="form-control" name="celular" required value="{{ old('celular') }}">
                                            <span class="material-input"></span>
                                        </div>
                                        @error('celular')
                                            <span class="has-error text-danger" >
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 big-map">
                                    <!--<div class="form-group">
                                        <input type="text" id="mibusqueda" name="location" class="form-control map-input"  placeholder="Registre o busque su dirección." >
                                        <input type="hidden" name="lat" id="lat"/>
                                        <input type="hidden" name="lng" id="lng" />
                                    </div>
                                    <div id="address-map-container" style="width:100%;height:300px; ">
                                        <div style="width: 100%; height: 100%" id="map-canvas"></div>
                                    </div>-->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-rose">room</i>
                                        </span>
                                        <div class="form-group label-floating is-empty @error('direccion') has-error is-focused @enderror">
                                            <label class="control-label">Detalle su dirección especifica:</label>
                                            <textarea class="form-control bg-light border-0 @error('direccion') is-invalid @enderror" name="direccion" id="direccion" rows="4" >{{ old('direccion') }}</textarea>
                                            <span class="material-input"></span>
                                        </div>
                                        @error('direccion')
                                            <span class="has-error text-danger" >
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-footer text-center">
                            <button class="btn btn-rose btn-round" type="submit">
                                <i class="material-icons">person_pin</i>
                                ENVIAR
                            </button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection



