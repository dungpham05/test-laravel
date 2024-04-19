<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    Route::post('login', 'AuthController@login');
});

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
});

Route::group([
    'namespace' => 'App\Http\Controllers\Api',
    'prefix' => 'blog',
    'middleware' => 'auth:sanctum',
], function ($router) {
    Route::get('list', 'BlogController@list');
    Route::get('detail', 'BlogController@detail');
    Route::get('create', 'BlogController@create');
    Route::get('update', 'BlogController@update');
    Route::get('delete', 'BlogController@delete');
});
