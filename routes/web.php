<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;

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



    ///////////////QR Codes //////////

    Route::get('/qr', [QRCodeController::class, 'index'])->name('qr');
    Route::post('/qr', [QRCodeController::class, 'generate'])->name('qr.generate');    
    Route::get('/qr/{event_id}', [QRCodeController::class, 'eventqrs'])->name('qr.event');


    ///////////////Organisation //////////

    Route::get('/organisation', [OrganisationController::class, 'index'])->name('organisations');
    Route::post('/organisation', [OrganisationController::class, 'store'])->name('organisation.store');


    ///////////////event //////////

    Route::get('/event', [EventController::class, 'index'])->name('events');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
});

require __DIR__ . '/auth.php';
