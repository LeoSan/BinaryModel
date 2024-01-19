<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search',[SearchController::class,'search'])->name('search');
Route::get('/{id}/perfil',[SearchController::class,'perfil'])->name('search.perfil');

// use Illuminate\Support\Facades\Artisan;
// Route::get('link', function(){
//     Artisan::call('cache:clear');
//     Artisan::call('storage:link');
// });
