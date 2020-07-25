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
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['message' => 'Usuario eliminaro'], 200);
    }
}
