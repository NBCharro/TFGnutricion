<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComenzarMiPlanController;
use App\Http\Controllers\DietasController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\MiDietaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('inicio');
// Route::post('/buscar_cliente', [MainController::class, 'buscar_cliente'])->name('buscar_cliente');
Route::post('/mensaje_externo', [MainController::class, 'mensaje_externo'])->name('mensaje_externo');
// Pruebas
Route::match(['get', 'post'], '/pruebas', [MainController::class, 'pruebas'])->name('pruebas');


Route::match(['get', 'post'], '/dietas', [DietasController::class, 'dietas'])->name('dietas');
Route::post('/modificar_cliente', [DietasController::class, 'modificar_cliente'])->name('modificar_cliente');
Route::post('/nuevo_cliente', [DietasController::class, 'nuevo_cliente'])->name('nuevo_cliente');
Route::post('/actualizar_cliente', [DietasController::class, 'actualizar_cliente'])->name('actualizar_cliente');
Route::post('/borrar_cliente', [DietasController::class, 'borrar_cliente'])->name('borrar_cliente');


Route::match(['get', 'post'], '/comenzarmiplan', [ComenzarMiPlanController::class, 'comenzarmiplan'])->name('comenzarmiplan');
Route::post('/guardar_respuestas_comenzarmiplan', [ComenzarMiPlanController::class, 'guardar_respuestas_comenzarmiplan'])->name('guardar_respuestas_comenzarmiplan');


Route::match(['get', 'post'], '/midieta', [MiDietaController::class, 'midieta'])->name('midieta');
Route::post('/mensaje_interno', [MiDietaController::class, 'mensaje_interno'])->name('mensaje_interno');


Route::match(['get', 'post'], '/clientes', [ClientesController::class, 'clientes'])->name('clientes');
Route::post('/guardar_peso', [ClientesController::class, 'guardar_peso'])->name('guardar_peso');


Route::match(['get', 'post'], '/mensajes', [MensajesController::class, 'mensajes'])->name('mensajes');


// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Tablas de la DB
Route::resource('contacto_interno', 'App\Http\Controllers\Contacto_InternoController');
