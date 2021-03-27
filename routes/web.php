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


Route::get('/queue' , function (){
    \App\Models\UserData::all()->each(function ($item){
        dispatch(new \App\Jobs\ParserJob($item->only('user_ip' , 'user_agent')))->onQueue('parsing');
        $item->delete();
    });
});
Route::get('/geo' , [\App\Http\Controllers\VisitController::class , 'getData']);
Route::view('/' , 'index');

Route::get('/user' , [\App\Http\Controllers\UserController::class , 'showUser'])->middleware('auth');

Route::get('/login' , [\App\Http\Controllers\UserController::class , 'login'])->name('login')->middleware('guest');
Route::post('/login' , [\App\Http\Controllers\UserController::class , 'store'])->middleware('guest');

Route::get('/logout' , [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth');
Route::get('/oauth/github/callback' , [\App\Http\Controllers\GithubController::class , 'callback'])->middleware('guest');
Route::get('/oauth/spotify/callback' , [\App\Http\Controllers\SpotifyController::class , 'callback'])->middleware('guest');

