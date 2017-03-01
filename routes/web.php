<?php

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

Route::get('prova','ReceptesController@prova');
Route::get('tot', 'ReceptesController@tot');

Route::get('busqueda', 'ReceptesController@vistaBuscar');
Route::get('buscar', 
	[
		'uses' => 'ReceptesController@busqueda',
		'as' => 'receptes.buscar'
	]);
