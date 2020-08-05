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


Route::get('/series', 'SeriesController@index')->name('serie.listar');
Route::get('/series/criar', 'SeriesController@create')->name('serie.criar');
Route::post('/series/adicionar', 'SeriesController@store')->name('serie.adicionar');
Route::post('/series/remover/{id}', 'SeriesController@destroy')->name('serie.remover');

Route::get('/categorias', 'CategoriasController@listarCategorias');
Route::get('/categorias/criar', 'CategoriasController@create');

Route::get('/idiomas', 'IdiomasController@listarIdiomas');
Route::get('/idiomas/criar', 'IdiomasController@create');

Route::get('/premios', 'PremiosController@listarPremios');
Route::get('/premios/criar', 'PremiosController@create');

Route::get('/status', 'StatusController@listarStatus');
Route::get('/status/criar', 'StatusController@create');

