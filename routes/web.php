<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController; 
use App\Http\Controllers\SearchController; 
use App\Http\Controllers\MarketController;
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

Route::get('/{country}/market/search', [SearchController::class, 'search']);

Route::get('/{country}/market/{slug}', [LandingController::class, 'landing']);

Route::get('/{country}/market', [MarketController::class, 'home']);