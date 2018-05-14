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

Route::group(['prefix' => 'home'], function() {
	Route::get('/', 'UsuariosController@index');
	Route::get('/projetos', 'ProjetosController@projetos');
	Route::get('/clientes', 'ClientesController@clientes');
	Route::get('/clientes/adicionar', 'ClientesController@pagAdicionarCliente');
	Route::post('/criarCliente', 'ClientesController@store');
	Route::get('/projetos/adicionar', 'ProjetosController@pagAdicionarProjeto');
	Route::post('/criarProjeto', 'ProjetosController@CriaProjeto');
	Route::get('/', 'ProjetosController@home');
	Route::get('/', 'ClientesController@home');
	Route::get('/clientes/{id}/editar', 'ClientesController@editarView');
	Route::post('/clientes/update', 'ClientesController@update');
	Route::get('/clientes/{id}/deletar', 'ClientesController@deletarView');
	Route::get('/clientes/{id}/destroy', 'ClientesController@destroy');
	Route::get('/projetos/{id}/editar', 'ProjetosController@editarView');
	Route::post('/projetos/update', 'ProjetosController@update');
	Route::get('/projetos/{id}/deletar', 'ProjetosController@deletarView');
	Route::get('/projetos/{id}/destroy', 'ProjetosController@destroy');
});
