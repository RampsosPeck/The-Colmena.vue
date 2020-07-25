@extends('layouts.authentication')

@section('authcontent')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card-signup">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="header header-rose text-center">
                        <h4 class="card-title">Restablecer la contraseña </h4>
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
                        <div class="input-group @error('email') has-error is-focused @enderror">
                            <span class="input-group-addon">
                                <i class="material-icons text-rose">email</i>
                            </span>
                            <input type="email" id="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="has-error text-danger" >
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="input-group @error('password') has-error is-focused @enderror">
                            <span class="input-group-addon">
                                <i class="material-icons text-rose">lock_outline</i>
                            </span>
                            <input class="form-control" name="password" id="password" type="password" required autocomplete="new-password" placeholder="Nueva contraseña">
                            @error('password')
                                <span class="has-error text-danger" >
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons text-rose">account_balance_wallet</i>
                            </span>
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-rose btn-round">
                            {{ __('Restablecer la contraseña') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


