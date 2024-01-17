<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Perfil, User, Catalogo, Marca, Social, Categoria};


class SearchController extends Controller
{
    //

    public function search(Request $request){
       $busqueda    = $request->input('search');
       $tipo        = $request->input('tipo');
       $habilidades = Catalogo::where('activo', 1)->get();


       $perfiles = Perfil::where('check_publicar', 1)
       ->when($busqueda, function($query, $busqueda){
            $query->whereRaw(" (lower(nombre_completo)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(color_ojos)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(color_cabello)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(biografia)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(altura)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(busto)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(cintura)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(cadera)) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
            $query->orWhereRaw(" (lower(calzado )) LIKE (lower('%".trim(strtolower($busqueda))."%')) ");
        })->get();
        return view('welcome', compact('perfiles', 'tipo', 'habilidades'));
    }
}
