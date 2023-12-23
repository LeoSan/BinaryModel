<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{ Categoria, Catalogo };

class CatalogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Categoria de moda
        $moda = Categoria::Create([
            'codigo' => 'MODEL',
            'nombre'=> 'MODEL',
            'descripcion'=> 'Categoria sobre tipos de modelos'
        ]);
        
        //Categoria Deporte
        $deporte = Categoria::Create([
            'codigo' => 'SPORT',
            'nombre'=> 'SPORT',
            'descripcion'=> 'Categoria sobre tipos de deportes'
        ]);
        
        //Categoria Deporte
        $lenguages = Categoria::Create([
            'codigo' => 'LENGUAGES',
            'nombre'=> 'LENGUAGES',
            'descripcion'=> 'Categoria sobre tipos de lenguajes'
        ]);
        
        
        //Catálogo de moda
        Catalogo::updateOrCreate([
            'nombre'=> 'RUNWAY MODEL',
            'descripcion'=> 'RUNWAY MODEL',
            'categoria_id'=> $moda->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'COMMERCIAL MODEL',
            'descripcion'=> 'COMMERCIAL MODEL',
            'categoria_id'=> $moda->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'CATALOG MODEL',
            'descripcion'=> 'CATALOG MODEL',
            'categoria_id'=> $moda->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'FASHION MODEL',
            'descripcion'=> 'FASHION_MODEL',
            'categoria_id'=> $moda->id
        ]);


        //Catálogo de Deportes
        Catalogo::updateOrCreate([
            'nombre'=> 'FOOTBALL',
            'descripcion'=> 'FOOTBALL',
            'categoria_id'=> $deporte->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'SKATE',
            'descripcion'=> 'SKATE',
            'categoria_id'=> $deporte->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'INLINE SKATES',
            'descripcion'=> 'INLINE SKATES',
            'categoria_id'=> $deporte->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'BICYCLE',
            'descripcion'=> 'BICYCLE',
            'categoria_id'=> $deporte->id
        ]);
        
        Catalogo::updateOrCreate([
            'nombre'=> 'ENGLISH',
            'descripcion'=> 'ENGLISH',
            'categoria_id'=> $lenguages->id
        ]);

        Catalogo::updateOrCreate([
            'nombre'=> 'PORTUGUESE',
            'descripcion'=> 'PORTUGUESE',
            'categoria_id'=> $lenguages->id
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'SPANISH',
            'descripcion'=> 'SPANISH',
            'categoria_id'=> $lenguages->id
        ]);







        
    }
}
