<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table = 'sociales';
    protected $fillable = [
        'usuario_id',
        'perfil_id',
        'nombre',
        'url',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }

    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id', 'id');
    }
}
