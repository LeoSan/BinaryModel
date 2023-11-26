<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $table = 'experiencias';
    protected $fillable = [
        'usuario_id',
        'perfil_id',
        'nombre',
        'web_empresa',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
    ];

    protected $casts = [
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_fin' => 'date:Y-m-d',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }
    
    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id', 'id');
    }
}
