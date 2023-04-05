<?php

use App\Http\Controllers\MainController;
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
Route::get('/midieta', [MainController::class, 'midieta'])->name('midieta');
Route::get('/clientes', [MainController::class, 'clientes'])->name('clientes');
Route::get('/mensajes', [MainController::class, 'mensajes'])->name('mensajes');

Route::get('/pruebas', [MainController::class, 'pruebas'])->name('pruebas');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
