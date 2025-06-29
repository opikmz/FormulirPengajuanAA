<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\komiteM;
use App\Models\pengajuanM;
use App\Models\pesanKomiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class dashboardC extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'marketing') {

            $jumlahPengajuanMarketing = pengajuanM::where('user_id', Auth::user()->id_user)
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            $PengajuanMarketing = pengajuanM::where('user_id', Auth::user()->id_user)->pluck('id_pengajuan');
            $jumlahPengajuanMarketingAcc = komiteM::whereIn('pengajuan_id', $PengajuanMarketing)
                ->where('status', 'acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            $jumlahPengajuanMarketingNoAcc = komiteM::whereIn('pengajuan_id', $PengajuanMarketing)
                ->where('status', 'tidak_acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            $pengajuanMarketingTerbaru = pengajuanM::where('user_id', Auth::user()->id_user)
                ->latest()
                ->take(5)
                ->get();
            $queryKomiteMarketingPengajuan = komiteM::where('pengajuan_id', $PengajuanMarketing)->pluck('id_komite');
            $pesanKomiteTerbaru = pesanKomiteM::whereIn('komite_id', $queryKomiteMarketingPengajuan)->latest()->take(5)->get();
            return view('pages.dashboard', compact(
                'jumlahPengajuanMarketing',
                'jumlahPengajuanMarketingAcc',
                'jumlahPengajuanMarketingNoAcc',
                'pengajuanMarketingTerbaru',
                'pesanKomiteTerbaru',
            ));
        }
        $jumlahPengajuan = pengajuanM::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $jpacc = komiteM::where('status', 'acc')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $jpnacc = komiteM::where('status', 'tidak_acc')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        if (Auth::user()->role === 'komite') {
            $pengajuanTerbaru = pengajuanM::latest()->take(10)->get();
            $jumlahPengajuan = pengajuanM::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jpacc = komiteM::where('status', 'acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jpnacc = komiteM::where('status', 'tidak_acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            return view('pages.dashboard', compact(
                'pengajuanTerbaru',
                'jumlahPengajuan',
                'jpacc',
                'jpnacc',
            ));
        }
        if (Auth::user()->role === 'mancab') {
            $jumlahPengajuanCabang = 0;
            $dataUserCabang = User::where('cabang', Auth::user()->cabang)->pluck('id_user');
            $jumlahPengajuanCabang = pengajuanM::whereIn('user_id', $dataUserCabang)
                ->whereMonth('created_at', Carbon::now()
                    ->month)->whereYear('created_at', Carbon::now()
                    ->year)->count();
        }
        $jumlahPengajuanCabangAcc = 0;
        if (Auth::user()->role === 'admin') {
            $pengajuanTerbaru = pengajuanM::latest()->take(10)->get();
            $jumlahPengajuan = pengajuanM::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jpacc = komiteM::where('status', 'acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            $jpnacc = komiteM::where('status', 'tidak_acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
            return view('pages.dashboard', compact(
                'pengajuanTerbaru',
                'jumlahPengajuan',
                'jpacc',
                'jpnacc',
            ));
        }
    }
}
