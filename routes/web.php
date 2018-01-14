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


/**
 * GATEHOUSE
 */
Route::get('/gatehouse', "Gatehouse\GatehouseController@index");

Route::get('/test', function () {
    return view("main");
});

Route::get("/gatehouse/give_key", [
    'uses' => 'Gatehouse\GatehouseController@give_key',
    'as' => 'gatehouse_give_key'
]);

Route::get("/gatehouse/give_key_handler", 'Gatehouse\GatehouseController@give_key_handler');

Route::post("/gatehouse/give_key_handler", [
    'uses' =>  'Gatehouse\GatehouseController@give_key_handler',
    'as' => 'gatehouse.give_key_handler'
]);