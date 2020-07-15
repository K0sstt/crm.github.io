<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', 'GoogleSheetsController@getAllRows')->name('home');
Route::get('/', 'CompanyController@index')->name('home');
Route::post('companies.search', 'CompanyController@search')->name('companies.search');
Route::resource('companies', 'CompanyController');
Route::resource('employees', 'EmployeeController');
Route::post('employees.search', 'EmployeeController@search')->name('employees.search');
