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

Route::get('/', function () {
    return view('welcome');
});

Route::any('admin/login','Admin\LoginController@login');

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('index','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('quit','LoginController@quit');
    Route::any('reset','IndexController@reset');
    Route::resource('tumor','TumorController');
    Route::resource('desease','DeseaseController');
    Route::resource('doctor','DoctorController');
    Route::resource('city','CityController');
    Route::resource('hospital','HospitalController');
    Route::resource('reservation','ReservationController');
});

Route::any('doctor/login','Doctor\LoginController@login');
Route::group(['middleware'=>['doctor.login'],'prefix'=>'doctor','namespace'=>'Doctor'],function(){
    Route::get('quit','LoginController@quit');
    Route::any('reset','ReservationController@reset');
    Route::resource('reservation','ReservationController');
});


