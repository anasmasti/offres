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
});

// Route::resource('produits', App\Http\Controllers\ProduitController::class);

// Produit routes
Route::get('/produits', 'App\Http\Controllers\ProduitController@index')->name('produit.index');
Route::get('/produits/{idpro}', 'App\Http\Controllers\ProduitController@show')->name('produit.show');

Route::get('/produit/add', 'App\Http\Controllers\ProduitController@store')->name('produit.store');
Route::post('/produit/add', 'App\Http\Controllers\ProduitController@store')->name('produit.store');

Route::get('/produits/edit/{idpro}', 'App\Http\Controllers\ProduitController@update')->name('produit.update');
Route::post('/produits/edit/{idpro}', 'App\Http\Controllers\ProduitController@update')->name('produit.update');

Route::delete('/produits/delete/{idpro}', 'App\Http\Controllers\ProduitController@destroy')->name('produit.destroy');

// Client routes
Route::get('/clients', 'App\Http\Controllers\ClientsController@index')->name('client.index');
Route::get('/clients/{idcli}', 'App\Http\Controllers\ClientsController@show')->name('client.show');

Route::get('/client/add', 'App\Http\Controllers\ClientsController@store')->name('client.store');
Route::post('/client/add', 'App\Http\Controllers\ClientsController@store')->name('client.store');

Route::get('/clients/edit/{idcli}', 'App\Http\Controllers\ClientsController@update')->name('client.update');
Route::post('/clients/edit/{idcli}', 'App\Http\Controllers\ClientsController@update')->name('client.update');

Route::delete('/clients/delete/{idcli}', 'App\Http\Controllers\ClientsController@destroy')->name('client.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
