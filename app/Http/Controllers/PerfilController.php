<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Response};

use App\Models\Perfil;

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

        return view('perfiles.formulario');
    }
    
    public function showVistaPrevia(Request $request)
    {

        return view('perfiles.vista-previa');
    }

    public function storePerfil(Request $request)
    {

        if (!$request->ajax()) {
            return Response::json([
                'message' => $this->message_error,
                'error' =>  'Error Ajax',
            ], 203);
        }
        try {
            //Inserto valores
            $is_create = Perfil::updateOrCreate([
                'usuario_id'=> 6,
                'altura'=> $request->input('altura'),
                'busto'=> $request->input('busto'),
                'cintura'=> $request->input('cintura'),
                'cadera'=> $request->input('cadera'),
                'calzado'=> $request->input('calzado'),
                'color_ojos'=> $request->input('color_ojos'),
                'color_cabello'=> $request->input('color_cabello'),
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


}
