<?php

use App\Http\Controllers\AtencionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\EtniaController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\TipoAyudaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\ParienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Route::get('/admin/eventos/{id}/fotos', [EventoController::class, 'addfotos']);
    
    
    
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('generos', GeneroController::class);
    Route::resource('zonas', ZonaController::class);
    Route::resource('etnias', EtniaController::class);
    Route::resource('tipoEventos', TipoEventoController::class);
    Route::resource('tipoAyudas', TipoAyudaController::class);
    Route::resource('eventos', EventoController::class);
    Route::resource('familias', FamiliaController::class);
    Route::resource('atenciones', AtencionController::class);
    Route::resource('parientes', ParienteController::class);
    
    //Route::get('/eventos/{id}/fotos', ['as' => 'eventos.addfotos' , 'uses' => 'EventoController@addfotos']);

    

    Route::controller(ParienteController::class)->group(function () {
        Route::get('/parientes/{familia}/create', 'create')->name('parientes.create');
    });
    Route::controller(AtencionController::class)->group(function () {
        Route::get('/atenciones/{familia}/create', 'create')->name('atenciones.create');
    });
    Route::controller(FamiliaController::class)->group(function () {

        Route::get('/familias/evento/{evento}', 'index')->name('familias.index');
        Route::get('/familias/evento/{evento}/create', 'create')->name('familias.create');
        
        //Route::post('/familias/{familia}', 'update')->name('familias.update');
        //Route::post('/orders', 'store');
    });

    Route::controller(EventoController::class)->group(function () {
        Route::get('/eventos/{evento}/fotos', 'addfotos')->name('eventos.addfotos');
        Route::post('/eventos/{evento}/fotos/create', 'storefoto')->name('eventos.addfotos.create');
        Route::get('/eventos/{evento}/cerrar', 'cerrar')->name('eventos.cerrar');
        Route::post('/eventos/{evento}/cerrar/close', 'storecerrar')->name('eventos.cerrar.close');
        //Route::post('/orders', 'store');
    });


});
