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

/*Route::group(['prefix' => 'users'], function() {

    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::post('/registration', [UserController::class, 'registration'])->name('users.registration');
    Route::post('/authorization', [UserController::class, 'authorization'])->name('users.authorization');
    Route::get('/{id}/show', [UserController::class, 'show'])->name('users.show');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});*/

Route::resource('/users', UserController::class);

Route::resource('/task', TaskController::class);
Route::post('/task/{task}/comment', 'App\Http\Controllers\TaskController@comment')->name('task.comment');
Route::delete('/task/{task}/deleteFile', 'App\Http\Controllers\TaskController@deleteFile')->name('task.deleteFile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
