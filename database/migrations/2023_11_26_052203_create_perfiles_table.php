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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->unsignedBigInteger('usuario_id')->comment('Campo FK relacionado con la tabla usuario');
            $table->date('fecha_nacimiento')->nullable()->comment('Campo que indicará la edad por la fecha de nacimiento');
            $table->double('altura')->default('0.00')->comment('Campo que indica la altura en cm.');
            $table->double('busto')->default('0.00')->comment('Campo que indica la pecho ó busto en cm.');
            $table->double('cintura')->default('0.00')->comment('Campo que indica la cintura en cm.');
            $table->double('cadera')->default('0.00')->comment('Campo que indica la cadera en cm.');
            $table->double('calzado')->default('0.00')->comment('Campo que indica la calzado en cm.');
            $table->string('color_ojos', '30')->comment('Campo que indica el color de ojos');
            $table->string('color_cabello', '30')->comment('Campo que indica el color de ojos');
            $table->longText('biografia')->nullable()->default(null)->comment('Campo biografia');
            $table->boolean('check_publicar')->comment('campo que indica si desea que su perfil pueda ser publicado');


            $table->timestamps();
            $table->softDeletes();

            //Relaciones
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiles');
    }
};
