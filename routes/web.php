<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LupaPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(HomeController::class)->name('home.')->prefix('home')->group(function() {
    Route::get('/', 'home')->name('home');
});

Route::controller(RouteController::class)->name('route.')->middleware('CekLogin')->prefix('balik')->group(function () {
    Route::get('/pinjam', 'pinjam')->name('pinjam');
    Route::get('/balik', 'balik')->name('balik');
    Route::post('/simpan', 'simpanBuku')->name('simpan');
    Route::post('/edit-data/{id}', 'editData')->name('edit-data');
    Route::get('form-edit/{id}', 'formEdit')->name('form-edit');
    Route::get('/delete-data/{id}', 'deleteData')->name('delete-data');
    Route::get('/delete-soft/{id}', 'deleteSoft')->name('delete-soft');
});

Route::controller(RegisterController::class)->name('register.')->prefix('master/register')->group(function(){
    Route::get('/regis','formRegister')->name('regis');
    Route::get('/beranda','formBeranda')->name('beranda');
    Route::post('/simpan-register','simpanRegister')->name('simpan');
  });

Route::controller(LoginController::class)->name('login.')->prefix('master/login')->group(function(){
    Route::get('/login','formLogin')->name('login');
    Route::post('/proses-login','ProsesLogin')->name('proses-login');
});

Route::controller(BerandaController::class)->name('beranda.')->middleware('CekLogin')->prefix('master/beranda')->group(function(){
    Route::get('/beranda','Beranda')->name('beranda');
});

Route::controller(LogoutController::class)->name('logout.')->prefix('logout')->group(function(){
    Route::get('/','logout')->name('proses');
});

Route::controller(LupaPasswordController::class)->name('forgot.')->prefix('forgot')->group(function(){
    Route::get('/','formLupaPassword')->name('form-forgot');
    Route::post('/proses','ProsesLupaPassword')->name('proses');
    Route::get('/reset-password/{token}','resetPassword')->name('reset-password');
    Route::post('/proses-reset', 'prosesResetPassword')->name('proses-reset');
});