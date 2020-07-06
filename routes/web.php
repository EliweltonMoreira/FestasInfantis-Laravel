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

Auth::routes();

Route::get('/cliente', ['uses' => 'ClienteController@index', 'as' => 'cliente.index']);
Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar', 'as'=>'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@salvar', 'as'=>'cliente.salvar']);
Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@editar', 'as'=>'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@atualizar', 'as'=>'cliente.atualizar']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@deletar', 'as'=>'cliente.deletar']);

Route::get('/cliente/detalhe/{id}', ['uses'=>'ClienteController@detalhe', 'as'=>'cliente.detalhe']);
Route::get('/aluguel/adicionar/{id}', ['uses'=>'AluguelController@adicionar', 'as'=>'aluguel.adicionar']);
Route::post('/aluguel/salvar/{id}', ['uses'=>'AluguelController@salvar', 'as'=>'aluguel.salvar']);
Route::get('/aluguel/editar/{id}', ['uses'=>'AluguelController@editar', 'as'=>'aluguel.editar']);
Route::put('/aluguel/atualizar/{id}', ['uses'=>'AluguelController@atualizar', 'as'=>'aluguel.atualizar']);
Route::get('/aluguel/deletar/{id}', ['uses'=>'AluguelController@deletar', 'as'=>'aluguel.deletar']);

Route::get('/tema', ['uses' => 'TemaController@index', 'as' => 'tema.index']);
Route::get('/tema/adicionar', ['uses'=>'TemaController@adicionar', 'as'=>'tema.adicionar']);
Route::post('/tema/salvar', ['uses'=>'TemaController@salvar', 'as'=>'tema.salvar']);
Route::get('/tema/editar/{id}', ['uses'=>'TemaController@editar', 'as'=>'tema.editar']);
Route::put('/tema/atualizar/{id}', ['uses'=>'TemaController@atualizar', 'as'=>'tema.atualizar']);
Route::get('/tema/deletar/{id}', ['uses'=>'TemaController@deletar', 'as'=>'tema.deletar']);

Route::get('/tema/detalhe/{id}', ['uses'=>'TemaController@detalhe', 'as'=>'tema.detalhe']);
Route::get('/item/adicionar/{id}', ['uses'=>'ItemController@adicionar', 'as'=>'item.adicionar']);
Route::post('/item/salvar/{id}', ['uses'=>'ItemController@salvar', 'as'=>'item.salvar']);
Route::get('/item/editar/{id}', ['uses'=>'ItemController@editar', 'as'=>'item.editar']);
Route::put('/item/atualizar/{id}', ['uses'=>'ItemController@atualizar', 'as'=>'item.atualizar']);
Route::get('/item/deletar/{id}', ['uses'=>'ItemController@deletar', 'as'=>'item.deletar']);
