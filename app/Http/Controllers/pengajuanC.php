<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\fc_kkM;
use App\Models\limacM;
use App\Models\ceklisM;
use App\Models\komiteM;
use App\Models\jaminanM;
use App\Models\pengajuan;
use App\Models\pengajuanM;
use App\Models\strukGajiM;
use App\Models\denahRumahM;
use App\Models\pembiayaanM;
use App\Models\pesanKomiteM;
use Illuminate\Http\Request;
use App\Models\berkas_jaminanM;
use App\Models\berkas_ktp_istriM;
use App\Models\berkas_ktp_suamiM;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\penghasilanPengeluaranM;

class pengajuanC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = pengajuanM::get()->all();
        $pengajuanOne = pengajuanM::where('user_id',Auth::user()->id_user)->get();
        $userCabang = User::where('cabang',Auth::user()->cabang)->pluck('id_user');
        $pengajuanCabang = pengajuanM::where('user_id',$userCabang)->get();
        // dd($pengajuanCabang);
        // $jumlahPembiayaan = pembiayaanM::where('id_')->all();
        return view('pages.pengajuan.pengajuan', compact('pengajuan','pengajuanOne','pengajuanCabang'));
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

    private  function saveFile($file, $folder)
    {
        $fileName = time() . '-' . $file->getClientOriginalName();
        $path = 'asset/img/berkas/' . $folder . '/' . $fileName;

        $file->move(public_path('asset/img/berkas/' . $folder), $fileName);
        return $path;
    }

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

            'berkas_jaminan.*' => 'required|image|mimes:png,jpg,jpeg|max:4096',
            'struk_gaji.*' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
            'denah_rumah.*' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
            'struk_gaji' => 'nullable|array',
            'denah_rumah' => 'nullable|array',

            'character' => 'nullable',
            'capacity' => 'nullable',
            'capital' => 'nullable',
            'colleteral' => 'nullable',
            'condition' => 'nullable',
        ]);

        // Ngecek ada Formulir pengajuan ktp suami & istri
        // Formulir
        if (!$request->hasFile('formulir_pengajuan')) {
            return back()->withErrors(['error' => 'Masukan formulir pengajuan'])->withInput();
        }
        // ktp suami & istri
        if (!$request->hasFile('ktp_suami') && !$request->hasFile('ktp_istri')) {
            return back()->withErrors(['error' => 'Masukan minimal salah satu KTP'])->withInput();
        }
        try {
            DB::beginTransaction();
            $formulir_pengajuan = $this->saveFile($request->file('formulir_pengajuan'), 'formulir_pengajuan');

            $ktp_suami = $request->hasFile('ktp_suami') ? $this->saveFile($request->file('ktp_suami'), 'ktp_suami') : null;
            $ktp_istri = $request->hasFile('ktp_istri') ? $this->saveFile($request->file('ktp_istri'), 'ktp_istri') : null;
            $kk = $this->saveFile($request->file('kk'), 'kk');
            $berkas_jaminan = [];
            foreach ($request->file('berkas_jaminan') as $file) {
                $berkas_jaminan[] = $this->saveFile($file, 'berkas_jaminan');
            }

            $struk_gaji = [];
            if ($request->hasFile('struk_gaji')) {
                foreach ($request->file('struk_gaji') as $file) {
                    $struk_gaji[] = $this->saveFile($file, 'struk_gaji');
                }
            }

            $denah_rumah = [];
            if ($request->hasFile('denah_rumah')) {
                foreach ($request->file('denah_rumah') as $file) {
                    $denah_rumah[] = $this->saveFile($file, 'denah_rumah');
                }
            }

            $pengajuan =  pengajuanM::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'formulir_pengajuan' => $formulir_pengajuan,
                'pengelola' => $request->pengelola,
                'user_id' => $request->user_id,
            ]);
            $pengajuanId = $pengajuan->id_pengajuan;
            // dd('sampai sini berhasil'); x

            $penghasilanPengeluaran = penghasilanPengeluaranM::create([
                'pekerjaan' => $request->pekerjaan,
                'pendapatan' => $request->pendapatan,
                'pengeluaran' => $request->pengeluaran,
                'pengajuan_id' => $pengajuanId,
            ]);

            $jaminan = jaminanM::create([
                'jaminan' => $request->jaminan,
                'nilai_jaminan' => $request->nilai_jaminan,
                'pengajuan_id' => $pengajuanId,

            ]);

            $ceklis = ceklisM::create([
                'ceklis_ktp_suami' => $request->ceklis_ktp_suami,
                'ceklis_ktp_istri' => $request->ceklis_ktp_istri,
                'ceklis_kk' => $request->ceklis_kk,
                'ceklis_jaminan' => $request->ceklis_jaminan,
                'ceklis_denah_rumah' => $request->ceklis_denah_rumah,
                'ceklis_struk_gaji' => $request->ceklis_struk_gaji,
                'pengajuan_id' => $pengajuanId,

            ]);

            $fc_kk = fc_kkM::create([
                'kk' => $kk,
                'pengajuan_id' => $pengajuanId,
            ]);

            foreach ($berkas_jaminan as $file_berkas_jaminan) {
                berkas_jaminanM::create([
                    'berkas_jaminan' => $file_berkas_jaminan,
                    'pengajuan_id' => $pengajuanId,
                ]);
            }
            // dd($pengajuanId);

            $pembiayaan = pembiayaanM::create([
                'jumlah_pembiayaan' => $request->jumlah_pembiayaan,
                'jangka_waktu' => $request->jangka_waktu,
                'sistem_pengembalian' => $request->sistem_pengembalian,
                'bentuk_pembiayaan' => $request->bentuk_pembiayaan,
                'pengajuan_id' => $pengajuanId,

            ]);

            $limaC = limacM::create([
                'character' => $request->character,
                'capacity' => $request->capacity,
                'capital' => $request->capital,
                'collateral' => $request->collateral,
                'condition' => $request->condition,
                'pengajuan_id' => $pengajuanId,

            ]);
            $komite = komiteM::create([
                'pengajuan_id'=>$pengajuanId,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }

        try {
            $berkas_ktp_istri = berkas_ktp_istriM::create([
                'berkas_ktp_istri' => $ktp_istri,
                'pengajuan_id' => $pengajuanId,
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal simpan foto tambahan: ' . $e->getMessage());
        }
        try {
            $berkas_ktp_suami = berkas_ktp_suamiM::create([
                'berkas_ktp_suami' => $ktp_suami,
                'pengajuan_id' => $pengajuanId,
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal simpan foto tambahan: ' . $e->getMessage());
        }
        try {
            foreach ($struk_gaji as $file) {
                strukGajiM::create([
                    'struk_gaji' => $file,
                    'pengajuan_id' => $pengajuanId,

                ]);
            }
        } catch (\Exception $e) {
            Log::error('Gagal simpan foto tambahan: ' . $e->getMessage());
        }
        try {
            foreach ($denah_rumah as $file) {
                denahRumahM::create([
                    'denah_rumah' => $file,
                    'pengajuan_id' => $pengajuanId,
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Gagal simpan foto tambahan: ' . $e->getMessage());
        }
        // dd('gagal');

        return redirect()->route('pengajuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengajuanM $pengajuan)
    {
        $penghasilanPengeluaran = penghasilanPengeluaranM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $pembiayaan = pembiayaanM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $jaminan = jaminanM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $ceklis = ceklisM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $berkas_ktp_suami = berkas_ktp_suamiM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $berkas_jaminan = berkas_jaminanM::where('pengajuan_id', $pengajuan->id_pengajuan)->get();
        $limaC = limacM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();

        return view('pages.pengajuan.show_pengajuan', compact('pengajuan', 'penghasilanPengeluaran', 'pembiayaan', 'jaminan', 'ceklis', 'berkas_ktp_suami', 'berkas_jaminan', 'limaC'));
    }
    public function show_berkas(pengajuanM $pengajuan)
    {
        $penghasilanPengeluaran = penghasilanPengeluaranM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $pembiayaan = pembiayaanM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $jaminan = jaminanM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $ceklis = ceklisM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $berkas_ktp_suami = berkas_ktp_suamiM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $berkas_ktp_istri = berkas_ktp_istriM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $berkas_kk = fc_kkM::where('pengajuan_id', $pengajuan->id_pengajuan)->first();
        $berkas_jaminan = berkas_jaminanM::where('pengajuan_id', $pengajuan->id_pengajuan)->get();
        $struk_gaji = strukGajiM::where('pengajuan_id', $pengajuan->id_pengajuan)->get();
        $denah_rumah = denahRumahM::where('pengajuan_id', $pengajuan->id_pengajuan)->get();
        return view('pages.pengajuan.show_pengajuan_berkas', compact('pengajuan', 'penghasilanPengeluaran', 'pembiayaan', 'jaminan', 'ceklis', 'berkas_ktp_suami', 'berkas_jaminan', 'berkas_ktp_istri', 'berkas_kk', 'struk_gaji', 'denah_rumah'));
    }

    public function komite_pengajuan(PengajuanM $pengajuan){
        $komite = komiteM::where('pengajuan_id',$pengajuan->id_pengajuan)->first();
        // dd($komite->id_komite);
        $pesanKomite = pesanKomiteM::where('komite_id',$komite->id_komite)->get();
        return view('pages.pengajuan.komite', compact('pengajuan','komite','pesanKomite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengajuanM $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengajuanM $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengajuanM $pengajuan)
    {
        $id_pengajuan = $pengajuan->id_pengajuan;

        $formulir_pengajuan = $pengajuan->formulir_pengajuan;
        // dd($formulir_pengajuan);
        $pathPengajuan = public_path($formulir_pengajuan);
        if (File::exists($pathPengajuan)) {
            File::delete($pathPengajuan);
        } else {
            dd('formulir pengajuan gagal');
        }
        $ktp_suami = berkas_ktp_suamiM::where('pengajuan_id', $id_pengajuan)->first();
        $path_ktp_suami = public_path($ktp_suami->berkas_ktp_suami);
        if (File::exists($path_ktp_suami)) {
            File::delete($path_ktp_suami);
        } else {
            dd('KTP Suami gagal');
        }
        $ktp_istri = berkas_ktp_istriM::where('pengajuan_id', $id_pengajuan)->first();
        $path_ktp_istri = public_path($ktp_istri->berkas_ktp_istri);
        if (File::exists($path_ktp_istri)) {
            File::delete($path_ktp_istri);
        } else {
            dd('KTP istri gagal');
        }
        $kk = fc_kkM::where('pengajuan_id', $id_pengajuan)->first();
        $path_kk = public_path($kk->kk);
        if (File::exists($path_kk)) {
            File::delete($path_kk);
        } else {
            dd('jaminan gagal');
        }
        $jaminan = berkas_jaminanM::where('pengajuan_id', $id_pengajuan)->get();
        foreach($jaminan as $j){
            $path_jaminan = public_path($j->berkas_jaminan);
            if (File::exists($path_jaminan)) {
                File::delete($path_jaminan);
            } else {
                dd('jaminan gagal');
            }
        }
        $struk_gaji = strukGajiM::where('pengajuan_id', $id_pengajuan)->get();
        foreach($struk_gaji as $sg){
            $path_sg = public_path($sg->struk_gaji);
            if (File::exists($path_sg)) {
                File::delete($path_sg);
            } else {
                dd('struk gaji gagal');
            }
        }
        $denah_rumah = denahRumahM::where('pengajuan_id', $id_pengajuan)->get();
        foreach($denah_rumah as $dr){
            $path_dr = public_path($dr->denah_rumah);
            if (File::exists($path_dr)) {
                File::delete($path_dr);
            } else {
                dd('struk gaji gagal');
            }
        }
        $pengajuan->delete();
        return redirect()->route('pengajuan');
        // dd('data berhasil');
    }
}
