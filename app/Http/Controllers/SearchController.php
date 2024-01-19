<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Perfil, Categoria, Catalogo};


class SearchController extends Controller
{

    public function search(Request $request){
       $tipo        = $request->input('tipo');
       $filtros     = $this->generarFiltrosBusqueda();
       $perfiles    = $this->buscador($request); 
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

    public function buscador(Request $request) : object {

        if ($request->input('tipo') == 'filtros')
            return $this->busqueda_filtro($request);
        else
            return $this->busqueda_general( $request);
    }

    public function busqueda_filtro(Request $request) : object {
        $edad    = $request->input('edad');
        $nacionalidad    = $request->input('nacionalidad');
        $genero   = $request->input('genero');
        $likes    = $request->input('likes');
        $views    = $request->input('views');
        $altura   = $request->input('altura');
        $busto    = $request->input('busto');
        $cintura  = $request->input('cintura');
        $cadera    = $request->input('cadera');
        $calzado    = $request->input('calzado');
        $color_ojos    = $request->input('color_ojos');
        $color_cabello    = $request->input('color_cabello');


        $perfiles = Perfil::where('check_publicar', 1)
        ->when($edad, function($query)use($edad){
            $query->groupBy('fecha_nacimiento','usuario_id', 'nacionalidad_id', 'genero_id', 'nombre_completo', 'altura', 'busto', 'cintura', 'cadera', 'color_ojos', 'color_cabello', 'biografia', 'likes', 'views')
                    ->select('usuario_id', 'nacionalidad_id', 'genero_id', 'nombre_completo', 'altura', 'busto', 'cintura', 'cadera', 'color_ojos', 'color_cabello', 'biografia', 'likes', 'views')
                    ->selectRaw('fecha_nacimiento, YEAR(NOW()) - YEAR(fecha_nacimiento) AS edad')
                    ->having('edad', '=' , $edad);
        })
        ->when($nacionalidad, function($query)use($nacionalidad){
            $query->where('nacionalidad_id','=',$nacionalidad);
        })
        ->when($genero, function($query)use($genero){
            $query->where('genero_id',$genero);
        })
        ->when($likes, function($query)use($likes){
            $query->where('likes',$likes);
        })
        ->when($views, function($query)use($views){
            $query->where('views',$views);
        })
        ->when($altura, function($query)use($altura){
            $query->where('altura',$altura);
        })
        ->when($busto, function($query)use($busto){
            $query->where('busto',$busto);
        })
        ->when($cintura, function($query)use($cintura){
            $query->where('cintura',$cintura);
        })
        ->when($cadera, function($query)use($cadera){
            $query->where('cadera',$cadera);
        })
        ->when($calzado, function($query)use($calzado){
            $query->where('calzado',$calzado);
        })
        ->when($color_ojos, function($query)use($color_ojos){
            $query->where('color_ojos',$color_ojos);
        })
        ->when($color_cabello, function($query)use($color_cabello){
            $query->where('color_cabello',$color_cabello);
        })
        ->get();
        
        return $perfiles; 
    }

    public function busqueda_general(Request $request) : object {
        $busqueda    = $request->input('search');
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
        return $perfiles; 
    }

    public function perfil(int $id){

        $perfil = Perfil::findOrFail($id);
        $filtros     = $this->generarFiltrosBusqueda();
        return view('components.perfil-detalle', compact('perfil','filtros'));
    }


}
