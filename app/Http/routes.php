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
Route::group(['middleware' => 'auth'],function (){
    Route::get('/',function (){
        return view('dashboard');
    })->name('das');
    Route::get('/logout',function (){
        Auth::logout();
    });
    Route::get('/add-employee','EmployeeController@create');
    Route::post('/employee','EmployeeController@store');
    Route::get('employees','EmployeeController@employeelist')->name('live_search.action');
    Route::get('employee/edit/{id}','EmployeeController@edit');
    Route::post('employee/edit/{id}','EmployeeController@update');
    Route::delete('employee/delete/{id}','EmployeeController@delete');
});

Route::get('form', 'AdminController@form');
Route::post('form', 'AdminController@store');
Route::get('form', 'AdminController@dashboard');

Route::auth();

Route::get('/home', 'HomeController@index');
