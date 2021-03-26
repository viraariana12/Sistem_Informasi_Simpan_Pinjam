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


Route::get('/', 'PageController@index');
Route::get('/pendaftaran', 'PageController@pendaftaran');
Route::get('/profile', 'PageController@profile');
Route::get('/pengurus', 'PageController@pengurus');


// Route Admin
Route::get('admin/login', 'LoginController@index');
Route::post('admin/login', 'LoginController@loginPost');
Route::get('admin/logout', 'LoginController@logout');

Route::get('admin/dashboard', 'DashboardController@index');
Route::get('admin/profile', 'AdminController@show');
Route::post('admin/profile', 'AdminController@edit')->name('profil-update');
Route::resource('admin/validasi/transaction', 'TransactionController');
Route::resource('admin/validasi/deposit', 'DepositController');
Route::resource('admin/validasi/application', 'ApplicationController');
Route::resource('admin/manajemen/admin', 'AdminController');
Route::resource('admin/manajemen/registration', 'RegistrationController');
Route::resource('admin/manajemen/member', 'MemberController');
// Akhir Route Admin

// Route Anggota
Route::get('anggota/login', 'LoginController@anggotaIndex');
Route::post('anggota/login', 'LoginController@anggotaLoginPost');
Route::get('anggota/logout', 'LoginController@anggotaLogout');

Route::get('anggota/dashboard', 'DashboardController@dashboardAnggota');
Route::get('anggota/setoran', 'TransactionController@create');
Route::get('anggota/pinjaman', 'ApplicationController@create');
Route::get('anggota/profile', 'MemberController@show');
Route::post('anggota/profile', 'MemberController@edit')->name('profil-member-update');