<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{User};


class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::get();

        $palabras = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Maecenas scelerisque faucibus velit, eget accumsan nisl ultricies a.',
            'Etiam ac mauris scelerisque, laoreet augue ut, lacinia nibh.',
            'Cras ac lectus mauris.',
            'Donec ac enim eu quam ultricies scelerisque.',
            'Ut ac lectus orci.',
        ];

        return [
            'usuario_id'    => $user->unique()->random()->id,
            'ruta'          => 'public/archivos/1/lQJtvu6p0Y9E9ytBe877QhJCALxbMnryTWiwqlN7.jpg',
            'nombre'        => fake()->randomElement($palabras),
            'nombre_anexo'  => fake()->lastName(),
            'descripcion'   => fake()->randomElement($palabras),
            'extension'     => 'jpg',
            'peso'          => fake()->randomElement(['30KB', '35 KB', '40 KB', '45 KB', '50 KB', '55 KB', '60 KB', '65 KB', '70 KB', '75 KB', '80 KB', '85 KB', '90 KB']),
            'tipo'          => 'avatar',

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
