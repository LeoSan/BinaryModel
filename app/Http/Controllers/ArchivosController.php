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
        
        if ($archivo){
                $rutaArchivo = $archivo->store("public/archivos/$user->id");
                $pesoArchivo = round($archivo->getSize() / 1024, 2);
                $datosArchivo = [
                    'usuario_id' => $user->id,
                    'ruta'       => $rutaArchivo,
                    'nombre'     => $archivo->getClientOriginalName(),
                    'extension'  => $archivo->extension(),
                    'peso'       => $pesoArchivo . ' KB',
                    'tipo'       => $tipo_imagen,
                ];
                $file = File::updateOrCreate([
                    'usuario_id' => $user->id,
                    'tipo' => $tipo_imagen,
                ], $datosArchivo);
                return $file;
        }else{
            return false;
        }
    }


    public function eliminar(Request $request){
        $archivo = File::find($request->archivo_id);
        $eliminacion = false;
        if($archivo){
            $eliminacion = $archivo->delete() && Storage::delete($archivo->ruta);
        }
        return Response::json([
            'eliminacion'=>$eliminacion
        ]);
    }
}
