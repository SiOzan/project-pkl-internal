<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KompetensiAtasanController;
use App\Http\Controllers\KompetensiGuruController;
use App\Http\Controllers\KompetensiSiswaController;
use App\Http\Controllers\PertanyaanAtasanController;
use App\Http\Controllers\PertanyaanGuruController;
use App\Http\Controllers\PertanyaanSiswaController;

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

Route::get('ada', function () {
    return view('layouts.backend');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('mapel', Mapelcontroller::class);
    Route::resource('guru', Gurucontroller::class);
    Route::resource('user', Usercontroller::class);
    Route::resource('kompetensiAtasan', KompetensiAtasancontroller::class);
    Route::resource('kompetensiGuru', KompetensiGurucontroller::class);
    Route::resource('kompetensiSiswa', KompetensiSiswacontroller::class);
    Route::resource('pertanyaanAtasan', PertanyaanAtasancontroller::class);
    Route::resource('pertanyaanGuru', PertanyaanGurucontroller::class);
    Route::resource('pertanyaanSiswa', PertanyaanSiswacontroller::class);
});

