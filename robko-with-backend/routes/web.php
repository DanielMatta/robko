<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Storage;
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
    return view('app');
});

Route::get('/store-data', [PostController::class,'store']);
// $url = Storage::url('../resources/maps/2poschodie.svg');
// Route::get('/',[$url]);
// Route::get('/mapa-1', [$url]);