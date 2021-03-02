<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::middleware('auth:api')->group(function () {
    Route::post('details', 'API\UserController@details');

    Route::get('pegawai','API\UserController@index');
    Route::post('pegawai/store','API\UserController@store');
    Route::post('pegawai/update/{id}','API\UserController@update');
    Route::get('pegawai/delete/{id}','API\UserController@delete');

    Route::get('debitloc', 'API\DebitLocationController@index');
    Route::post('debitloc/store', 'API\DebitLocationController@store');
    Route::get('debit','API\DebitInputController@index');

    Route::post('debit/store', 'API\DebitInputController@store');
    Route::post('debit/daily', 'API\DebitInputController@daily');
    Route::get('debit/show/{id}', 'API\DebitInputController@show');
    Route::post('debit/update/{id}', 'API\DebitInputController@update');
    Route::post('debitloc/store', 'API\DebitLocationController@store');
    Route::post('debitloc/update/{id}', 'API\DebitLocationController@update');

    Route::get('debit/delete/{id}','API\DebitInputController@destroy');
    Route::get('debitloc/delete/{id}','API\DebitLocationController@destroy');

    Route::get('tanam', 'API\TanamController@index');


    Route::get('tanam/{id}', 'API\TanamController@show')->where('id', '[0-9]+');

    Route::post('tanam/daily', 'API\TanamInputController@daily');
    Route::get('tanam/period', 'API\TanamInputController@tanamPeriodTimes');
    Route::get('tanam/show/{id}', 'API\TanamInputController@show');
    Route::post('tanam/update/{id}', 'API\TanamInputController@update');


    Route::post('tanam/store','API\TanamController@store');
    Route::post('tanam/update/{id}', 'API\TanamController@update');

    Route::get('tanamin','API\TanamInputController@index');
    Route::post('tanamin/store','API\TanamInputController@store');
    Route::post('tanamin/daily', 'API\TanamInputController@daily');
    Route::get('tanamin/period', 'API\TanamInputController@tanamPeriodTimes');
    Route::get('tanamin/show/{id}', 'API\TanamInputController@show');
    Route::post('tanamin/update/{id}', 'API\TanamInputController@update');

    Route::get('tanam/delete/{id}','API\TanamController@destroy');
    Route::get('tanamin/delete/{id}','API\TanamInputController@destroy');

});
