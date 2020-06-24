<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/admi', 'admiController@admi')->middleware('checkAdmin');

Route::get('/ajout_produit', 'admiController@ajout_Produit')->middleware('checkAdmin');
Route::post('/ajout_produit', 'ProductController@store')->middleware('checkAdmin');

Route::post('/envoie', 'ProductController@store')->middleware('checkAdmin');


// Paramètres de compte
Route::get('/myaccount', 'accountController@myaccount')->middleware('checkAuth');

Route::get('/mes-infos', 'accountController@infos')->middleware('checkAuth');
Route::post('/modification', 'accountController@Upinfos')->middleware('checkAuth');

Route::get('/mes-donnees', 'accountController@donnees')->middleware('checkAuth');
Route::get('/suppr-account', 'accountController@supprData')->middleware('checkAuth');
Route::get('/perso-data', 'accountController@exportData')->middleware('checkAuth');


Route::get('/mes-commandes', 'accountController@commandes')->middleware('checkAuth');
Route::get('/fin-cookies', 'accountController@cookies')->middleware('checkAuth');


Route::get('/envoie', 'admiController@store');
Route::post('/envoie', 'admiController@store');

Route::get('/delete', 'admiController@delete');
Route::post('/delete', 'admiController@delete');

Route::get('/update', 'admiController@update');
Route::post('/update', 'admiController@update');


Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
