<?php

namespace App\Http\Controllers;

use App\Models\komiteM;
use App\Models\pesanKomiteM;
use Illuminate\Http\Request;

class komiteC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(komiteM $komite, Request $request)
    {
        // dd($komite->id_komite,$request->pesan_komite);
        $request->validate([
            'nama' => 'required',
            'pesan_komite' => 'required',
        ]);

        $pesanKomite = pesanKomiteM::create([
            'nama' => $request->nama,
            'pesan_komite' => $request->pesan_komite,
            'komite_id' => $komite->id_komite,
        ]);
        $id_pengajuan = $komite->pengajuan_id;
        return redirect()->route('komite_pengajuan', $id_pengajuan);
    }

    /**
     * Display the specified resource.
     */
    public function show(komiteM $komiteM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komiteM $komiteM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komiteM $komiteM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pesanKomiteM $pesan_komite)
    {
        $komite = komiteM::where('id_komite', $pesan_komite->komite_id)->first();
        // dd($komite);
        $id_pengajuan = $komite->pengajuan_id;
        $pesan_komite->delete();

        return redirect()->route('komite_pengajuan', $id_pengajuan);
    }

    public function status(Request $request, KomiteM $komite)
    {
        
        $id_pengajuan = $komite->pengajuan_id;
        // dd($id_pengajuan);
        $request->validate([
            'status' => 'required',
        ]);

        $komite->update([
            'status' => $request->status,
        ]);
        return redirect()->route('komite_pengajuan',$id_pengajuan);
    }
}
