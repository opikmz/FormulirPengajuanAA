<?php

use App\Http\Controllers\loginC;
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

Route::get('/', function () {
    return view('pages.pengajuan.pengajuan');
});

Route::get('/login',[loginC::class,'index'])->name('login');
Route::post('/actlogin',[loginC::class,'actlogin'])->name('actlogin');

Route::get('/pengajuan',[pengajuanC::class,'index'])->name('pengajuan')->middleware('auth');
Route::get('/create_pengajuan',[pengajuanC::class,'create'])->name('create_pengajuan')->middleware('auth');
Route::post('/store_pengajuan',[pengajuanC::class,'store'])->name('store_pengajuan')->middleware('auth');
Route::get('/show_pengajuan/{pengajuan}',[pengajuanC::class,'show'])->name('show_pengajuan')->middleware('auth');
Route::get('/show_pengajuan_berkas/{pengajuan}',[pengajuanC::class,'show_berkas'])->name('show_pengajuan_berkas')->middleware('auth');
Route::get('/destroy_pengajuan/{pengajuan}',[pengajuanC::class,'destroy'])->name('destroy_pengajuan');
