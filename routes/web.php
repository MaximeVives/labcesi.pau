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
Route::get('/products', 'mainController@products')->name('productPage');
Route::get('/sponsors', 'mainController@sponsors');
Route::get('/condition', 'mentionController@mention');
Route::get('/vente', 'mentionController@vente');





Route::get('/admi', 'admiController@admi')->middleware('checkAdmin');
Route::post('/admi', 'admiController@admi')->middleware('checkAdmin');

Route::get('/ajout_produit', 'admiController@ajout_Produit')->middleware('checkAdmin');
Route::post('/ajout_produit', 'ProductController@store')->middleware('checkAdmin');



// Paramètres de compte
Route::get('/myaccount', 'accountController@myaccount')->middleware('checkAuth');

Route::get('/mes-infos', 'accountController@infos')->middleware('checkAuth');
Route::post('/modification', 'accountController@Upinfos')->middleware('checkAuth');

Route::get('/mes-donnees', 'accountController@donnees')->middleware('checkAuth');
Route::get('/suppr-account', 'accountController@supprData')->middleware('checkAuth');
Route::get('/perso-data', 'accountController@exportData')->middleware('checkAuth');


Route::get('/mes-commandes', 'accountController@commandes')->middleware('checkAuth');
Route::get('/fin-cookies', 'accountController@cookies')->middleware('checkAuth');



// ADMINISTRATION

// Accueil
Route::get('/admi', 'admiController@admi')->middleware('checkAdmin');

// Accès aux pages depuis le board
Route::get('/ajout_produit', 'admiController@ajout_Produit')->middleware('checkAdmin');
Route::get('/modif', 'admiController@modif_produit')->middleware('checkAdmin');
// Route::post('/modif', 'admiController@modif_produit')->middleware('checkAdmin');
Route::get('/liste-commande', 'admiController@liste_commande')->middleware('checkAdmin');

Route::get('/calendrier-reservation', 'calendarController@calendrier_reservation')->middleware('checkAdmin');
Route::post('/addEvent', 'calendarController@add_event')->middleware('checkAdmin');
// Route::get('/upEvent', 'calendarController@up_event')->middleware('checkAdmin');
Route::post('/upEvent', 'calendarController@up_event')->middleware('checkAdmin');
Route::get('/calendar/{n}', 'calendarController@fiche_event')->where('n', '.+'); //#TODO Fiche event


// Ajout produit
Route::get('/envoie', 'admiController@store')->middleware('checkAdmin');
Route::post('/envoie', 'admiController@store')->middleware('checkAdmin');

// Supprimer produit
Route::get('/delete', 'admiController@delete')->middleware('checkAdmin');
Route::post('/delete', 'admiController@delete')->middleware('checkAdmin');

// Modifier produit
Route::get('/update', 'admiController@update')->middleware('checkAdmin');
Route::post('/update', 'admiController@update')->middleware('checkAdmin');


Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');



// PANIER
// Routes pour le fonctionnement du Panier
Route::get('/panier', 'CartController@index')->name('cart.index')->middleware('checkAuth');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store')->middleware('checkAuth');
Route::get('/panier/vider', function () {
    Cart::destroy();
})->middleware('checkAuth');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy')->middleware('checkAuth');
Route::post('/commande', 'OrderController@store')->name('order.add')->middleware('checkAuth');


//FROM order TO delivery
Route::post('/transform-delivery', 'admiController@valOrder')->middleware('checkAdmin');
Route::post('/delivery-down', 'admiController@valDelivery')->middleware('checkAdmin');



//A METTRE A LA FIN A CAUSE DU WHERE
Route::get('/{n}', 'mainController@fiche_tech')->where('n', '.+');
