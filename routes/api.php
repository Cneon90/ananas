<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registration', [App\Http\Controllers\UserController::class, 'registration'])->name('registration');
Route::post('loging', [App\Http\Controllers\UserController::class, 'loging'])->name('loging');
Route::post('authorization', [App\Http\Controllers\UserController::class, 'authorization'])->name('authorization');

Route::post('add_posts', [App\Http\Controllers\PostController::class, 'add_posts'])->name('add_posts');
Route::post('all_posts', [App\Http\Controllers\PostController::class, 'all_posts'])->name('show_posts');
Route::post('post/{id}', [App\Http\Controllers\PostController::class, 'post'])->name('post');

//Route::get('test', [App\Http\Controllers\UserController::class, 'register']);


