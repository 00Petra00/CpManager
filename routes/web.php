<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', 'App\Http\Controllers\PagesController@index');

Route::resource('competitions', 'App\Http\Controllers\CompetitionsController');
Route::get('/competitions/{name}/{year}', 'App\Http\Controllers\CompetitionsController@show');
Route::get('/competitions/{name}/{year}/edit', 'App\Http\Controllers\CompetitionsController@edit');
Route::put('/competitions/{name}/{year}', 'App\Http\Controllers\CompetitionsController@update');
Route::delete('/competitions/{name}/{year}', 'App\Http\Controllers\CompetitionsController@destroy');

Auth::routes();
Route::get('/dashboard', 'App\Http\Controllers\PagesController@index');

Route::get('/competitions/{name}/{year}/create', 'App\Http\Controllers\RoundsController@create');
Route::resource('rounds', 'App\Http\Controllers\RoundsController');
Route::post('/rounds/{name}/{year}', 'App\Http\Controllers\RoundsController@store');

Route::resource('users', 'App\Http\Controllers\UsersController');
Route::get('/users/{id}/assigns', 'App\Http\Controllers\UsersController@assigns');
Route::get('/users/{user}/{round}', 'App\Http\Controllers\UsersController@competitor');
Route::get('/users/{user}', 'App\Http\Controllers\UsersController@profile');

Route::resource('competitors', 'App\Http\Controllers\CompetitorsController');
Route::delete('/competitors/{user}/{round}', 'App\Http\Controllers\CompetitorsController@destroy');
