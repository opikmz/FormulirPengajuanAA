<?php

namespace App\Http\Controllers;

use App\Models\pengajuanM;
use Illuminate\Http\Request;

class dashboardC extends Controller
{
    public function index(){
        $pengajuanTerbaru = pengajuanM::latest()->take(10)->get();
        return view('pages.dashboard',compact('pengajuanTerbaru'));
    }
}
