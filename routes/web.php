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
    return view('welcome');
})->middleware('guest');


Route::get('messages', [\App\Http\Controllers\MessageController::class, 'messages'])
    ->name('messages')->middleware('auth');

Route::get('{username}', [\App\Http\Controllers\MessageController::class, 'user'])
    ->name('get.user');

Route::post('{id}', [\App\Http\Controllers\MessageController::class, 'msgStore'])
    ->name('post.user');

Route::group(['prefix' => 'user', 'middileware' => 'auth'], function() {
    Route::get('settings', [\App\Http\Controllers\UserController::class, 'userSettings'])
        ->name('get.settings');

    Route::put('general', [\App\Http\Controllers\UserController::class, 'general'])
        ->name('update.general');

    Route::put('password', [\App\Http\Controllers\UserController::class, 'password'])
        ->name('update.password');
});

Route::get('login/{provider}', [\App\Http\Controllers\LoginController::class, 'handle'])
    ->where(['provider' => 'twitter|facebook'])->name('social.handle');
Route::get('login/{provider}/callback', [\App\Http\Controllers\LoginController::class, 'handleCallback']);
