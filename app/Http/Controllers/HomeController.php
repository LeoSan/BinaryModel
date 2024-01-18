<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Perfil, User, Catalogo};
use App\Http\Controllers\{PerfilController, SearchController};



class HomeController extends Controller
{
    
    private $control_perfil;
    
    public function __construct()
    {
        //$this->middleware('auth');
        $this->control_perfil = new PerfilController();

    }
    public function index()
    {
        if (Auth::check()) {
            return $this->vistaPerfil();
        }else{
            $perfiles = Perfil::where('check_publicar', 1)->get();
            $tipo = null;
            $filtros = SearchController::generarFiltrosBusqueda();
            return view('welcome', compact('perfiles', 'tipo',  'filtros'));
        }
    }
    public function vistaPerfil(){
            $user     = User::findOrFail(Auth::id());
            $perfil   = Perfil::where('usuario_id', $user->id)->first();
            $catalogo = Catalogo::get()->toArray();
            $social   = $this->control_perfil->validaSocialMedia($perfil);
            $catalogo = $this->control_perfil->validaMarca($catalogo, $perfil);
            
            $imagenes['url_hero'] = $this->control_perfil->fotoHero($user);
            $imagenes['url_avatar'] = $this->control_perfil->fotoAvatar($user);

            return view('perfiles.vista-previa',compact('user','perfil', 'social', 'imagenes', 'catalogo'));
    }


}
