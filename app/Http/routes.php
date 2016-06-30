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

Route::get('/', 'COAController@index');

Route::get('/test', 'COAController@testIndex');
//Route::get('/m', 'COAController@testMagic');
Route::get('/m2', 'COAController@testMagic2');
//Route::get('/t', 'COAController@testTable');
Route::get('/t2', 'COAController@testTable2');


//Route::resource('abc', 'COAController');
Route::get('/testTData', 'COAController@testTableT');
Route::post('/testTData', 'COAController@testTableTPost');
Route::put('/testTData', 'COAController@testTableTPut');
Route::delete('/testTData', 'COAController@testTableTDel');

