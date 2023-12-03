<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Response};

use App\Models\{Perfil, User, Catalogo, Marca, Social};

class PerfilController extends Controller
{
    
    private $message_error = "Ocurrio un error, espere un momento y vuelva intentarlo por favor.";
    private $message_success = "Se almaceno los datos de manera correcta.";
    
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        //return view('denuncias.index');
    }

    public function showFormulario(Request $request)
    {
        $perfil = Perfil::where('usuario_id', 6)->first();
        return view('perfiles.formulario', compact('perfil'));
    }
    
    public function showVistaPrevia(Request $request)
    {
        $perfil           = Perfil::where('usuario_id', 6)->first();
        $catalogo_fashion = Catalogo::where('codigo_padre', 'IN FASHION')->get()->toArray();
        $catalogo_sport   = Catalogo::where('codigo_padre', 'IN SPORTS')->get()->toArray();

        $vacio[0]='Sin asignar';

        $social['Instagram'] = empty($perfil->social->where('nombre', 'Instagram')->pluck('url')->toArray())? $vacio :$perfil->social->where('nombre', 'Instagram')->pluck('url')->toArray();
        $social['Tiktok']    = empty($perfil->social->where('nombre', 'Tiktok')->pluck('url')->toArray())?    $vacio :$perfil->social->where('nombre', 'Tiktok')->pluck('url')->toArray();
        $social['Facebook']  = empty($perfil->social->where('nombre', 'Facebook')->pluck('url')->toArray())?  $vacio :$perfil->social->where('nombre', 'Facebook')->pluck('url')->toArray();
        $social['Twitter']   = empty($perfil->social->where('nombre', 'Twitter')->pluck('url')->toArray())?   $vacio :$perfil->social->where('nombre', 'Twitter')->pluck('url')->toArray();

        //Valido si tiene alguna marca en el perfil 
        $catalogo_sport = $this->validaPerfilMarca($catalogo_sport, $perfil);
        $catalogo_fashion = $this->validaPerfilMarca($catalogo_fashion, $perfil);

        return view('perfiles.vista-previa',compact('perfil', 'catalogo_fashion', 'catalogo_sport', 'social'));
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
            case 'usuario':
                $resp = $this->procesoStoreUsuario($request);
            break;
            case 'marca':
                $resp = $this->procesoStoreMarca($request);
            break;
            case 'social':
                $resp = $this->procesoStoreSocial($request);
            break;
            default:
                $resp = null; 
            break;
        }

        return $resp;
    }


    public function procesoStoreForm(Request $request)
    {
   
        try {
            //Inserto valores
            $is_create = Perfil::updateOrCreate([
                    'usuario_id'=> 6,
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
    public function procesoStoreUsuario(Request $request)
    {
        try {
            $user = User::find( 6);
            $user->name = $request->input('inpNombre'); 
            $user->save();
            return Response::json([
                'message' => $this->message_success,
                'estatus'   =>  201,//Good
            ], 201);

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

        $perfil      = Perfil::where('usuario_id', 6)->first();;
        $val_altura  = $request->input('inpAltuta');
        $val_busto   = $request->input('inpBusto');
        $val_cintura = $request->input('inpCintura');
        $val_cadera  = $request->input('inpCadera');
        $val_calzado        = $request->input('inpCalzado');
        $val_color_ojos     = $request->input('inpColorOjos');
        $val_color_cabello  = $request->input('inpColorCabello');
        $val_biografia      = $request->input('inpBiografia');
        $val_check_publicar = $request->input('checkPublicar');

        try {
            //Inserto valores
            $is_create = Perfil::updateOrCreate([
                    'usuario_id'=> 6,
                ], [
                    'altura'         => isset($val_altura)? $request->input('inpAltuta'):$perfil->altura,
                    'busto'          => isset($val_busto)? $request->input('inpBusto'):$perfil->busto,
                    'cintura'        => isset($val_cintura)? $request->input('inpCintura'):$perfil->cintura,
                    'cadera'         => isset($val_cadera)? $request->input('inpCadera'):$perfil->cadera,
                    'calzado'        => isset($val_calzado)? $request->input('inpCalzado'):$perfil->calzado,
                    'color_ojos'     => isset($val_color_ojos)? $request->input('inpColorOjos'):$perfil->color_ojos,
                    'color_cabello'  => isset($val_color_cabello)? $request->input('inpColorCabello'):$perfil->color_cabello,
                    'biografia'      => isset($val_biografia)? $request->input('inpBiografia'):$perfil->biografia,
                    'check_publicar' => isset($val_check_publicar)? $request->input('checkPublicar'):$perfil->check_publicar,
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
    public function procesoStoreSocial(Request $request)
    {
        $perfil = Perfil::where('id', $request->input('perfil_id'))->first();

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
        $perfil = Perfil::where('id', $request->input('perfil_id'))->first();

        try {
            if($request->input('checked') == "true" ){
                $is_marca = Marca::Create([
                    'usuario_id'    =>$perfil->usuario->id,
                    'perfil_id'     =>$request->input('perfil_id'),
                    'catalogo_id'   =>$request->input('id'),
                    'catalogo_padre'=>$request->input('padre')
                ]);
            }else{
                $is_marca = Marca::where('perfil_id', $request->input('perfil_id'))->where('catalogo_id',$request->input('id'))->first();
                $is_marca->delete();
            }
            return  $this->validaStore($is_marca);

        }catch(\Exception $e) {
            $error_exception = "Error try exception";
            return Response::json([
                'message' => $this->message_error,
                'estatus'   =>  203,//bad
            ], 203);
        }
    }

    public function validaStore($is_create)
    {
        if (!$is_create){
            return Response::json([
                'message'   => $this->message_error,
                'estatus'   =>  203,//bad
            ], 203);
        }else{
            return Response::json([
                'message' => $this->message_success,
                'id'   => $is_create->id ,
                'estatus'   =>  201,//Good
            ], 201);
        }
    }
    public function validaPerfilMarca($catalogo, $perfil)
    {
        foreach ($catalogo as $key => $value) {
            $valida = $perfil->marca->where('catalogo_id', $value['id'])->value('catalogo_id'); 
            if ($valida > 0){
                $catalogo[$key][ 'check'] = true;
            }else{
                $catalogo[$key][ 'check'] = false;
            }
        }
        return $catalogo; 
    }


}
