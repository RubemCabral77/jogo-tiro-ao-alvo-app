<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\JogoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/ranking', [PartidaController::class, 'show'])->middleware(['auth', 'verified'])->name('partida.show');

Route::get('/jogo', [JogoController::class, 'show'])->middleware(['auth', 'verified'])->name('jogo.show');

Route::post('/partida/create', [PartidaController::class, 'create'])->middleware(['auth', 'verified'])->name('partida.create');

require __DIR__.'/auth.php';
