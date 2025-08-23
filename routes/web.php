<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientLookupController;



Route::get('/', [BookingController::class, 'BookingIndex']);
Route::post('dataInsert',[BookingController::class, 'DataInsert']);


Route::get('/', function () {
     return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/client-lookup', [ClientLookupController::class, 'index'])->name('client.lookup');
Route::post('/client-lookup', [ClientLookupController::class, 'search'])->name('client.search');

