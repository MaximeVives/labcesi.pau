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

Route::get('/', 'mainController@home');
Route::get('/products', 'mainController@products');
Route::get('/sponsors', 'mainController@sponsors');
Route::get('/condition', 'mentionController@mention');
Route::get('/vente', 'mentionController@vente');
Route::get('/{n}', 'mainController@fiche_tech')->where('n', '[1-9]');

Route::get('/admi', 'admiController@admi');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
