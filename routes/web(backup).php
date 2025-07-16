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

// Route Landing Page
Route::get('/', 'LandingPageController@index');


// Route Verificartin  Email
Auth::routes(['verify' => true]);


// Routes All Role
Route::group(['middleware' => ['auth', 'verified']], function() {

    Route::get('/testing', 'DashboardController@testing');
    Route::post('/testing', 'DashboardController@cekTes');

	// Route Dashboard
    Route::get('/dashboard', 'DashboardController@index');

    // Route Profile
    // Route::resource('profile', 'ProfileController');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('/profile/{id}/update', 'ProfileController@update')->name('profile.update');
    Route::post('/profile/{id}/change-email', 'ProfileController@changeEmail')->name('profile.changeEmail');
    Route::post('/profile/{id}/change-password', 'ProfileController@changePassword')->name('profile.changePassword');

    // Route Bahasa
    Route::post('/bahasa', 'BahasaController@index');

});


// Routes User
Route::group(['prefix' => 'u', 'middleware' => ['auth', 'verified', 'user']], function() {

	// Route Materi
    Route::get('/materi/{mapel}/{level}', 'User\MateriController@index');
    Route::get('/submateri/{materi}/{submateri}', 'User\SubMateriController@index');

    // Route Latihan
    Route::get('/latihan/{materi}', 'User\LatihanController@index');
    Route::post('/latihan', 'User\LatihanController@check');
    Route::post('/hasil', 'User\LatihanController@hasil');

    // Route Ujian
    Route::get('/ujian/{mapel}/{level}', 'User\UjianController@index');
    Route::post('/hasil_ujian', 'User\UjianController@hasil');

});

// Routes  Editor & Admin 
Route::group(['middleware' => ['auth', 'verified', 'editor.admin']], function(){

    // Route User
    Route::get('/user', 'Admin\UserController@index')->name('user.index');
    Route::get('/user/{id}', 'Admin\UserController@show')->name('user.show');
    Route::get('/export', 'Admin\UserController@createPDF')->name('user.export');

    // Route Materi
    Route::resource('/materi', 'EditorAdmin\MateriController');
    Route::post('/listMateri', 'EditorAdmin\MateriController@listMateri');

    // Route SubMateri
    Route::get('/submateri/{id}','EditorAdmin\SubmateriController@index');
    Route::get('/submateri/{id}/create','EditorAdmin\SubmateriController@create');
    Route::resource('/submateri', 'EditorAdmin\SubmateriController')->only(['edit', 'store', 'update', 'destroy']);

   
    // Route Latihan Soal
    Route::resource('/latihan', 'EditorAdmin\LatihanController');

    // Route Latihan Soal
    Route::resource('/ujian', 'EditorAdmin\UjianController');

    // Route Pertanyaan
    Route::get('/pertanyaan/{id}','EditorAdmin\PertanyaanController@index');
    Route::get('/pertanyaan/{id}/create','EditorAdmin\PertanyaanController@create');
    Route::get('/pertanyaan/{id}/delete','EditorAdmin\PertanyaanController@destroy');
    Route::resource('/pertanyaan', 'EditorAdmin\PertanyaanController')->only(['edit', 'store', 'update']);
});


// Routes Admin
Route::group(['middleware' => ['auth', 'verified', 'admin']], function(){

    // Route CRUD User
    Route::resource('/user', 'Admin\UserController')->except('index', 'show');
    Route::post('/user/{id}/change-email', 'Admin\UserController@changeEmail')->name('user.changeEmail');
    Route::post('/user/{id}/change-password', 'Admin\UserController@changePassword')->name('user.changePassword');
    

    // Route CRUD Editor
    Route::post('/editor/{id}/change-email', 'Admin\EditorController@changeEmail')->name('editor.changeEmail');
    Route::post('/editor/{id}/change-password', 'Admin\EditorController@changePassword')->name('editor.changePassword');
    Route::resource('/editor', 'Admin\EditorController');

    Route::get('/lp/edit', 'LandingPageController@edit')->name('lp.edit');
    Route::put('/lp/edit', 'LandingPageController@update')->name('lp.update');
});

