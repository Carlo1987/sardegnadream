<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //  Rotte profilo utente loggato
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Rotte gestione utenti
    Route::middleware('isAdmin')->group(function () {
        Route::get('/users', [UserController::class, 'show'])->name('users.show');
        Route::post('/users/{id?}', [UserController::class, 'upsert'])->name('users.upsert');
        Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
    });

});

require __DIR__.'/auth.php';
