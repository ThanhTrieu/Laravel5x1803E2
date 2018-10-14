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

Route::get('hello',function(){
    return 'Hello word';
});

Route::post('service/post-data',function(){
    return 'this is method post';
});
Route::put('service/put-data',function(){
    return 'this is method put';
});

Route::match(['get','post','put'],'get-post', function(){
    return 'this is method post or get';
});

// khong quan tam den method cua request la gi .
Route::any('any-request',function(){
    return 'Thi is Any';
});

// redirect - dieu huong chuyen trang trong routing
Route::get('login',function(){
    // dieu huong url
    return redirect('dashboard/home');
    //khong nen dung header nua
    //return header('Location:dashboard/home');
});
Route::get('dashboard/home', function(){
    return 'this is home';
});

Route::get('layout-view',function(){
    // nap vao 1 view
    // kha giong lenh include - require
    return view('myview');
});

Route::get('smartphone/{iphone?}',function($phone = null){
    return "This is smart {$phone}";
});

Route::get('product/sam-sung/{version}/{money}',function($version, $money){
    return " samsung : {$version} - {$money}";
})->where(['version'=>'[A-Za-z0-9].+','money'=>'\d+']);

Route::get('product/detail/{id}',function($id){
    return "This is {$id}";
});

Route::get('user/detail/{id}',function($id){
    return "This is {$id}";
});

Route::get('login',function(){
    return redirect()->route('myhome');
});

Route::get('home',function(){
    return view('home');
})->name('myhome');

route::get('home/user',function(){
    return "This is user - home";
})->name('home.user');

route::get('home/product',function(){
    return "This is product - home";
})->name('home.product');

// lam viec voi controller
Route::get('demo-controller/{name}/{age?}','TestController@demo');
Route::get('demo/{name}/{age?}','TestController@hello');
Route::get('load-view','TestController@loadview')->name('student');
Route::get('demo-product','TestController@product')->name('mypd');

Route::group([
    'prefix' => 'db'
], function(){
    Route::get('all-data/{tablename}','QueryDataController@selectData');
    Route::get('delete-data/{tablename}/{id}','QueryDataController@deleteData');
});

Route::group([
    'prefix' => 'orm'
], function(){
    Route::get('product','EloquentDataController@test');
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

Route::group([.  
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['web','checkAdminLogined']
],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});


