@extends('layouts.authentication')

@section('authcontent')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card-signup">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="header header-rose text-center">
                        <h4 class="card-title">INICIO DE SECIÓN </h4>
                        <div class="social-line">
                            <a href="#pablo" class="btn btn-just-icon btn-simple">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-content">
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
                    <div class="text-center">
                        <button type="submit" class="btn btn-rose btn-round">
                            {{ __('INGRESAR') }}
                        </button>
                    </div>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="btn btn-danger btn-round btn-sm " href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

