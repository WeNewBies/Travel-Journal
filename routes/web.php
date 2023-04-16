<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


Auth::routes();

Route::controller(FrontendController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home');
    Route::get('/blogs', 'blogs')->name('blogs');
});
Route::controller(FrontendController::class)->middleware(['auth'])->group(function () {
    Route::get('/planner', 'planner')->name('planner');
    Route::get('/create-plan', 'createPlan');
    Route::post('/store-plan', 'storePlan');
    Route::get('/check-itineraries/{id}', 'showItinerary');
    Route::get('/create-itinerary/{id}', 'createItinerary');
    Route::get('/edit-itinerary/{id}', 'editItinerary');
    Route::post('/store-itinerary', 'storeItinerary');
    Route::post('/udpate-itinerary', 'updateItinerary');
    Route::post('/delete-itinerary', 'deleteItinerary');
    Route::post('/delete-place', 'deletePlace');
    Route::post('/delete-journal', 'deleteJournal');
    Route::get('/journal', 'Journal');
    Route::get('/show-journal/{id}', 'showJournal');
    Route::get('/create-journal', 'addJournal');
    Route::post('/store-journal', 'storeJournal');
});
