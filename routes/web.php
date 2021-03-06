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

Route::get('test-api',function(){
    return "AAAA";
});

/**************** User - Frontend *****************/
// them multi lang
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'as' => 'frontend.',
    'namespace' =>'Frontend',
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function(){
    Route::get('/','HomeController@index')->name('home.index');
    Route::get('add-cart/{id}','CartController@addCart')->name('addCart');
    Route::get('show-cart','CartController@showCart')->name('showcart');
    Route::get('delete-cart/{id}','CartController@deleteCart')->name('deletecart');

    Route::get('update-cart/{id?}/{qty?}','CartController@updateCart')->name('updatecart');
});


/******* change language ********/
Route::get('change-language/{lang?}',function($lang = null){
    $lang = ($lang == null) ? 'en' : $lang;
    // set language cho toan bo ung dung - cho website
    App::setLocale($lang);
    // set language vao session - de co the lam viec o nhung page khac nhau - phien lam viec khac nhau
    Session::put('locale',$lang);

    // su dung thu vien cua laravel (LaravelLocalization) de set lai language
    LaravelLocalization::setLocale($lang);

    // dieu huong url
    $url = LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous());

    return Redirect::to($url);


})->name('changelang');


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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
