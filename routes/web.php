<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function(){
    return view('welcome');
});

Route::get('/tasks', 'App\Http\Controllers\TaskController@index'); // 메인페이지
Route::get('/tasks/create', 'App\Http\Controllers\TaskController@create'); // 글 작성
Route::post('/tasks', 'App\Http\Controllers\TaskController@store');
