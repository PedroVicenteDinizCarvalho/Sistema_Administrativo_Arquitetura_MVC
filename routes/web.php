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
//Páginas Principais
	Route::get('/', 'UsuariosController@index');
	Route::get('/projetos', 'ProjetosController@projetos');
	Route::get('/clientes', 'ClientesController@clientes');
	Route::get('/faturamentos', 'FaturamentosController@faturamentos');
//Formulário e Criação de Clientes
	Route::get('/clientes/adicionar', 'ClientesController@pagAdicionarCliente');
	Route::post('/criarCliente', 'ClientesController@store');
//Formulário e Criação de Projetos
	Route::get('/projetos/adicionar', 'ProjetosController@pagAdicionarProjeto');
	Route::post('/criarProjeto', 'ProjetosController@CriaProjeto');
//Envio de Dados para view Home
	Route::get('/', 'ClientesController@home');
//Atualizar Clientes
	Route::get('/clientes/{id}/editar', 'ClientesController@editarView');
	Route::post('/clientes/update', 'ClientesController@update');
//Pesquisar Clientes
	Route::post('/clientes/busca', 'ClientesController@busca');
//Deletar Clientes
	Route::get('/clientes/{id}/deletar', 'ClientesController@deletarView');
	Route::get('/clientes/{id}/destroy', 'ClientesController@destroy');
//Atualizar Projetos
	Route::get('/projetos/{id}/editar', 'ProjetosController@editarView');
	Route::post('/projetos/update', 'ProjetosController@update');
//Deletar Projetos
	Route::get('/projetos/{id}/deletar', 'ProjetosController@deletarView');
	Route::get('/projetos/{id}/destroy', 'ProjetosController@destroy');
//Faturar Projeto
	Route::get('/projetos/{id}/faturar', 'ProjetosController@faturar');
	Route::post('/projetos/faturar', 'FaturamentosController@faturarProjeto');
//Pesquisar Projetos
	Route::post('/projetos/busca', 'ProjetosController@busca');
//Clientes passando letra como critério
	Route::get('/clientes/criterio/{letra}', 'ClientesController@clientesCriterio');
});
