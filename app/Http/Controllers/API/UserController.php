<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request,[
            'fullname' => ['required', 'string', 'max:255'],
            'celular' => ['required','numeric','digits:8','unique:users,celular'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        //$foto = request()->file('foto')->store('public/users');

        return User::create([
            'fullname' => $request['fullname'],
            'slug' => Str::of($request['fullname'])->slug('-'),
            'email' => $request['email'],
            'celular' => $request['celular'],
            //'foto' => Storage::url($foto),
            'formatted_address' => $request['formatted_address'],
            'password' => Hash::make($request['password']),
        ]);

    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();

        $this->validate($request, [
            'fullname' => 'required|string|max:191',
            'celular'  => 'required|numeric|digits:8|unique:users,celular,'.$user->id,
            'email'    => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:5'
        ]);

        $fotoActual = $user->foto;

        if($request->foto != $fotoActual)
        {
            $name = time().'.'.explode('/',explode(':',substr($request->foto, 0, strpos($request->foto, ';')))[1])[1];

            \Image::make($request->foto)->save(public_path('img/profile/').$name);

            $request->merge(['foto' => $name]);

            //Aqui encuentro la imagen en esa carpeta para borrarla
            $userPhoto = public_path('img/profile/').$fotoActual;
            if( file_exists($userPhoto) )
            {
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password))
        {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());

        return ['message'=> "Success"];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return auth('api')->user();
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'fullname' => ['required', 'string', 'max:255'],
            'celular' => ['required','numeric','digits:8','unique:users,celular,'.$user->id],
            'password' => ['sometimes','min:6','confirmed'],
        ]);

        $user->update($request->all());

        return ["message" => 'Información actualizada JORGE.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isSadmin');

        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['message' => 'Usuario eliminaro'], 200);
    }
}
