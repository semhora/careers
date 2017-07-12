<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'events',
    'middleware' => ['cors']
], function() {
    Route::post('confirm', 'Events@confirm');
    Route::post('favorite', 'Events@favorite');
    Route::post('evaluate', 'Events@evaluate');
});

Route::group([
    'prefix' => 'files',
    'middleware' => ['cors']
], function() {
    Route::any('delete', 'Files@delete');
});
