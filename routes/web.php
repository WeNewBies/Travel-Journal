<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(FrontendController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home');
    Route::get('/blogs', 'blogs')->name('blogs');
});
