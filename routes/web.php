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

Route::group(['middleware' => 'admin'],function(){
Route::get('/admin', 'AdminController@dashboard')
     ->name('Dashboard');
Route::get('/data-admin', 'AdminController@DataAdmin')
     ->name('DataAdmin');


Route::get('/data-investor', 'AdminController@DataInvestor')
     ->name('DataInvestor');
Route::GET('/data-admin/tambah', 'UserController@TambahDataAdmin')
     ->name('TambahDataAdmin');
Route::POST('/data-admin/tambah', 'UserController@submitTambahDataAdmin')
     ->name('submitTambahDataAdmin');
Route::GET('/data-admin/{id}/edit', 'UserController@EditDataAdmin')
     ->name('EditDataAdmin');
Route::POST('/data-admin/{id}/edit', 'UserController@submitEditDataAdmin')
     ->name('submitEditDataAdmin');
Route::GET('/data-admin/{id}/hapus', 'UserController@HapusDataAdmin')
     ->name('HapusDataAdmin');     


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
