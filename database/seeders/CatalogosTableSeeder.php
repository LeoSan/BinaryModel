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
        //Categoria Nacionalidad
        $nacionalidad = Categoria::Create([
            'codigo' => 'NACIONALIDAD',
            'nombre'=> 'NACIONALIDAD',
            'descripcion'=> 'Describe la nacionalidad del perfil'
        ]);
        
        //Categoria Nacionalidad
        $genero = Categoria::Create([
            'codigo' => 'GENERO',
            'nombre'=> 'GENERO',
            'descripcion'=> 'Describe el tipo de genero'
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
        
        
        //Catálogo de Nacionalidad
        Catalogo::updateOrCreate([
            'nombre'=> 'ESPAÑA',
            'descripcion'=> 'ESPAÑA',
            'categoria_id'=> $nacionalidad->id,
            'activo'=>0,
            
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'MÉXICO',
            'descripcion'=> 'MÉXICO',
            'categoria_id'=> $nacionalidad->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'COLOMBIA',
            'descripcion'=> 'COLOMBIA',
            'categoria_id'=> $nacionalidad->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'COLOMBIA',
            'descripcion'=> 'COLOMBIA',
            'categoria_id'=> $nacionalidad->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'VENEZUELA',
            'descripcion'=> 'VENEZUELA',
            'categoria_id'=> $nacionalidad->id,
            'activo'=>0,
        ]);

        //Catálogo de Genero
        Catalogo::updateOrCreate([
            'nombre'=> 'BINARIO',
            'descripcion'=> ' El género binario se refiere a las identidades de género que se identifican como masculinas o femeninas. Son las identidades de género más comunes y aceptadas en la sociedad',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'NO BINARIO',
            'descripcion'=> 'El género no binario se refiere a las identidades de género que no se identifican como masculinas ni femeninas. Pueden identificarse como agénero, bigénero, género fluido',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'INTERSEXUALIDAD',
            'descripcion'=> 'La intersexualidad es una condición en la que una persona nace con características sexuales que no se ajustan a las definiciones tradicionales de masculino o femenino',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'FLUIDO',
            'descripcion'=> 'El género fluido es una identidad de género que cambia o fluye con el tiempo. Una persona de género fluido puede identificarse como masculina un día, femenina al siguiente, o como algo completamente diferente',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'QUEER',
            'descripcion'=> 'El género queer es un término paraguas que se usa para describir las identidades de género que no se ajustan a las normas tradicionales.',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'FEMENINO',
            'descripcion'=> 'Femenino.',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        Catalogo::updateOrCreate([
            'nombre'=> 'MASCULINO',
            'descripcion'=> 'Masculino.',
            'categoria_id'=> $genero->id,
            'activo'=>0,
        ]);
        
    }
}
