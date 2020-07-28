<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::latest()->paginate(10);
        return CategoriaResource::collection($categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'  => 'required|string|max:191',
            'imagen'  => 'required'
        ]);

        if($request->imagen){

            $imagen = time().'.'.explode('/',explode(':',substr($request->imagen, 0, strpos($request->imagen, ';')))[1])[1];
            \Image::make($request->imagen)->save(public_path('img/categoria/').$imagen);
        }

        Categoria::create([
            'nombre' => $request['nombre'],
            'slug' => Str::of($request['nombre'])->slug('-'),
            'descripcion' => $request['descripcion'],
            'imagen' => $imagen
        ]);

        return ['message'=> "Categoria Creada correctamente OK..."];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('isSadmin');

        Categoria::where('id', $id)
              ->update(['estado' => 1]);

        return response()->json(['message' => 'Categoría Activada'], 200);
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
        $categoria = Categoria::findOrFail($id);

        $this->validate($request,[
            'nombre' => ['required', 'string', 'max:255','unique:categorias,nombre,'.$categoria->id]
        ]);

       // $user->update($request->all());

        $fotoActual = $categoria->imagen;

        if($request->imagen != $fotoActual)
        {
            $name = time().'.'.explode('/',explode(':',substr($request->imagen, 0, strpos($request->imagen, ';')))[1])[1];

            \Image::make($request->imagen)->save(public_path('img/categoria/').$name);

            $request->merge(['imagen' => $name]);

            //Aqui encuentro la imagen en esa carpeta para borrarla
            $catePhoto = public_path('img/categoria/').$fotoActual;
            if( file_exists($catePhoto) )
            {
                @unlink($catePhoto);
            }

        }

        $categoria->update($request->all());

        return ['message'=> "Success actualizado"];
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

        Categoria::where('id', $id)
              ->update(['estado' => 0]);

        return response()->json(['message' => 'La categoría fue dado de baja.'], 200);
    }
}
