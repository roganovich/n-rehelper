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
    return view('home');
});



//auth routes
//login
//logout


Route::group(['prefix'=>'/auth','name'=>'auth.'], function(){
    //Moderate Blogs Frontend routes Group
    Route::get('/login', 'AuthController@login')->name('auth.login');
    Route::post('/auth', 'AuthController@auth')->name('auth.auth');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});

Route::group(['prefix'=>'/department','name'=>'department.'], function(){
    //Moderate Blogs Frontend routes Group
    Route::get('/', 'DepartmentController@index')->name('department.index');
    Route::post('/', 'DepartmentController@index')->name('department.index');
});
//project routes

//departments routes

//tickets routes

//clients routes, cousult

//backend routes

//search


Route::get('/home', 'HomeController@index')->name('home');
