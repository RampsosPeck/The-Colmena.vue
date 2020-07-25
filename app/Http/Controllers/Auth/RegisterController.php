<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'celular' => ['required','numeric','digits:8','unique:users,celular'],
            'direccion' => ['sometimes', 'max:255'],
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(array_key_exists('foto', $data))
        {
            $foto = request()->file('foto')->store('public/users');
        }else{
            $foto = null;
        }

        return User::create([
            'fullname' => $data['fullname'],
            'slug' => Str::of($data['fullname'])->slug('-'),
            'celular' => $data['celular'],
            'email' => $data['email'],
            'direccion' => $data['direccion'],
            'foto' => Storage::url($foto),
            'password' => Hash::make($data['password']),
        ]);
    }
}
