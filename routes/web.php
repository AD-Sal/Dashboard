<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;



Route::get('/','App\Http\Controllers\RelacionController@web');
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
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('auth');

//Route Hooks - Do not delete//
	Route::view('pelicula', 'livewire.peliculas.index')->middleware('auth');
	Route::view('alquiler', 'livewire.alquilers.index')->middleware('auth');
	Route::view('socio', 'livewire.socios.index')->middleware('auth');
	Route::view('formato', 'livewire.formatos.index')->middleware('auth');
	Route::view('director', 'livewire.directors.index')->middleware('auth');
	Route::view('genero', 'livewire.generos.index')->middleware('auth');
	Route::view('actor_pelicula', 'livewire.actor-peliculas.index')->middleware('auth');
	Route::view('actor', 'livewire.actors.index')->middleware('auth');
	Route::view('sexo', 'livewire.sexos.index')->middleware('auth');
	Route::view('user','profile.show')->middleware('auth');

	Route::view('report','livewire.Reporte.index')->middleware('auth');



	/** Routes AdminLTE */
	Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
	Route::get('director', function(){
		return view('livewire.directors.index');
	})->name('Director');

	Route::get('report/pdf', function(){
		return view('welcome');
	});
