<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register','Api\Auth\AuthController@register');
Route::post('/auth/login','Api\Auth\AuthController@login');

Route::get('mahasiswa', 'Api\Mahasiswa\MahasiswaController@index');
Route::post('mahasiswa/store', 'Api\Mahasiswa\MahasiswaController@store');
Route::post('mahasiswa/update/{id}', 'Api\Mahasiswa\MahasiswaController@update');
Route::get('mahasiswa/destroy/{id}', 'Api\Mahasiswa\MahasiswaController@destroy');

Route::group(['prefix' => 'tugas'], function(){
    route::group(['middleware' => 'auth:api'], function(){
        Route::get('get_all', 'Api\Tugas\TugasController@getAll');
        Route::post('tambah', 'Api\Tugas\TugasController@store');
        Route::post('update', 'Api\Tugas\TugasController@update');
        Route::post('hapus', 'Api\Tugas\TugasController@destroy');
    });
});
