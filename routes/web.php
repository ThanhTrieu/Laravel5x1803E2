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


