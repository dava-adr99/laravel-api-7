<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/kategori', 'Admin\KategoriController');
    Route::resource('/tugas', 'Admin\TugasController');
    Route::resource('/mahasiswa', 'Admin\MahasiswaController');
    Route::resource('/petugas', 'Admin\PetugasController');
    Route::resource('/peminjaman', 'Admin\PeminjamanController');
    Route::resource('/pengembalian', 'Admin\PengembalianController');
    Route::resource('/buku', 'Admin\BukuController');
    Route::resource('/rak', 'Admin\RakController');
});
