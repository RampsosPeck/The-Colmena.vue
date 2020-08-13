<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Prodetalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

    	//return view('layouts.catalogo', compact('productos'));
    	$tortas = Categoria::where('nombre','Tortas')->first();
    	$protortas = Producto::where('categoria_id',$tortas->id)->get();

    	$comidas = Categoria::where('nombre','Comidas')->first();
    	$procomidas = Producto::where('categoria_id',$comidas->id)->get();

    	$catalmuer = Categoria::where('nombre','Almuerzo')->first();
    	$almuerzo = Producto::where('categoria_id',$catalmuer->id)->first();
    	//dd($almuerzo);

    	$varios = Categoria::where('nombre','Varios')->first();
    	$provarios = Producto::where('categoria_id',$varios->id)->get();
    	//dd($protortas);
    	return view('layouts.catalogo', compact('protortas','procomidas','almuerzo','provarios'));
    }
}
