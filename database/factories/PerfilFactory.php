<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Catalogo, Categoria};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $cate_nacionalidad = Categoria::where('nombre', 'NACIONALIDAD')->first();
        $cate_genero = Categoria::where('nombre', 'GENERO')->first();
        $user = User::get();
        $cat_nacionalidad = Catalogo::where('categoria_id', $cate_nacionalidad->id)->get();
        $cat_genero = Catalogo::where('categoria_id', $cate_genero->id)->get();

        $color_ojos = ['gris', 'verde', 'azul', 'marron', 'cafe', 'miel' ];
        $color_cabello = ['negro', 'castaño', 'rubio', 'azul','blanco', 'gris', 'colorido'];
        $calzado = [4.5, 5, 5.5, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11];
        $anio = [1988, 1989, 1990, 1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 2000, 2001, 2002, 2003, 2004, 2005];
        $number = [0, 5,10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90];

        $palabras = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Maecenas scelerisque faucibus velit, eget accumsan nisl ultricies a.',
            'Etiam ac mauris scelerisque, laoreet augue ut, lacinia nibh.',
            'Cras ac lectus mauris.',
            'Donec ac enim eu quam ultricies scelerisque.',
            'Ut ac lectus orci.',
        ];

        return [
            'usuario_id'       => $user->unique()->random()->id,
            'nacionalidad_id'  => $cat_nacionalidad->random()->id,
            'genero_id'        => $cat_genero->random()->id,
            'nombre_completo'  => fake()->lastName(),
            'fecha_nacimiento' => fake()->randomElement($anio)."-".date("m")."-".date("d"),
            'altura'           => fake()->randomElement([1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2]),
            'busto'            => fake()->randomElement([30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90]),
            'cintura'          => fake()->randomElement([30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90]),
            'cadera'           => fake()->randomElement([30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90]),
            'calzado'          => fake()->randomElement($calzado),
            'color_ojos'       => fake()->randomElement($color_ojos),
            'color_cabello'    => fake()->randomElement($color_cabello),
            'biografia'        => fake()->randomElement($palabras),
            'likes'            => fake()->randomElement($number),
            'views'            => fake()->randomElement($number),
            'check_publicar' => fake()->randomElement([0,1]),
            'check_publicar_avatar' => fake()->randomElement([0,1]),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        // return $this->state(fn (array $attributes) => [
        //     'email_verified_at' => null,
        // ]);
    }
}
