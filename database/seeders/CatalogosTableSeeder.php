<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{ Catalogo };

class CatalogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Catálogo de moda
        Catalogo::updateOrCreate([
            'codigo' => 'RUNWAY_MODEL',
            'codigo_padre'=> 'IN FASHION',
            'nombre'=> 'RUNWAY MODEL',
            'descripcion'=> 'RUNWAY MODEL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'COMMERCIAL_MODEL',
            'codigo_padre'=> 'IN FASHION',
            'nombre'=> 'COMMERCIAL MODEL',
            'descripcion'=> 'COMMERCIAL MODEL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'CATALOG_MODEL',
            'codigo_padre'=> 'IN FASHION',
            'nombre'=> 'CATALOG MODEL',
            'descripcion'=> 'CATALOG MODEL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'FASHION_MODEL',
            'codigo_padre'=> 'IN FASHION',
            'nombre'=> 'FASHION_MODEL',
            'descripcion'=> 'FASHION_MODEL'
        ]);


        //Catálogo de Deportes

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_BASEBALL',
            'codigo_padre'=> 'IN SPORTS',
            'nombre'=> 'BASEBALL',
            'descripcion'=> 'BASEBALL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_FOOTBALL',
            'codigo_padre'=> 'IN SPORTS',
            'nombre'=> 'FOOTBALL',
            'descripcion'=> 'FOOTBALL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_SKATE',
            'codigo_padre'=> 'IN SPORTS',
            'nombre'=> 'SKATE',
            'descripcion'=> 'SKATE'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_INLINE_SKATES',
            'codigo_padre'=> 'IN SPORTS',
            'nombre'=> 'INLINE SKATES',
            'descripcion'=> 'INLINE SKATES'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_BICYCLE',
            'codigo_padre'=> 'IN SPORTS',
            'nombre'=> 'BICYCLE',
            'descripcion'=> 'BICYCLE'
        ]);
        
        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_EXTREME',
            'codigo_padre'=> 'IN SPORTS',
            'nombre'=> 'EXTREME',
            'descripcion'=> 'EXTREME'
        ]);




        
    }
}
