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

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    /**
     * Developer Routes
     */
    Route::group(['prefix' => 'dev'], function () {
        Route::get('/index', 'DeveloperController@index');


    });
    
    /**
     * Admin Routes
     */
    Route::group(['prefix' => 'admin'], function () {


    });

    /**
     * Client Routes
     */
    Route::group(['prefix' => 'client'], function () {


    });

    /**
     * Event Routes
     */
    Route::group(['prefix' => 'event'], function () {


    });

    /**
     * Group Routes
     */
    Route::group(['prefix' => 'group'], function () {


    });

});