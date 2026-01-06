<?php

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
});