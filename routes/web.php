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

// offre routes
Route::get('/offres', 'App\Http\Controllers\OffresController@index')->name('offre.index');
Route::get('/offres/{idpro}', 'App\Http\Controllers\OffresController@show')->name('offre.show');

Route::get('/offre/add', 'App\Http\Controllers\OffresController@store')->name('offre.store');
Route::post('/offre/add', 'App\Http\Controllers\OffresController@store')->name('offre.store');

Route::get('/offres/edit/{idpro}', 'App\Http\Controllers\OffresController@update')->name('offre.update');
Route::post('/offres/edit/{idpro}', 'App\Http\Controllers\OffresController@update')->name('offre.update');

Route::delete('/offres/delete/{idpro}', 'App\Http\Controllers\OffresController@destroy')->name('offre.destroy');

// employees routes
Route::get('/employees', 'App\Http\Controllers\EmployeesController@index')->name('employee.index');
Route::get('/employees/{idcli}', 'App\Http\Controllers\EmployeesController@show')->name('employee.show');

Route::get('/employee/add', 'App\Http\Controllers\EmployeesController@store')->name('employee.store');
Route::post('/employee/add', 'App\Http\Controllers\EmployeesController@store')->name('employee.store');

Route::get('/employees/edit/{idcli}', 'App\Http\Controllers\EmployeesController@update')->name('employee.update');
Route::post('/employees/edit/{idcli}', 'App\Http\Controllers\EmployeesController@update')->name('employee.update');

Route::delete('/employees/delete/{idcli}', 'App\Http\Controllers\EmployeesController@destroy')->name('employee.destroy');

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});

// postuler routes
Route::get('/postules/postuler',[App\Http\Controllers\PostulesController::class,'postuler'])->name('postule.form');
Route::post('/postules/postuler',[App\Http\Controllers\PostulesController::class,'postuler'])->name('postule.form');
Route::get('/postules',[App\Http\Controllers\PostulesController::class,'list'])->name('postule.list');
