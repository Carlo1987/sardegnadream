<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
        Route::post('/users', [UserController::class, 'upsert'])->name('users.upsert');
        Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
    });

    //  Rotte case
    Route::get('/homes', [HomeController::class, 'show'])->name('homes.show');
    
    Route::get('/home/step1/{id?}', [HomeController::class, 'step1'])->name('home.step1');
    Route::post('/homes/step1', [HomeController::class, 'postStep1'])->name('home.postStep1');

    Route::get('/home/step2', [HomeController::class, 'step2'])->name('home.step2');
    Route::post('/homes/step2', [HomeController::class, 'postStep2'])->name('home.postStep2');

    Route::get('/home/step3', [HomeController::class, 'step3'])->name('home.step3');
    Route::post('/homes/step3', [HomeController::class, 'postStep3'])->name('home.postStep3');

    Route::get('/home/step4', [HomeController::class, 'step4'])->name('home.step4');
    Route::post('/homes/step4', [HomeController::class, 'postStep4'])->name('home.postStep4');

     Route::get('/home/step5', [HomeController::class, 'step5'])->name('home.step5');
    Route::post('/homes', [HomeController::class, 'upsert'])->name('homes.upsert');
   
    Route::delete('/homes', [HomeController::class, 'destroy'])->name('homes.destroy');

});

require __DIR__.'/auth.php';
