<?php

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
    return view('pages.pengajuan.show_pengajuan');
});

Route::get('/create_pengajuan',[pengajuanC::class,'create'])->name('create_pengajuan');
Route::post('/store_pengajuan',[pengajuanC::class,'store'])->name('store_pengajuan');
