<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Response};
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{ArchivosController};
use Illuminate\Support\Facades\{Log};
use Illuminate\Support\Facades\Storage;

use App\Models\{Perfil, User, Catalogo, Marca, Social};

class PerfilController extends Controller
{
    
    private $message_error = "Ocurrio un error, espere un momento y vuelva intentarlo por favor.";
    private $message_success = "Se almaceno los datos de manera correcta.";
    
    public function showFormulario(Request $request)
    {
        $user   = User::findOrFail(6);
        //$user   = User::findOrFail(Auth::id());
        $perfil = Perfil::where('usuario_id', $user->id)->first();

        return view('perfiles.formulario', compact('perfil'));
    }
    
    public function showVistaPrevia(Request $request)
    {
        $user   = User::findOrFail(Auth::id());
        $perfil   = Perfil::where('usuario_id', $user->id)->first();
        $social   = $this->validaSocialMedia($perfil);

        if ($user->fotoHero()){
            $url_hero = Storage::url($user->fotoHero());
        }else{
            $url_hero = asset('images/Prueba.jpg');
        }

        return view('perfiles.vista-previa',compact('user','perfil',  'social', 'url_hero'));
    }
    public function storePerfil(Request $request)
    {
        
        if (!$request->ajax()) {
            return Response::json([
                'message' => $this->message_error,
                'error' =>  'Error Ajax',
            ], 203);
        }

        switch ($request->input('tipo')) {
            case 'formulario':
                $resp = $this->procesoStoreForm($request);
            break;
            case 'vista':
                $resp = $this->procesoStoreVista($request);
            break;
            case 'marca':
                $resp = $this->procesoStoreMarca($request);
            break;
            case 'social':
                $resp = $this->procesoStoreSocial($request);
            break;
            case 'file':
                $resp = $this->procesoStoreFile($request);
            break;
            case 'gallery':
                $resp = $this->procesoStoreGallery($request);
            break;
            case 'foto_eliminar':
                $resp = ArchivosController::eliminar($request);
            break;
            default:
                $resp = null; 
            break;
        }

        return $resp;
    }
    public function procesoStoreForm(Request $request)
    {
        $user   = User::findOrFail(Auth::id());
        $perfil = Perfil::where('usuario_id', $user->id)->first();

        try {
            //Inserto valores
            $is_create = Perfil::updateOrCreate([
                    'usuario_id'=> $perfil->id,
                ], [
                    'altura'=> $request->input('altura'),
                    'busto'=> $request->input('busto'),
                    'cintura'=> $request->input('cintura'),
                    'cadera'=> $request->input('cadera'),
                    'calzado'=> $request->input('calzado'),
                    'color_ojos'=> $request->input('color_ojos'),
                    'color_cabello'=> $request->input('color_cabello')
                ]);

            return  $this->validaStore($is_create);            //envio respuesta al JS 
        }catch(\Exception $e) {
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error,
                'estatus'   =>  203,//bad
            ], 203);
        }

    }
    public function procesoStoreVista(Request $request)
    {
        //$user   = User::findOrFail(6);
        $user   = User::findOrFail(Auth::id());
        $perfil = Perfil::where('usuario_id', $user->id)->first();

        $val_altura  = $request->input('inpAltuta');
        $val_busto   = $request->input('inpBusto');
        $val_cintura = $request->input('inpCintura');
        $val_cadera  = $request->input('inpCadera');
        $val_calzado        = $request->input('inpCalzado');
        $val_color_ojos     = $request->input('inpColorOjos');
        $val_color_cabello  = $request->input('inpColorCabello');
        $val_biografia      = $request->input('inpBiografia');
        $val_check_publicar = $request->input('checkPublicar');
        $val_check_publicar_avatar = $request->input('checkPublicarAvatar');
        $val_nombre_perfil  = $request->input('inpNombre');

        $perfil_altura = ($perfil)?$perfil->altura :'0.00';
        $perfil_busto = ($perfil)?$perfil->busto :'0.00';
        $perfil_cintura = ($perfil)?$perfil->cintura :'0.00';
        $perfil_cadera = ($perfil)?$perfil->cadera :'0.00';
        $perfil_calzado = ($perfil)?$perfil->calzado :'0.00';
        $perfil_biografia = ($perfil)?$perfil->biografia:null;
        $perfil_color_ojos = ($perfil)?$perfil->color_ojos:null;
        $perfil_color_cabello  = ($perfil)?$perfil->color_cabello:null;
        $perfil_check_publicar = ($perfil)?$perfil->check_publicar:null;
        $perfil_check_publicar_avatar = ($perfil)?$perfil->val_check_publicar_avatar:null;

        try {
            //Inserto valores
            $is_create = Perfil::updateOrCreate([
                    'usuario_id'=> $user->id,
                ],[
                    'altura'          => isset($val_altura)? $request->input('inpAltuta'):$perfil_altura ,
                    'busto'           => isset($val_busto)? $request->input('inpBusto'):$perfil_busto,
                    'cintura'         => isset($val_cintura)? $request->input('inpCintura'):$perfil_cintura,
                    'cadera'          => isset($val_cadera)? $request->input('inpCadera'):$perfil_cadera,
                    'calzado'         => isset($val_calzado)? $request->input('inpCalzado'):$perfil_calzado,
                    'color_ojos'      => isset($val_color_ojos)? $request->input('inpColorOjos'):$perfil_color_ojos,
                    'color_cabello'   => isset($val_color_cabello)? $request->input('inpColorCabello'):$perfil_color_cabello,
                    'biografia'       => isset($val_biografia)? $request->input('inpBiografia'):$perfil_biografia,
                    'check_publicar'  => isset($val_check_publicar)? $request->input('checkPublicar'):$perfil_check_publicar,
                    'check_publicar_avatar'  => isset($val_check_publicar_avatar)? $request->input('checkPublicarAvatar'):$perfil_check_publicar_avatar,
                ]);

             if (isset($val_nombre_perfil)){
                $is_create->nombre_completo = $val_nombre_perfil; 
                $is_create->save();
             }   
    
            return  $this->validaStore($is_create);            //envio respuesta al JS 

        }catch(\Exception $e) {
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error."try",
                'estatus'   =>  203,//bad
            ], 203);
        }

    }
    public function procesoStoreSocial(Request $request)
    {
        $user   = User::findOrFail(Auth::id());
        //$user   = User::findOrFail(6);
        $perfil = Perfil::where('usuario_id', $user->id)->first();


        try {
            $is_create = Social::updateOrCreate([
                'usuario_id'=> $perfil->usuario->id,
                'perfil_id'=> $perfil->id,
                'nombre'=> $request->input('nombre'),
            ], [
                'usuario_id' => $perfil->usuario->id,
                'perfil_id'  => $perfil->id,
                'nombre'     => $request->input('nombre'),
                'url'        => $request->input('value'),
            ]);
            return  $this->validaStore($is_create);

        }catch(\Exception $e) {
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error,
                'estatus'   =>  203,//bad
            ], 203);
        }
    }
    public function procesoStoreMarca(Request $request)
    {
        $user   = User::findOrFail(Auth::id());
        $perfil = Perfil::where('usuario_id', $user->id)->first();

        try {
            if($request->input('checked') == "true" ){
                $is_marca = Marca::Create([
                    'usuario_id'    =>$user->id,
                    'perfil_id'     =>$perfil->id,
                    'catalogo_id'   =>$request->input('id'),
                ]);
            }else{
                $is_marca = Marca::where('perfil_id', $perfil->id)->where('catalogo_id',$request->input('id'))->first();
                $is_marca->delete();
            }
            return  $this->validaStore($is_marca);

        }catch(\Exception $e) {
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error."->try".$e->getMessage(),
                'estatus'   =>  203,//bad
            ], 203);
        }
    }
    public function procesoStoreFile(Request $request)
    {
        try {
            $user   = User::findOrFail(Auth::id());
            $is_file =  ArchivosController::storeFile($request, $request->input('elemento'),$user);
            return  $this->validaStoreArchivo($is_file);
        
        }catch(\Exception $e) {
            Log::info("Error: ".$e->getMessage());
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error,
                'estatus'   =>  203,//bad
            ], 203);
        }
    }
    public function procesoStoreGallery(Request $request)
    {
        try {
            $user   = User::findOrFail(Auth::id());
            //$user    = User::findOrFail(6);
            $is_file =  ArchivosController::storeFile($request, 'gallery',$user);
            return  $this->validaStoreArchivo($is_file);
        
        }catch(\Exception $e) {
            Log::info("Error: ".$e->getMessage());
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error."->try",
                'estatus'   =>  203,//bad
            ], 203);
        }
    }
    public function validaStore($is_create)
    {
        if (!$is_create){
            return Response::json([
                'message'   => $this->message_error."->no create",
                'estatus'   =>  203,//bad
            ], 203);
        }else{
            return Response::json([
                'message' => $this->message_success,
                'id'   => $is_create->id,
                'estatus'   =>  201,//Good
            ], 201);
        }
    }
    public function validaStoreArchivo($is_create)
    {
        if (!$is_create){
            return Response::json([
                'message'   => $this->message_error."->no create",
                'estatus'   =>  203,//bad
            ], 203);
        }else{
            return Response::json([
                'message' => $this->message_success,
                'id'   => $is_create[0]->id,
                'ruta'   => $is_create[0]->ruta,//TODO Leo
                'filas'   => $is_create,
                'estatus'   =>  201,//Good
            ], 201);
        }
    }
    public function validaPerfilMarca($catalogo, $perfil)
    {
        foreach ($catalogo as $key => $value) {
            
             if ( $perfil != null ){
                $valida = $perfil->marca->where('catalogo_id', $value['id'])->value('catalogo_id', null); 
                if ($valida > 0){
                    $catalogo[$key][ 'check'] = true;
                }else{
                    $catalogo[$key][ 'check'] = false;
                }
             
            }else{
                $catalogo[$key][ 'check'] = false;
             } 
            
        }
        return $catalogo; 
    }
    public function validaSocialMedia($perfil){

        $vacio[0]='Sin asignar';

        if ($perfil){
            $social['Instagram'] = empty($perfil->social->where('nombre', 'Instagram')->pluck('url')->toArray())? $vacio :$perfil->social->where('nombre', 'Instagram')->pluck('url')->toArray();
            $social['Tiktok']    = empty($perfil->social->where('nombre', 'Tiktok')->pluck('url')->toArray())?    $vacio :$perfil->social->where('nombre', 'Tiktok')->pluck('url')->toArray();
            $social['Facebook']  = empty($perfil->social->where('nombre', 'Facebook')->pluck('url')->toArray())?  $vacio :$perfil->social->where('nombre', 'Facebook')->pluck('url')->toArray();
            $social['Twitter']   = empty($perfil->social->where('nombre', 'Twitter')->pluck('url')->toArray())?   $vacio :$perfil->social->where('nombre', 'Twitter')->pluck('url')->toArray();
    
        }else{
            $social['Instagram'] = $vacio[0];
            $social['Tiktok']    = $vacio[0];
            $social['Facebook']  = $vacio[0];
            $social['Twitter']   = $vacio[0];
    
        }
        return $social;
    }
    public function validaMarca($catalogo, $perfil){
        return  $this->validaPerfilMarca($catalogo, $perfil);
    }

    public function fotoHero($user){
        if ($user->fotoHero()){
            $url = Storage::url($user->fotoHero());
        }else{
            $url = asset('images/Prueba.jpg');
        }
        return $url;
    }

    public function fotoAvatar($user){
        if ($user->fotoAvatar()){
            $url = Storage::url($user->fotoAvatar());
        }else{
            $url = null;
        }
        return $url;
    }
 
}
