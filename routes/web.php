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

// user previllage
    Route::get('', 'App\Http\Controllers\BagianController@index');
    Route::get('admin', 'App\Http\Controllers\SuratController@admin');
    Route::post('surat/delete','App\Http\Controllers\SuratController@delete')->name('surat.delete');

    Route::get('autocomplete_tujuan', 'App\Http\Controllers\SuratController@autocomplete_tujuan');
    Route::get('autocomplete_instansi', 'App\Http\Controllers\SuratController@autocomplete_instansi');

    Route::resource('surat','App\Http\Controllers\SuratController');
