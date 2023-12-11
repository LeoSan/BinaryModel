<?php

use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth')->name('perfil.')->group(function() {

    Route::get('/formulario/',[PerfilController::class,'showFormulario'])->name('form.perfil');
    Route::get('/vista/',[PerfilController::class,'showVistaPrevia'])->name('vista.perfil');
    Route::post('/registrar/',[PerfilController::class,'storePerfil'])->name('registrar.perfil');

//});
