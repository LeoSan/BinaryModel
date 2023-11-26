<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    protected $fillable = [
        'usuario_id',
        'perfil_id',
        'catalogo_id',
        'url_fotografia'
    ];


    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }

    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id', 'id');
    }
}
