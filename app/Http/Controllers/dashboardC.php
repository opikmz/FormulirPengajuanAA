<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\komiteM;
use App\Models\pengajuanM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class dashboardC extends Controller
{
    public function index()
    {
        $pengajuanTerbaru = pengajuanM::latest()->take(10)->get();
        $pengajuanOne =  pengajuanM::where('user_id', Auth::user()->id_user);
        $jumlahPengajuan = pengajuanM::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $jpacc = komiteM::where('status', 'acc')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $jpnacc = komiteM::where('status', 'tidak_acc')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();

        $jumlahPengajuanCabang = 0;
        if (Auth::user()->role === 'mancab') {
            $dataUserCabang = User::where('cabang', Auth::user()->cabang)->pluck('id_user');
            $jumlahPengajuanCabang = pengajuanM::whereIn('user_id', $dataUserCabang)
                ->whereMonth('created_at', Carbon::now()
                    ->month)->whereYear('created_at', Carbon::now()
                    ->year)->count();
        }
        $jumlahPengajuanCabangAcc = 0;
        if (Auth::user()->role === 'mancab') {
            $dataUserCabang = User::where('cabang', Auth::user()->cabang)->pluck('id_user');
            $pengajuanCabang = pengajuanM::whereIn('user_id', $dataUserCabang)->pluck('id_pengajuan');
            $jumlahPengajuanCabangAcc = komiteM::whereIn('pengajuan_id', $pengajuanCabang)->where('status', 'acc')->whereMonth('created_at', Carbon::now()
                ->month)->whereYear('created_at', Carbon::now()
                ->year)->count();
        }
        $jumlahPengajuanCabangNoAcc = 0;
        if (Auth::user()->role === 'mancab') {
            $dataUserCabang = User::where('cabang', Auth::user()->cabang)->pluck('id_user');
            $pengajuanCabang = pengajuanM::whereIn('user_id', $dataUserCabang)->pluck('id_pengajuan');
            $jumlahPengajuanCabangNoAcc = komiteM::whereIn('pengajuan_id', $pengajuanCabang)
                ->where('status', ' tidak_acc')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
        }
        $jumlahPengajuanMarketing = 0;
        $jumlahPengajuanMarketingAcc = 0;
        $jumlahPengajuanMarketingNoAcc = 0;
        // $pengajuanMarketingTerbaru = [];

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

                $pengajuanMarketingTerbaru = pengajuanM::where('user_id',Auth::user()->id_user)
                ->latest()
                ->take(5)
                ->get();
        }

        // dd($dataCabang);
        // $jpcab =
        return view('pages.dashboard', compact(
            'pengajuanTerbaru',
            'pengajuanOne',
            'jumlahPengajuan',
            'jpacc',
            'jpnacc',
            'jumlahPengajuanCabang',
            'jumlahPengajuanCabangAcc',
            'jumlahPengajuanCabangNoAcc',
            'jumlahPengajuanMarketing',
            'jumlahPengajuanMarketingAcc',
            'jumlahPengajuanMarketingNoAcc',
            'pengajuanMarketingTerbaru',
        ));
    }
}
