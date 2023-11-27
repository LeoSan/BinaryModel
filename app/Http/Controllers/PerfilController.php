<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct()
    {

    }


    public function index(Request $request)
    {
        //return view('denuncias.index');
    }

    public function showFormulario(Request $request)
    {

        return view('perfiles.formulario');
    }
    
    public function showVistaPrevia(Request $request)
    {

        return view('perfiles.vista-previa');
    }


}
