<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'marcas';
    protected $fillable = [
        'usuario_id',
        'perfil_id',
        'catalogo_id',
    ];


    public function nombreMarca(){
        return $this->belongsTo(Catalogo::class,'catalogo_id', 'id');
    }
    
    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }
    
    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id', 'id');
    }

}
