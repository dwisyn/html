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

Route::get('/', 'AuthController@showLoginForm');

Route::get('ID/{id}/{nama}',function($id,$nama){ echo 'ID: '.$id.' / '.$nama; ; }); 

Auth::routes();


Route::get('/login', 'AuthController@showLoginForm');
Route::post('/login', 'AuthController@doLogin');

Route::middleware(['auth'])->group(function(){
	Route::get('/logout', 'AuthController@doLogout');
	Route::resource('transaksi','TransaksiController');	
	Route::resource('akun_pelanggan','AkunPelangganController');
	Route::get('/image/{filename}', 'ImageController@getImage');
	
	Route::middleware(['admin'])->group(function(){
		Route::resource('rumah','RumahController');	
	});
});