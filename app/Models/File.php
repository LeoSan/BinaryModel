<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'files';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
    ];
    protected $appends = [];

    protected $guarded = [];

    protected $fillable = [
        'usuario_id',
        'perfil_id',
        'ruta',
        'nombre',
        'extension',
        'peso',
        'tipo',
    ];


    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }
    
    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id', 'id');
    }
}
