<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'Leonard',
            'last_name' => 'cuenca',
            'email' => 'cuenca623@gmail.com',
            'password'=>Hash::make('hola')
        ]);
    }
}
