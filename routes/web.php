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

Route::get('/', function () {
    return view('welcome');
});
//$route['default_controller'] = 'Employee';
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin','Admin\AdminUserController');
Route::get('/action','Admin\AdminUserController@action')->name('search');
