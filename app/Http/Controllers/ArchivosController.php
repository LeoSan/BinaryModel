<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArchivosController extends Controller
{
    public static function storeFile(Request $request, $codigo, $perfil, $tipo)
    {
        $archivo = $request->file('documento_archivo_'. $codigo);
        $mimes   = $request->input('accept_'. $codigo);
        if ($archivo){
            // Guardar el archivo en la carpeta 'archivos' dentro de la carpeta 'storage'
            $rules = [
                "documento_archivo_$codigo" => "mimes:".$mimes, // Agrega las extensiones permitidas aquí
            ];
            $validator = Validator::make($request->all(), $rules);
            if ( ! $validator->fails()) {

                $rutaArchivo = $archivo->store("archivos/$perfil->id/");
                $pesoArchivo = round($archivo->getSize() / 1024, 2);
                // Guardar el registro en la base de datos
                $datosArchivo = [
                    'perfil_id' => $perfil->id,
                    'ruta' => $rutaArchivo,
                    'nombre' => $archivo->getClientOriginalName(),
                    'extension' => $archivo->extension(),
                    'peso' => $pesoArchivo . ' KB',
                    'tipo' => $tipo,
                ];

                $documento = File::updateOrCreate([
                    'perfil_id'  => $perfil->id,
                    'usuario_id' => $perfil->usuario->id,
                ], $datosArchivo);

                return $documento;
            }
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
