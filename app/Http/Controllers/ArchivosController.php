<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Validator;

class ArchivosController extends Controller
{

    public static function storeFile(Request $request, $codigo, $user)
    {
         
        

        $archivo = $request->file('documento_archivo_'. $codigo);
        $mimes   = $request->input('accept_'. $codigo);
        $tipo_imagen   = $request->input('tipo_imagen');
        $nombre_anexo  = $request->input('name');
        $descripcion   = $request->input('description');
        
        $nombre_anexo = isset($nombre_anexo)? $request->input('name') : null;
        $descripcion  = isset($descripcion)? $request->input('description') : null;

        if ($archivo){
                
         
            
                $rutaArchivo = $archivo->store("public/archivos/$user->id");//configuracion
                $pesoArchivo = round($archivo->getSize() / 1024, 2);
                $datosArchivo = [
                    'usuario_id'   => $user->id,
                    'ruta'         => $rutaArchivo,
                    'nombre'       => $archivo->getClientOriginalName(),
                    'nombre_anexo' => $nombre_anexo,
                    'descripcion'  => $descripcion,
                    'extension'    => $archivo->extension(),
                    'peso'         => $pesoArchivo . ' KB',
                    'tipo'         => $tipo_imagen,
                ];
                
                switch ($tipo_imagen) {
                    case 'hero':
                        $file = File::updateOrCreate([
                            'usuario_id' => $user->id,
                            'tipo' => $tipo_imagen,
                        ], $datosArchivo);
                        $file = File::where('usuario_id', '=', $user->id)->where('tipo', '=', 'hero')->get();
                    break;
                    case 'gallery_work':
                        $file = File::create($datosArchivo);
                        $file = File::where('usuario_id', '=', $user->id)->where('tipo', '=', 'gallery_work')->get();
                    break;
                    case 'avatar':
                        $file = File::updateOrCreate([
                            'usuario_id' => $user->id,
                            'tipo' => $tipo_imagen,
                        ], $datosArchivo);

                        $file = File::where('usuario_id', '=', $user->id)->where('tipo', '=', 'avatar')->get();
                    break;
                    default:
                        $file = false;
                    break;
                }
                return $file;
        }else{
            return false;
        }
    }
    public static function eliminar(Request $request){
        $archivo = File::find($request->id);
        $eliminacion = false;
        if($archivo)
            $eliminacion = $archivo->delete() && Storage::delete($archivo->ruta);

        if (!$eliminacion){
            return Response::json([
                //'message'   => "Ocurrio un error, espere un momento y vuelva intentarlo por favor",
                'estatus'   =>  203,//bad
            ], 203);
        }else{
            return Response::json([
                //'message' => "Se almaceno los datos de manera correcta.",
                'estatus'   =>  201,//Good
            ], 201);
        }
       
    }

}
