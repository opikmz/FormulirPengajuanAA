<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use Illuminate\Http\Request;

class pengajuanC extends Controller
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
        return view('pages.pengajuan.create_pengajuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',

            'pekerjaan' => 'required',
            'pendapatan' => 'required',
            'pengeluaran' => 'required',

            'jumlah_pembiayaan' => 'required',
            'jangka_waktu' => 'required',
            'sistem_pengembalian' => 'required',
            'bentuk_pembiayaan' => 'required',

            'jaminan' => 'required',
            'nilai_jaminan' => 'required',

            'ceklis_ktp_suami' => 'nullable|boolean',
            'ceklis_ktp_istri' => 'nullable|boolean',
            'ceklis_kk' => 'required|boolean',
            'ceklis_jaminan' => 'required|boolean',
            'ceklis_denah_rumah' => 'nullable|boolean',
            'ceklis_struk_gaji' => 'nullable|boolean',

            'formulir_pengajuan' => 'required|image|mimes:png,jpg,jpeg|max:4096',

            'ktp_suami' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
            'ktp_istri' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
            'kk' => 'required|image|mimes:png,jpg,jpeg|max:4096',

            'berkas_jaminan' => 'required|array|min:1',
            'berkas_jaminan.*' => 'required|image|mimes:png,jpg,jpeg|max:4096',
            'struk_gaji.*' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
            'denah_rumah.*' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
        ]);
        // dd('kalo sampai sini berati validasi berhasil');

        if ($request->hasFile('formulir_pengajuan')) {
                $file_formulir_pengajuan = $request->file('formulir_pengajuan');
                $file_name_formulir_pengajuan =  time() . '-' . $file_formulir_pengajuan->getClientOriginalName();
                $file_formulir_pengajuan->move('asset/img/berkas/formulir_pengajuan', $file_name_formulir_pengajuan);
        } else {
            // dd('formulir pengajuanya ada salah');
            return redirect()->route('create_pengajuan');
        }
        if ($request->hasFile('berkas_jaminan')) {
            foreach ($request->file('berkas_jaminan') as $file_berkas_jaminan) {
                $file_name_berkas_jaminan = time() . '-' . $file_berkas_jaminan->getClientOriginalName();
                $file_berkas_jaminan->move('asset/img/berkas/berkas_jaminan', $file_name_berkas_jaminan);
            }
        } else {
            // dd('formulir berkas jaminannya ada salah');
            return redirect()->route('create_pengajuan');
        }
        if (!$request->hasFile('ktp_suami') && !$request->hasFile('ktp_istri')) {
            // dd($request->all());

            return back()->withErrors(['ktp' => 'Masukan minimal salah satu KTP'])->withInput();
        }
        if ($request->hasFile('ktp_suami')) {
            $file_ktp_suami = $request->file('ktp_suami');
            $file_name_ktp_suami = time() . '-' . $file_ktp_suami->getClientOriginalName();
            $file_ktp_suami->move('asset/img/berkas/ktp_suami', $file_name_ktp_suami);
        }
        if ($request->hasFile('ktp_istri')) {
            $file_ktp_istri = $request->file('ktp_istri');
            $file_name_ktp_istri = time() . '-' . $file_ktp_istri->getClientOriginalName();
            $file_ktp_istri->move('asset/img/berkas/ktp_suami', $file_name_ktp_istri);
        }

        if ($request->hasFile('kk')) {
            $file_kk = $request->file('kk');
            $file_name_kk = time() . '-' . $file_kk->getClientOriginalName();
            $file_kk->move('asset/img/berkas/kk', $file_name_kk);
        } else {
            return back()->withErrors(['error' => 'Masukan KK'])->withInput();
        }
        if($request->hasFile('struk_gaji') ){
            foreach($request->file('struk_gaji') as $file_struk_gaji){
                $file_name_struk_gaji = time().'-'. $file_struk_gaji->getClientOriginalName();
                $file_struk_gaji->move('asset/img/berkas/struk_gaji', $file_name_struk_gaji);

            }
        }
        dd('berhasil');
    }


    /**
     * Display the specified resource.
     */
    public function show(pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengajuan $pengajuan)
    {
        //
    }
}
