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
});
