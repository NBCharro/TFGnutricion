<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MensajesController;
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

Route::post('/buscar_cliente', [MainController::class, 'buscar_cliente'])->name('buscar_cliente');
Route::post('/modificar_cliente', [MainController::class, 'modificar_cliente'])->name('modificar_cliente');
Route::post('/nuevo_cliente', [MainController::class, 'nuevo_cliente'])->name('nuevo_cliente');
Route::post('/guardar_respuestas_comenzarmiplan', [MainController::class, 'guardar_respuestas_comenzarmiplan'])->name('guardar_respuestas_comenzarmiplan');
Route::post('/actualizar_cliente', [MainController::class, 'actualizar_cliente'])->name('actualizar_cliente');
Route::post('/mensaje_externo', [MainController::class, 'mensaje_externo'])->name('mensaje_externo');
Route::post('/mensaje_interno', [MainController::class, 'mensaje_interno'])->name('mensaje_interno');
Route::post('/guardar_peso', [MainController::class, 'guardar_peso'])->name('guardar_peso');
Route::post('/borrar_cliente', [MainController::class, 'borrar_cliente'])->name('borrar_cliente');

// Paginas que admitan GET y POST
Route::match(['get', 'post'], '/midieta', [MainController::class, 'midieta'])->name('midieta');
Route::match(['get', 'post'], '/comenzarmiplan', [MainController::class, 'comenzarmiplan'])->name('comenzarmiplan');
Route::match(['get', 'post'], '/clientes', [MainController::class, 'clientes'])->name('clientes');
Route::match(['get', 'post'], '/dietas', [MainController::class, 'dietas'])->name('dietas');
Route::match(['get', 'post'], '/mensajes', [MensajesController::class, 'mensajes'])->name('mensajes');

// Pruebas
Route::match(['get', 'post'], '/pruebas', [MainController::class, 'pruebas'])->name('pruebas');

// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Tablas de la DB
Route::resource('contacto_interno', 'App\Http\Controllers\Contacto_InternoController');
