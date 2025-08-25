<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Admin\MessageCrudController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('booking-table', 'BookingTableCrudController');
    Route::crud('client', 'ClientCrudController');
    Route::crud('university-application', 'UniversityApplicationCrudController');

     Route::crud('university', 'UniversityCrudController');
    Route::crud('message', 'MessageCrudController');


Route::get('message/chat', [MessageCrudController::class, 'chat'])->name('message.chat');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
