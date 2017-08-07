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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to("/");
});


Route::group(['middleware'=>'auth'],function(){
        Route::patch('password/{user_id}','PasswordController@update');
        Route::get('password/{user_id}/edit','PasswordController@edit');
});



Route::group(['middleware'=>'admin'],function(){
        Route::get('admin','AdminController@index');
        Route::get('admin/user/{school_id}/filter','UserController@user');
        Route::resource('admin/user','UserController');
        Route::resource('admin/school','SchoolController');
        Route::resource('admin/role','RoleController');
        
});

