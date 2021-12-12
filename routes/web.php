<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function() {

    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/registration', [UserController::class, 'registration'])->name('user.registration');
    Route::post('/authorization', [UserController::class, 'authorization'])->name('user.authorization');
    Route::get('/{id}/show', [UserController::class, 'show'])->name('user.show');
    Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
});

Route::resource('/task', TaskController::class);
