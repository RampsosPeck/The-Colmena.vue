@extends('layouts.authentication')

@section('authcontent')
<div class="container">
    <div class="row ">
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-signup">
                <h2 class="card-title text-center" >REGISTRATE GRATIS</h2>
                <p class="description text-center">Los campos de este <span class="text-rose"><b>color</b></span> son obligatorios </p>
                <div class="card-body">

                    <div class="row">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf
                        <div class="col-md-4 text-center">
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
                            <div class="media-footer">
                                <h6>Registrarse con:</h6>
                                <a href="" class="btn btn-just-icon btn-round btn-twitter">
                                      <i class="fa fa-twitter"></i>
                                </a>
                                <a href="" class="btn btn-just-icon btn-round btn-facebook">
                                      <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="" class="btn btn-just-icon btn-round btn-google">
                                      <i class="fa fa-google-plus-square"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <div class="media-body">
                                <div class="row">
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
                                    </div>
                                    <div class="col-md-6">
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating is-empty @error('email') has-error is-focused @enderror" >
                                                <label class="control-label">Correo electrónico:</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                <span class="material-input"></span>
                                            </div>
                                            @error('email')
                                                <span class="has-error text-danger" >
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">room</i>
                                            </span>
                                            <div class="form-group label-floating is-empty @error('direccion') has-error is-focused @enderror">
                                                <label class="control-label">Dirección especifica:</label>
                                                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-rose">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating is-empty @error('password') has-error is-focused @enderror">
                                                <label class="control-label">Contraseña:</label>
                                                <input type="password" class="form-control" name="password" required>
                                                <span class="material-input"></span>
                                            </div>
                                            @error('password')
                                                <span class="has-error text-danger" >
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-rose">account_balance_wallet</i>
                                            </span>
                                            <div class="form-group label-floating is-empty" >
                                                <label class="control-label">Confirmar contraseña:</label>
                                                <input type="password" class="form-control" name="password_confirmation">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-footer">
                                    <button class="btn btn-rose btn-round" type="submit">
                                        <i class="material-icons">person_pin</i>
                                        ENVIAR
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection




