<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfiles';
    protected $fillable = [
        'usuario_id',
        'nacionalidad_id',
        'genero_id',
        'fecha_nacimiento',
        'altura',
        'busto',
        'cintura',
        'cadera',
        'calzado', 
        'color_ojos', 
        'color_cabello',
        'biografia',
        'likes',
        'views',
        'check_publicar',
        'check_publicar_avatar',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date:Y-m-d',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id', 'id');
    }

    public function marca(){
        return $this->hasMany(Marca::class,'perfil_id');
    }
    public function social(){
        return $this->hasMany(Social::class,'perfil_id');
    }

    public function nacionalidad(){
        return $this->belongsTo(Catalogo::class,'nacionalidad_id', 'id');
    }
    public function genero(){
        return $this->belongsTo(Catalogo::class,'genero_id', 'id');
    }
    /**
     * Description : Accessors y Mutators
    */
    public function getEdadAttribute()
    {
        return Carbon::now()->diffInYears($this->fecha_nacimiento);
    }


}
