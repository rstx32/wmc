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
    return redirect('/admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => ['admin','auth']], function(){
    Route::get('/','AdminController@index');
    Route::post('/store','AdminController@store');
    Route::get('/create','AdminController@create');
    Route::get('/hapus/{id}','AdminController@delete');
    Route::get('/edit/{id}','AdminController@edit');
    Route::put('/update/{id}','AdminController@update');
    Route::get('/exportPDF','AdminController@exportPDF');
    Route::post('/mulaiSesi','AdminController@mulaiSesi');
    Route::get('/hapusData','AdminController@hapusData');
});

Route::get('/peserta','PesertaController@index');
Route::post('/peserta/submit/{id}','PesertaController@submit');