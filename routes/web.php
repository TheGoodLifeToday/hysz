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



Route::get('login','LoginController@login');
Route::post('doLogin','LoginController@doLogin');

//Route::group();
Route::middleware('login')->group(function(){
	Route::get('/','IndexController@index');
	Route::get('admin/addAdmin','AdminController@addAdmin');
	Route::post('admin/doAddAdmin','AdminController@doAddAdmin');
	Route::get('admin/index','AdminController@index');
	Route::get('outLogin','LoginController@outLogin');
	Route::get('userList','UsersController@userList');
	Route::get('addUser','UsersController@addUser');
	Route::get('user/preOrder/{id}','UsersController@preOrder');
	Route::post('user/doPreOrder','UsersController@doPreOrder');
	Route::post('doAddUser','UsersController@doAddUser');
	Route::resource('user','UsersController');
	Route::post('getGoods','UsersController@getGoods');
	Route::resource('supplier','SupplierController');
	Route::post('goods/addGoods','GoodsController@addGoods');
	Route::resource('goods','GoodsController');
	
});
