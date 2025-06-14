<?php

use App\Http\Controllers\userC;
use App\Http\Controllers\loginC;
use App\Http\Controllers\komiteC;
use App\Http\Controllers\dashboardC;
use App\Http\Controllers\pengajuanC;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[dashboardC::class,'index'])->name('dashbaord')->middleware('auth');
Route::get('/login',[loginC::class,'index'])->name('login');
Route::post('/actlogin',[loginC::class,'actlogin'])->name('actlogin');
Route::get('/logout',[loginC::class,'logout'])->name('logout')->middleware('auth');


Route::get('/pengajuan',[pengajuanC::class,'index'])->name('pengajuan')->middleware('auth');
Route::get('/create_pengajuan',[pengajuanC::class,'create'])->name('create_pengajuan')->middleware('auth');
Route::post('/store_pengajuan',[pengajuanC::class,'store'])->name('store_pengajuan')->middleware('auth');
Route::get('/show_pengajuan/{pengajuan}',[pengajuanC::class,'show'])->name('show_pengajuan')->middleware('auth');
Route::get('/show_pengajuan_berkas/{pengajuan}',[pengajuanC::class,'show_berkas'])->name('show_pengajuan_berkas')->middleware('auth');
Route::get('/destroy_pengajuan/{pengajuan}',[pengajuanC::class,'destroy'])->name('destroy_pengajuan');
Route::get('/komite_pengajuan/{pengajuan}',[pengajuanC::class,'komite_pengajuan'])->name('komite_pengajuan')->middleware('auth');
Route::post('/store_pesan_komite/{komite}',[komiteC::class,'store'])->name('store_komite')->middleware('auth');
Route::get('/destroy_pesan_komite/{pesan_komite}',[komiteC::class,'destroy'])->name('destroy_pesan_komite')->middleware('auth');
Route::post('/update_status_komite/{komite}',[komiteC::class,'status'])->name('update_status_komite')->middleware('auth');

Route::get('/user',[userC::class,'index'])->name('user')->middleware('auth');
Route::get('/create_user',[userC::class,'create'])->name('create_user')->middleware('auth');
Route::post('/store_user',[userC::class,'store'])->name('store_user')->middleware('auth');
Route::get('/destroy_user/{user}',[userC::class,'destroy'])->name('destroy_user')->middleware('auth');
