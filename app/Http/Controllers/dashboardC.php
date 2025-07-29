<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\komiteM;
use App\Models\pengajuanM;
use App\Models\pesanKomiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Can;

class dashboardC extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'marketing') {

            $jumlahPengajuanMarketing = pengajuanM::where('user_id', Auth::user()->id_user)
                ->count();

            $PengajuanMarketing = pengajuanM::where('user_id', Auth::user()->id_user)->pluck('id_pengajuan');
            $jumlahPengajuanMarketingAcc = komiteM::whereIn('pengajuan_id', $PengajuanMarketing)
                ->where('status', 'acc')
                ->count();

            $jumlahPengajuanMarketingNoAcc = komiteM::whereIn('pengajuan_id', $PengajuanMarketing)
                ->where('status', 'tidak_acc')
                ->count();

            $pengajuanMarketingTerbaru = pengajuanM::where('user_id', Auth::user()->id_user)
                ->latest()
                ->take(5)
                ->get();
            if (count($PengajuanMarketing) > 0) {
                $queryKomiteMarketingPengajuan = komiteM::where('pengajuan_id', $PengajuanMarketing)->pluck('id_komite');
                $pesanKomiteTerbaru = pesanKomiteM::whereIn('komite_id', $queryKomiteMarketingPengajuan)->latest()->take(5)->get();
            } else {
                $pesanKomiteTerbaru = null;
            }

            return view('pages.dashboard', compact(
                'jumlahPengajuanMarketing',
                'jumlahPengajuanMarketingAcc',
                'jumlahPengajuanMarketingNoAcc',
                'pengajuanMarketingTerbaru',
                'pesanKomiteTerbaru',
            ));
        }
        if (Auth::user()->role === 'komite') {

            $pengajuanTerbaru = pengajuanM::latest()->take(10)->get();
            $jumlahPengajuan = pengajuanM::whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jpacc = komiteM::where('status', 'acc')
                ->count();
            $jpnacc = komiteM::where('status', 'tidak_acc')
                ->count();

            $pengajuanCabangTerbanyak = User::join('pengajuan', 'users.id_user', '=', 'pengajuan.user_id')
                ->join('pembiayaan', 'pengajuan.id_pengajuan', '=', 'pembiayaan.pengajuan_id')
                ->join('komite', 'pengajuan.id_pengajuan', '=', 'komite.pengajuan_id')
                ->where('komite.status', 'acc')
                ->select('users.cabang', DB::raw('SUM(pembiayaan.jumlah_pembiayaan) as total_pembiayaan'))
                ->groupBy('users.cabang')
                ->orderByDesc('total_pembiayaan')->get();
            return view('pages.dashboard', compact(
                'pengajuanTerbaru',
                'jumlahPengajuan',
                'jpacc',
                'jpnacc',
                'pengajuanCabangTerbanyak',
            ));
        }
        if (Auth::user()->role === 'mancab') {
            $jumlahPengajuanCabang = 0;
            $jumlahPengajuanCabangAcc = 0;
            $dataUserCabang = User::where('cabang', Auth::user()->cabang)->pluck('id_user');
            $dataPengajuanCabang = pengajuanM::whereIn('user_id', $dataUserCabang)->pluck('id_pengajuan');
            $jumlahPengajuanCabangAcc = $dataPengajuanCabang->count();

            $jumlahPengajuanCabangNoAcc = komiteM::whereIn('pengajuan_id', $dataPengajuanCabang)
                ->where('status', 'tidak_acc')
                ->count();


            return view('pages.dashboard', compact(
                'jumlahPengajuanCabang',
                'dataUserCabang',
                'jumlahPengajuanCabang',
                'jumlahPengajuanCabangAcc',
                'jumlahPengajuanCabangNoAcc',
            ));
        }
        if (Auth::user()->role === 'admin') {
            $pengajuanTerbaru = pengajuanM::latest()->take(10)->get();
            $jumlahPengajuan = pengajuanM::whereMonth('created_at', Carbon::now()->month)
                ->count();
            $jpacc = komiteM::where('status', 'acc')
                ->count();
            $jpnacc = komiteM::where('status', 'tidak_acc')
                ->count();
            $pengajuanCabangTerbanyak = User::join('pengajuan', 'users.id_user', '=', 'pengajuan.user_id')
                ->join('pembiayaan', 'pengajuan.id_pengajuan', '=', 'pembiayaan.pengajuan_id')
                ->join('komite', 'pengajuan.id_pengajuan', '=', 'komite.pengajuan_id')
                ->where('komite.status', 'acc')
                ->select('users.cabang', DB::raw('SUM(pembiayaan.jumlah_pembiayaan) as total_pembiayaan'))
                ->groupBy('users.cabang')
                ->orderByDesc('total_pembiayaan')->get();
            return view('pages.dashboard', compact(
                'pengajuanTerbaru',
                'jumlahPengajuan',
                'jpacc',
                'jpnacc',
                'pengajuanCabangTerbanyak',
            ));
        }
    }
}
