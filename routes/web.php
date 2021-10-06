<?php

use Illuminate\Support\Facades\Route;

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
    
});

Route::get('/', [App\Http\Controllers\enterController::class, 'start'])->name('start');
Route::post('enter', [App\Http\Controllers\enterController::class, 'chek'])->name('enter');
Route::get('enter', [App\Http\Controllers\enterController::class, 'chek'])->name('enter');
Route::get('list', [App\Http\Controllers\enterController::class, 'list'])->name('list');


Route::get('/reg', function () {
    return view('reg');
	
});