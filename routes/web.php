<?php

use App\Http\Controllers\MainController;
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


Route::get('/', [ MainController::class, 'index' ])->name('home');
Route::get('/search', [ MainController::class, 'search' ])->name('search');

Route::post('/', [ MainController::class, 'create' ])->name('create');

Route::get('/delete/{id}', [ MainController::class, 'delete' ]);

Route::get('/change/{id}', [ MainController::class, 'getChange' ]);
Route::put('/', [ MainController::class, 'update' ])->name('update');
