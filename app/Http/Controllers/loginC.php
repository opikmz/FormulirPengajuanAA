<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginC extends Controller
{
    public function index(){
        return view('pages.login');
    }
    public function actlogin(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            $request->session()->regenerate();
            if(Auth::user()->role === 'admin'){
                // dd('user sudah masuk dan role kedetek');
            return redirect()->route('pengajuan');

            }
        } else {
            dd('Login Gagal');
            return redirect()->route('login');
        }
    }
}
