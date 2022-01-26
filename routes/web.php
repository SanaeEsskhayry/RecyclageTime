<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BongesteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChallengeController;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/users', UsersController::class)->middleware(['auth']);
Route::resource('/categorie', CategorieController::class)->middleware(['auth']);
Route::resource('/postes', PosteController::class)->middleware(['auth']);
Route::put('updatestatut/{id}','App\Http\Controllers\PosteController@updatestatut')->middleware(['auth']);
Route::resource('/challenges', ChallengeController::class)->middleware(['auth']);
Route::resource('/bongestes', BongesteController::class)->middleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
