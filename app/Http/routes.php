<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('site.index');
    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    
    Route::group(['prefix' => 'painel'], function() {
        
        Route::controller('categorias', 'Painel\CategoriaController'); 
        Route::controller('ilustracoes', 'Painel\IlustraController'); 
        Route::controller('/', 'Painel\PainelController');
       
    });

    
});

Route::controller('/ilustracoes', 'IlustracoesController');
Route::controller('/', 'HomeController');
