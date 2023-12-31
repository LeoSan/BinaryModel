<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Perfil, User, Catalogo};
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\{PerfilController};


class HomeController extends Controller
{
    
    private $control_perfil;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->control_perfil = new PerfilController();
    }
    public function index()
    {
        if (Auth::check()) {
            return $this->vistaPerfil();
        }else{
            return view('home');
        }

    }
    public function vistaPerfil(){
            $user   = User::findOrFail(Auth::id());
            $perfil = Perfil::where('usuario_id', $user->id)->first();
            $catalogo = Catalogo::get()->toArray();
            $social   = $this->control_perfil->validaSocialMedia($perfil);
            $catalogo = $this->control_perfil->validaMarca($catalogo, $perfil);
            
            if ($user->fotoHero()){
                $url_hero = Storage::url($user->fotoHero());
            }else{
                $url_hero = asset('images/Prueba.jpg');
            }
            return view('perfiles.vista-previa',compact('user','perfil', 'social', 'url_hero', 'catalogo'));
    }

}
