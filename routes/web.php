<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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
Route::get('/list', function () {
    return view('list');
})->name('list');

Route::get('/', 'App\Http\Controllers\IndexController@showIndex');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\AnnoncesController;
Route::get('index_perso', 'App\Http\Controllers\AnnoncesController@index_perso')->name('index_perso');
Route::resource('annonces', AnnoncesController::class);

require __DIR__.'/auth.php';

/*Route::resources([
   'annonces' => AnnoncesControler::class,
  //  'posts' => PostController::class,
]);*/
