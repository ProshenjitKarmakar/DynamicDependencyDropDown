<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicDependencyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('show', [DynamicDependencyController::class, 'index']);
Route::post('show-state', [DynamicDependencyController::class, 'fetchState']);
Route::post('show-city', [DynamicDependencyController::class, 'fetchCity']);
Route::get('validation', [DynamicDependencyController::class, 'validation']);
