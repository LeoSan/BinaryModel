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
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->control_perfil = new PerfilController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
    
            $catalogo_fashion = Catalogo::where('codigo_padre', 'IN FASHION')->get()->toArray();
            $catalogo_sport   = Catalogo::where('codigo_padre', 'IN SPORTS')->get()->toArray();

            $social           = $this->control_perfil->validaSocialMedia($perfil);
            $catalogo_fashion = $this->control_perfil->validaMarca($catalogo_fashion, $perfil);
            $catalogo_sport   = $this->control_perfil->validaMarca($catalogo_sport, $perfil);
            
            if ($user->fotoHero()){
                $url_hero = Storage::url($user->fotoHero());
            }else{
                $url_hero = asset('images/Prueba.jpg');
            }
            return view('perfiles.vista-previa',compact('user','perfil', 'catalogo_fashion', 'catalogo_sport', 'social', 'url_hero'));
    }

}
