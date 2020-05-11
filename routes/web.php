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

Route::get('/', 'SearchController@index')->name('search.index');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/import-excel', 'ImportExcelController@index')->name('import.excel');
    Route::post('/import-excel', 'ImportExcelController@store')->name('import.store');
});

