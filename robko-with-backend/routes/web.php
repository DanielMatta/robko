<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Storage;
use App\Models\SchoolClassroom;

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

// Route::get('/store-data', [PostController::class , 'store']);
// Route::get('/', [ClassroomController::class, 'getClassroomShortName']);
// Route::get('/demo', [ClassroomController::class, 'getClassroomShortName']);
Route::get('/store-data', [ClassroomController::class, 'getClassroomId']);
// $url = Storage::url('../resources/maps/2poschodie.svg');
// Route::get('/',[$url]);
// Route::get('/mapa-1', [$url]);
