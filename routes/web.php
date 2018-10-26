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

/**************** User - Frontend *****************/

Route::group([
    'as' => 'frontend.',
    'namespace' =>'Frontend'
],function(){
    Route::get('/','HomeController@index')->name('home.index');
    Route::get('add-cart/{id}','CartController@addCart')->name('addCart');
    Route::get('show-cart','CartController@showCart')->name('showcart');
    Route::get('delete-cart/{id}','CartController@deleteCart')->name('deletecart');

    Route::get('update-cart/{id?}/{qty?}','CartController@updateCart')->name('updatecart');
});


/******************** ADMIN ****************************/
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
],function(){
    Route::get('/','LoginController@showForm')->name('formLogin');
    Route::post('login','LoginController@handle')->name('showForm');
    Route::post('logout','LoginController@logout')->name('logout');
});

Route::group([  
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['web','checkAdminLogined']
],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('manufacture','ManufactureController@index')->name('manufacture');
    Route::get('add-manufacture','ManufactureController@addForm')->name('formAddManu');
    Route::post('handle-add','ManufactureController@handleAdd')->name('handleAddManu');
    Route::post('delete-manu','ManufactureController@deleteManu')->name('deleteManu');
    Route::get('edit-manu/{id}','ManufactureController@edit')->name('editManu');
    Route::post('handle-edit','ManufactureController@handleEdit')->name('handleEditManu');
});


