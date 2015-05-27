<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',array('as'=>'anasayfa','uses'=>'PagesController@index'));

Route::get('/oyun/{id}',array('as'=>'oyun','uses'=>'PagesController@oyun'));

Route::get('/oyna/{id}',array('as'=>'oyna','uses'=>'PagesController@oyna'));
Route::get('/kategori/{id}',array('as'=>'kategori','uses'=>'PagesController@kategori'));

Route::get('home', 'HomeController@index');
Route::post('/yorum/{id}',array('as'=>'yorumlar','uses'=>'PagesController@yorum'));

Route::get('/admin/login',array('as'=>'login','uses'=>'AdminController@login'));
Route::get('/admin/logout',array('as'=>'logout','uses'=>'AdminController@logout'));
Route::post('/admin/giris',array('as'=>'loginkont','uses'=>'AdminController@giris'));
Route::get('/admin/index',array('middleware' => 'auth','as'=>'panel','uses'=>'AdminController@index'));

Route::get('/admin/oyunlar',array('middleware' => 'auth','as'=>'oyunpanel','uses'=>'AdminController@oyun'));

Route::get('/admin/kullanicilar',array('middleware' => 'auth','as'=>'kullanicipanel','uses'=>'AdminController@kullanici'));

Route::post('/admin/kullanicilar',array('middleware' => 'auth','as'=>'kullaniciekle','uses'=>'AdminController@kullaniciekle'));


Route::post('/admin/kategori',array('middleware' => 'auth','as'=>'katekle','uses'=>'AdminController@kategoriekle'));
Route::post('/admin/altkategori',array('middleware' => 'auth','as'=>'kat_ekle','uses'=>'AdminController@altkategoriekle'));
Route::post('/admin/kullaniciguncelle/{id}',array('middleware' => 'auth','as'=>'k_guncelle','uses'=>'AdminController@kullaniciguncelle'));
Route::post('/admin/anakategoriguncelle/{id}',array('middleware' => 'auth','as'=>'ana_kguncelle','uses'=>'AdminController@ana_kguncelle'));
Route::post('/admin/altkategoriguncelle/{id}',array('middleware' => 'auth','as'=>'alt_kguncelle','uses'=>'AdminController@alt_kguncelle'));
Route::get('/admin/altkategorisil/{id}',array('middleware' => 'auth','as'=>'alt_ksil','uses'=>'AdminController@alt_ksil'));
Route::get('/admin/anakategorisil/{id}',array('middleware' => 'auth','as'=>'ana_ksil','uses'=>'AdminController@ana_ksil'));
Route::get('/admin/kullanicisil/{id}',array('middleware' => 'auth','as'=>'kullnici_sil','uses'=>'AdminController@kullanici_sil'));
Route::post('/admin/oyunekle',array('middleware' => 'auth','as'=>'oyunekle','uses'=>'AdminController@oyunekle'));
Route::post('/admin/oyunguncelle/{id}',array('middleware' => 'auth','as'=>'oyunguncelle','uses'=>'AdminController@oyunguncelle'));
Route::get('/admin/oyunsil/{id}',array('middleware' => 'auth','as'=>'oyunsil','uses'=>'AdminController@oyunsil'));
Route::get('/admin/yorum/',array('middleware' => 'auth','as'=>'yorum','uses'=>'AdminController@yorum'));
Route::get('/admin/yorumonay/{id}',array('middleware' => 'auth','as'=>'yorum_onay','uses'=>'AdminController@yorum_onay'));
Route::get('/admin/yorumsil/{id}',array('middleware' => 'auth','as'=>'yorum_sil','uses'=>'AdminController@yorum_sil'));



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

