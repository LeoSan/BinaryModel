<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Response};

use App\Models\{Perfil, User};

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
        $perfil = Perfil::where('usuario_id', 6)->first();

        return view('perfiles.vista-previa',compact('perfil'));
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
            
            //envio respuesta al JS 
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

        $perfil = Perfil::where('usuario_id', 6)->first();;
        $val_altura = $request->input('inpAltuta');
        $val_busto = $request->input('inpBusto');
        $val_cintura = $request->input('inpCintura');
        $val_cadera = $request->input('inpCadera');
        $val_calzado = $request->input('inpCalzado');
        $val_color_ojos = $request->input('inpColorOjos');
        $val_color_cabello = $request->input('inpColorCabello');

        try {
            //Inserto valores
            $is_create = Perfil::updateOrCreate([
                    'usuario_id'=> 6,
                ], [
                    'altura'       => isset($val_altura)? $request->input('inpAltuta'):$perfil->altura,
                    'busto'        => isset($val_busto)? $request->input('inpBusto'):$perfil->busto,
                    'cintura'      => isset($val_cintura)? $request->input('inpCintura'):$perfil->cintura,
                    'cadera'       => isset($val_cadera)? $request->input('inpCadera'):$perfil->cadera,
                    'calzado'      => isset($val_calzado)? $request->input('inpCalzado'):$perfil->calzado,
                    'color_ojos'   => isset($val_color_ojos)? $request->input('inpColorOjos'):$perfil->color_ojos,
                    'color_cabello'=> isset($val_color_cabello)? $request->input('inpColorCabello'):$perfil->color_cabello,
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


}
