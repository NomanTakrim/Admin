<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'AdminController@login');
Route::get('/table', 'AdminController@table');

Route::get('/casecustomer', 'AdminController@customer');

Route::get('/addcaseform', 'AdminController@addcaseform');
Route::get('/case/{name}', 'AdminController@addcase');
Route::get('/customersearch', 'AdminController@search');
Route::post('/cases', 'AdminController@cases');

//Customer Resouce
Route::resource('/customer', 'CustomerController');

//Case Resource
Route::resource('/custcase', 'CaseController');

//User Resource
Route::resource('/users', 'UserController');
Route::get('/userview/{id}', 'UserController@userview');
Route::post('/changepass/{id}', 'UserController@changepass');

//Software Resource
Route::resource('/software', 'SoftwareController');

//Report Controller
Route::get('/report', 'ReportController@index');
Route::post('/report', 'ReportController@search');
Route::get('/report/{value}', 'ReportController@details');