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
        Schema::create('catalogos', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->unsignedBigInteger('categoria_id')->comment('Campo FK relacionado con la tabla usuario');
            $table->string('nombre')->nullable()->comment('Campo nombre ');
            $table->string('descripcion')->nullable()->comment('Campo descripcion ');
            $table->boolean('activo')->default(true)->comment('Campo que indica si esta activo ');

            //Relaciones
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

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
