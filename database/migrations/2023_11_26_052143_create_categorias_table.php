<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->string('codigo')->comment('Campo que indica el codigo ');
            $table->string('nombre')->nullable()->comment('Campo que indica el codigo padre ');
            $table->string('descripcion')->nullable()->comment('Campo que indica el codigo padre ');
            $table->string('union')->nullable()->comment('Campo que indica unicon de categorias por ejemplo Habilidades del Perfil ');
            $table->boolean('activo')->default(true)->comment('Campo que indica el codigo padre ');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogos');
    }
};
