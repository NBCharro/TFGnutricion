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

// Route::get('/', [MainController::class, 'index'])->name('inicio');
Route::get('/inicio', [MainController::class, 'index'])->name('inicio');
Route::get('/midieta', [MainController::class, 'midieta'])->name('midieta');

Route::get('/', [MainController::class, 'pruebas'])->name('pruebas');


Auth::routes();
