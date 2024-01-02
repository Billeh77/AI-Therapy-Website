<?php

use App\Http\Controllers\ProfileController;
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
    return view('auth/login');
});

Route::middleware('auth')->group(function () {

    Route::post('/pregame', [App\Http\Controllers\GameController::class, 'create'])->name('game.create');
    Route::post('/pregame-newplayer', [App\Http\Controllers\GameController::class, 'addPlayer'])->name('game.addPlayer');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/share', [\App\Http\Controllers\ShareController::class, 'index'])->name('share');
    Route::post('/shareadvice', [\App\Http\Controllers\ShareController::class, 'create'])->name('share.create');

    Route::get('/dashboard', [\App\Http\Controllers\SupportController::class, 'index'])->name('dashboard');
    Route::post('/support', [\App\Http\Controllers\SupportController::class, 'support'])->name('support');
});


require __DIR__.'/auth.php';
