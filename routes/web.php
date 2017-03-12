<?php

use App\Ingredient;

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
    $ingredients = Ingredient::all();

    return view('welcome')->with('ingredients', $ingredients);
});

/*  PROVES */
Route::get('/ingredients/get','IngredientsController@tot');
Route::get('prova','ReceptesController@prova');
Route::get('tot', 'ReceptesController@tot');

/* BUSQUEDA */
Route::get('busqueda', 'ReceptesController@vistaBuscar');
Route::get('buscar',
	[
		'uses' => 'ReceptesController@busqueda',
		'as' => 'receptes.buscar'
	]);

Route::get('/receptes/{id}', [
    'uses' => 'ReceptesController@vistaVeureRecepta',
    'as' => 'vista.veure.recepta'
]);

/* RUTES D'AUTENTICACIO */
Auth::routes();
Route::get('/home', 'HomeController@index');

/* ADMINS */
Route::group(['prefix' => 'gestio', 'middleware' => ['auth']], function () {

    Route::get('/', [
        'uses' => 'ReceptesController@tot',
        'as' => 'admin.tauler'
    ]);

    Route::get('receptes', [
        'uses' => 'ReceptesController@tot',
        'as' => 'admin.tauler'
    ]);

    Route::get('/receptes/crear', [
        'uses' => 'ReceptesController@vistaCrearRecepta',
        'as' => 'vista.crear.recepta'
    ]);

    Route::post('/receptes/afegir', [
        'uses' => 'ReceptesController@afegirRecepta',
        'as' => 'afegir.recepta'
    ]);
/*
    Route::get('/receptes/esborrar', [
        'uses' => 'ReceptesController@esborrarRecepta',
        'as' => 'esborrar.recepta'
    ]);*/

    Route::get('/receptes/esborrar/{id}', 'ReceptesController@esborrarRecepta');

});
