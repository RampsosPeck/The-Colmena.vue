@extends('layouts.authentication')

@section('authcontent')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card card-signup">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="header header-rose text-center">
                        <h4 class="card-title"> RESTABLECER LA CONTRASEÑA </h4>
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
                                <i class="material-icons text-rose">email</i>
                            </span>
                            <div class="form-group label-floating is-empty @error('email') has-error is-focused @enderror" >
                                <label class="control-label">Correo electrónico:</label>
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="material-input"></span>
                            </div>
                            @error('email')
                                <span class="has-error text-danger" >
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-rose btn-round">
                            Enviar enlace de restablecimiento <br>
                            de contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

