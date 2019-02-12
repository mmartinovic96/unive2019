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
Route::resource('predmets','PredmetController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/w/', function () {
    return "Bokić";
});

Route::get('/pozdrav/{ime}', function ($ime) {
    return "Dobro došao/la ".$ime;
});

Route::get('/probna/','probniController@probnafunkcija') ;

Route::redirect('/here', '/there');

Route::get('/there', function () {
    return "Bok i ć";
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
