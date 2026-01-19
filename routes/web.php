<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//lucas - module manage application
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(ApplicationController::class)->group(function () {
        Route::get('/application', 'index')->name('application.index');
        Route::get('/application/create/{hostel}', 'create')->name('application.create');
        Route::post('/application', 'store')->name('application.store');
        Route::get('/application/{application}/edit', 'edit')->name('application.edit');
        Route::put('/application/{application}', 'update')->name('application.update');
        Route::delete('/application/{application}', 'destroy')->name('application.destroy');
        Route::get('/application/searchRollNo', 'searchRollNo')->name('application.searchRollNo');
    });
    // --- Resyalizatul-> Room Module ---
    Route::middleware(['auth', 'manager'])->group(function () {
    Route::prefix('rooms')->name('rooms.')->group(function () {
        // Display
        Route::get('/allocated', [RoomController::class, 'allocated'])->name('allocated');
        Route::get('/empty', [RoomController::class, 'empty'])->name('empty');
        // Create
        Route::get('/create', [RoomController::class, 'create'])->name('create');
        Route::post('/store', [RoomController::class, 'store'])->name('store');
        // Editing
        Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
        Route::put('/{room}/update', [RoomController::class, 'update'])->name('update');
        // Vacate
        Route::get('/vacate', [RoomController::class, 'showVacate'])->name('showVacate');
        Route::post('/vacate', [RoomController::class, 'vacate'])->name('vacate');
        // Delete
        Route::delete('/{room}', [RoomController::class, 'destroy'])->name('destroy');
    });});

});
