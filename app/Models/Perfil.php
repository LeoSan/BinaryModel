<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfiles';
    protected $fillable = [
        'usuario_id',
        'fecha_nacimiento',
        'altura',
        'busto',
        'cintura',
        'cadera',
        'calzado', 
        'color_ojos', 
        'color_cabello',
        'biografia',
        'check_publicar',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date:Y-m-d',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }
}
