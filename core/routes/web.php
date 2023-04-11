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
    return redirect('/form/1');
});


Route::get('/cuit', function () {
    return redirect('/cuit/0');
});

//Route::get('/cuit/{cuit}', 'FormController@create');

Route::get('/form/{cuit}', 'FormController@create');

Route::get('/load/categories', 'LoadController@categories');

Route::get('/load/productsl/{category}', 'LoadController@products_list');

Route::get('/load/product/{id}', 'LoadController@product');

Route::get('/querycuit/{cuit}', 'FormController@QueryCuit');


Route::get('/load/receptorias', 'LoadController@receptorias');

Route::get('/admin', function () {
    return view('login');
});


Route::post('/login', 'LoginController@login');

Route::get('/close', 'LoginController@close');

Route::post('/forms', 'FormController@store');

Route::get('/consulta', function () {
    return view('query');
});

Route::post('/consulta', 'FormController@query');


Route::get('/imprimir_consulta', function () {
    return view('query_c');
});


Route::post('/imprimir_consulta', 'FormController@query_c');

Route::get('/forms/print/{id}', 'FormController@download');
Route::get('/forms/confirmpay/{id}', 'FormController@confirmpay');

Route::get('/forms/cons/{id}', 'FormController@constancia');

Route::get('/forms/acuse/{id}', 'FormController@acuse');

Route::get('/forms/archives/{id}', 'FormController@archives');

Route::get('/forms/zip/{id}', 'FormController@zip');

Route::get('/recibo/{id}', 'FormController@recibo');


Route::get('/contribuyente/{cuit}', 'FormController@query');
Route::post('/formsrecords_q', 'FormLoadController@formsrecords_q');


Route::get('/testws', 'LoadController@testws');

Route::get('/payment/{guia}/{cuit}/{importetrs}/{importeiibb}', 'FormController@generar_vep');
Route::get('/payment_form/{guia}/{cuit}/{importetrs}/{importeiibb}', 'FormController@save_vep_form');

Route::post('/forms/save_vep/{form_id}/{tokennro}', 'FormController@save_vep');

Route::group(['middleware' => 'login'], function()
{
    
    Route::resource('/forms', 'FormController',  ['except' => 'store']);
    Route::get('/forms/d/{id}', 'FormController@delete');

    
    Route::post('/formsrecords', 'FormLoadController@formsrecords');
    Route::post('/formsrecords_o', 'FormLoadController@formsrecords_o');
    Route::post('/formsrecords_e', 'FormLoadController@formsrecords_e');

    Route::group(['middleware' => 'permissions'], function()
    {

        Route::resource('/products', 'ProductlistController');

        Route::resource('/receptorias', 'ReceptoriaController');

        Route::group(['middleware' => 'webmaster'], function()
        {

        Route::resource('/users', 'UserController',  ['except' => 'update']);
        Route::get('/users/d/{id}', 'UserController@delete');

        });
    });


    Route::get('/user', 'UserController@userm');
    Route::put('/users/{id}', 'UserController@update');

    Route::get('/export', 'FormController@export');
    Route::post('/export', 'FormController@export_l');

    Route::get('/forms/cycle_c/{id}', 'FormController@cycle_comment');
    Route::post('/forms/cycle/{id}', 'FormController@cycle');


    Route::get('/log/{id}', 'LogController@index');

    Route::get('/forms_i', 'FormController@index_i');

    Route::get('/forms/approve/{id}', 'FormController@approve');
    Route::post('/forms/approve/{id}', 'FormController@approve_save');

    Route::get('/forms/cancel/{id}', 'FormController@cancel');
    Route::post('/forms/cancel/{id}', 'FormController@cancel_save');

    Route::get('/forms/unresolved/{id}', 'FormController@unresolved');



    
});