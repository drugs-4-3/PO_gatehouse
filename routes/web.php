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
    'as' => 'gatehouse.give_key'
]);

Route::post("/gatehouse/give_key", [
    'uses' =>  'Gatehouse\GatehouseController@give_key',
    'as' => 'gatehouse.give_key'
]);

Route::get("/gatehouse/return_key", [
    'uses' => 'Gatehouse\GatehouseController@return_key',
    'as' => 'gatehouse.return_key'
]);

Route::post("/gatehouse/return_key", [
    'uses' =>  'Gatehouse\GatehouseController@return_key',
    'as' => 'gatehouse.return_key'
]);

Route::get("/gatehouse/test", [
    'uses' => 'Gatehouse\GatehouseController@test',
    'as' => 'gatehouse.test'
]);
Route::get("/gatehouse/new_employee", [
    'uses' => 'Gatehouse\GatehouseController@new_employee',
    'as' => 'gatehouse.new_employee'
]);
Route::post("/gatehouse/new_employee", [
    'uses' => 'Gatehouse\GatehouseController@new_employee',
    'as' => 'gatehouse.new_employee'
]);
