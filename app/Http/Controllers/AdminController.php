<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

    	//return view('layouts.catalogo', compact('productos'));
    	return view('layouts.catalogo');
    }
}
