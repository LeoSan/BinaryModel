<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Perfil, Categoria, Catalogo};


class SearchController extends Controller
{

    public function search(Request $request){
       $busqueda    = $request->input('search');
       $tipo        = $request->input('tipo');
       $filtros     = $this->generarFiltrosBusqueda();


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

        return view('welcome', compact('perfiles', 'tipo',  'filtros'));
    }

    public static function generarFiltrosBusqueda() : array {

        
        $habilidades    = Catalogo::where('activo', 1)->get();
        $cate_nacionalidad = Categoria::where('nombre', 'NACIONALIDAD')->first();
        $cate_genero = Categoria::where('nombre', 'GENERO')->first();

        $filtro_altura = Perfil::groupBy('altura')->orderBy('altura')->pluck('altura');
        $filtro_busto = Perfil::groupBy('busto')->orderBy('busto')->pluck('busto');
        $filtro_cintura = Perfil::groupBy('cintura')->orderBy('cintura')->pluck('cintura');
        $filtro_cadera = Perfil::groupBy('cadera')->orderBy('cadera')->pluck('cadera');
        $filtro_calzado = Perfil::groupBy('calzado')->orderBy('calzado')->pluck('calzado');
        $filtro_color_ojos = Perfil::groupBy('color_ojos')->orderBy('color_ojos')->pluck('color_ojos');
        $filtro_color_cabello = Perfil::groupBy('color_cabello')->orderBy('color_cabello')->pluck('color_cabello');
        $filtro_likes = Perfil::groupBy('likes')->orderBy('likes')->pluck('likes');
        $filtro_views = Perfil::groupBy('views')->orderBy('views')->pluck('views');
        $filtro_nacionalidad = Catalogo::where('categoria_id', $cate_nacionalidad->id)->orderBy('nombre', 'asc')->get();
        $filtro_genero = Catalogo::where('categoria_id', $cate_genero->id)->orderBy('nombre', 'asc')->get();
        $filtro_edad = Perfil::groupBy('fecha_nacimiento')
                    ->selectRaw('fecha_nacimiento, YEAR(NOW()) - YEAR(fecha_nacimiento) AS edad')
                    ->get();
        return ['filtro_habilidades'=>$habilidades,'filtro_altura'=>$filtro_altura, 'filtro_altura'=>$filtro_altura, 'filtro_busto'=>$filtro_busto, 'filtro_cintura'=>$filtro_cintura, 'filtro_cadera'=>$filtro_cadera, 'filtro_calzado'=>$filtro_calzado, 'filtro_color_ojos'=>$filtro_color_ojos, 'filtro_color_cabello'=>$filtro_color_cabello, 'filtro_nacionalidad'=>$filtro_nacionalidad,'filtro_genero'=>$filtro_genero,'filtro_edad'=>$filtro_edad,'filtro_likes'=>$filtro_likes,'filtro_views'=>$filtro_views ];
        
    }
}
