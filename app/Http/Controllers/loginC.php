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
            // if(Auth::user()->role === 'admin'){
            // return redirect()->route('pengajuan');

            // }
            return redirect()->route('dashbaord')->with('successLogin','Login Anda Sudah Berhasil');
        } else {
            // dd('Login Gagal');
            return redirect()->route('login')->with('failLogin','Username atau password salah');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
