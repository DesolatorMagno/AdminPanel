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
})->name('welcome');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@tema')->name('home');

Route::get('/tema', 'HomeController@tema')->name('tema.index');

Route::resource('employees', 'EmployeeController');
Route::resource('companies', 'CompanyController');
