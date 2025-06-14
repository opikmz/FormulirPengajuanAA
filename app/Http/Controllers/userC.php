<?php

namespace App\Http\Controllers;

// use App\Models\user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get()->all();
        return view('pages.user.user',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'username'=>'required',
            'password'=>'required',
            'role'=>'required',
            'cabang'=>'required',
        ]);
        $user = User::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
            'cabang'=>$request->cabang,
        ]);

        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user');
    }
}
