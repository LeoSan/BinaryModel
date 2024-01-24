<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogos';
    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'activo'
    ];


    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id', 'id');
    }

}
