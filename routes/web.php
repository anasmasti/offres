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
// Main routes
Route::get('/',[App\Http\Controllers\MAinController::class,'index'])->name('welcome');
Route::get('/home',[App\Http\Controllers\MAinController::class,'index'])->name('welcome.home');

// Route::resource('produits', App\Http\Controllers\ProduitController::class);

// offre routes
Route::get('/offres', 'App\Http\Controllers\OffresController@index')->name('offre.index');
Route::get('/offres/{idpro}', 'App\Http\Controllers\OffresController@show')->name('offre.show');

Route::get('/offre/add', 'App\Http\Controllers\OffresController@store')->name('offre.store');
Route::post('/offre/add', 'App\Http\Controllers\OffresController@store')->name('offre.store');

Route::get('/offres/edit/{idpro}', 'App\Http\Controllers\OffresController@update')->name('offre.update');
Route::post('/offres/edit/{idpro}', 'App\Http\Controllers\OffresController@update')->name('offre.update');

Route::delete('/offres/delete/{idpro}', 'App\Http\Controllers\OffresController@destroy')->name('offre.destroy');
Route::get('/sitemap.xml',[App\Http\Controllers\OffresController::class,'afficherSitemap'])->name('ventes.sitemap');

// employees routes
Route::get('/employees', 'App\Http\Controllers\EmployeesController@index')->name('employee.index');
Route::get('/employees/{idemp}', 'App\Http\Controllers\EmployeesController@show')->name('employee.show');

Route::get('/employee/add', 'App\Http\Controllers\EmployeesController@store')->name('employee.store');
Route::post('/employee/add', 'App\Http\Controllers\EmployeesController@store')->name('employee.store');

Route::get('/employees/edit/{idemp}', 'App\Http\Controllers\EmployeesController@update')->name('employee.update');
Route::post('/employees/edit/{idemp}', 'App\Http\Controllers\EmployeesController@update')->name('employee.update');

Route::delete('/employees/delete/{idemp}', 'App\Http\Controllers\EmployeesController@destroy')->name('employee.destroy');

Auth::routes();

// postuler routes
Route::get('/postules/postuler/{offreId}',[App\Http\Controllers\PostulesController::class,'postuler'])->name('postule.form');
Route::post('/postules/postuler/{offreId}',[App\Http\Controllers\PostulesController::class,'postuler'])->name('postule.form');
Route::get('/postules',[App\Http\Controllers\PostulesController::class,'list'])->name('postule.list');

Route::get('/users/{user}',  [App\Http\Controllers\UserController::class,'update'])->name('users.update');
Route::post('/users/{user}',  [App\Http\Controllers\UserController::class,'update'])->name('users.update');
Route::delete('/users/{user}',  [App\Http\Controllers\UserController::class,'destroy'])->name('users.destroy');