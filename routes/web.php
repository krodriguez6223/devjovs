<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificaciónController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');
//ruta para crear la vista de registro de vacante
Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
//mostrar la vista de la pagina de editar un cliente
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
//mostrar vacantes en la pagina de inicio
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');
//mostrar los candidatos de una vacante
Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');

//Notifiaciones
Route::get('/notificaciones', NotificaciónController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones');
require __DIR__.'/auth.php';
