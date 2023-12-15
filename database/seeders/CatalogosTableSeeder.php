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
            'nombre'=> 'RUNWAY MODEL',
            'descripcion'=> 'RUNWAY MODEL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'COMMERCIAL_MODEL',
            'nombre'=> 'COMMERCIAL MODEL',
            'descripcion'=> 'COMMERCIAL MODEL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'CATALOG_MODEL',
            'nombre'=> 'CATALOG MODEL',
            'descripcion'=> 'CATALOG MODEL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'FASHION_MODEL',
            'nombre'=> 'FASHION MODEL',
            'descripcion'=> 'FASHION_MODEL'
        ]);


        //Catálogo de Deportes

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_BASEBALL',
            'nombre'=> 'BASEBALL',
            'descripcion'=> 'BASEBALL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_FOOTBALL',
            'nombre'=> 'FOOTBALL',
            'descripcion'=> 'FOOTBALL'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_SKATE',
            'nombre'=> 'SKATE',
            'descripcion'=> 'SKATE'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_INLINE_SKATES',
            'nombre'=> 'INLINE SKATES',
            'descripcion'=> 'INLINE SKATES'
        ]);

        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_BICYCLE',
            'nombre'=> 'BICYCLE',
            'descripcion'=> 'BICYCLE'
        ]);
        
        Catalogo::updateOrCreate([
            'codigo' => 'SPORT_EXTREME',
            'nombre'=> 'EXTREME',
            'descripcion'=> 'EXTREME'
        ]);




        
    }
}
