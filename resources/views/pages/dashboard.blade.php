@extends('layouts.main')
@section('container')
<div class="container-fluid">
    @if (session('successLogin'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="allert">
        <i class="fa-solid fa-check  " style="font-size: 20px"></i>
        <strong>Selamat </strong> {{ session('successLogin') }}.

    </div>
    @endif
    <div class="row mb-3">
        {{-- Jumlah pengajuan --}}
        @if (Auth::user()->role === 'mancab')
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengajuanCabang }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengajuanCabangAcc}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan Ditolak </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengajuanCabangNoAcc }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        @if (Auth::user()->role === 'marketing')
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengajuanMarketing }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan Diterima </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahPengajuanMarketingAcc }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengauan Ditolak </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $jumlahPengajuanMarketingNoAcc }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'komite')
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengajuan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengajuan Diterima </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jpacc}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengajuan Ditolak </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jpnacc }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    {{-- End jumlah pengajuan --}}

    {{-- Body Komite--}}
    @if (Auth::user()->role === 'komite' || Auth::user()->role === 'admin')
    <div class="row">

        <div class="col-12 col-lg-6">
            <div class="card shadow mb-0 my-3">
                <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Terbaru</b> </label>
                </div>
                <div class="card-body">
                    @if(empty($pengajuanTerbaru) || $pengajuanTerbaru->count() == 0)
                    <div class="">
                        <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Tidak Ditemukan</b> </label>
                    </div>
                    @else
                    @foreach ($pengajuanTerbaru as $pt)
                    @php
                    $statuspt = App\Models\komiteM::where('pengajuan_id',$pt->id_pengajuan)->first();
                    $pembiayaanpt = App\Models\pembiayaanM::where('pengajuan_id',$pt->id_pengajuan)->first();
                    @endphp
                    <div class="list-group ">
                        <div class="list-group-item py-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col">
                                        <div class="">
                                            <a href="/show_pengajuan/{{ $pt->id_pengajuan }} "
                                                class="text-xs font-weight-bold mb-1 text-dark">
                                                {{ \Illuminate\Support\Str::limit($pt->nama, 17) }}
                                            </a>
                                        </div>
                                        <div class="mt-0">
                                            @if ($statuspt->status === 'acc')
                                            <span class="bg-primary text-xs rounded-pill badge text-white px-2">
                                                ACC</span>
                                            @elseif ($statuspt->status === 'tidak_acc')
                                            <span class="bg-danger text-xs rounded-pill badge text-white px-2">
                                                Tidak ACC
                                            </span>
                                            @else
                                            <span class="bg-warning text-xs rounded-pill badge text-white px-2">
                                                Pengajuan
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="text-xs rounded-pill text-primary">Jumlah Pengajuan</span>
                                    <div class="text-md font-weight-bold mb-1 text-dark">
                                        {{ \Illuminate\Support\Str::limit($pembiayaanpt->jumlah_pembiayaan, 15) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card shadow mb-0 my-3">
                <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Total     Cabang Terbanyak</b> </label>
                </div>
                <div class="card-body">
                    @foreach ($pengajuanCabangTerbanyak as $pct)
                    <div class="list-group"  style="border: none ">
                        <div class="list-group-item py-2 ">
                            <div class="row align-items-center">
                                <div class="col-6 ">
                                    <div class="col">
                                        <div class="d-flex justify-start align-items-center">
                                            <div class="bg-primary rounded-pill text-white px-2 mr-2">{{ $loop->iteration }}</div>
                                            <div class="text-md font-weight-bold mb-1 text-dark">{{ $pct->cabang }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- <span class="text-xs rounded-pill text-primary">Jumlah Pengajuan</span> --}}
                                    <div class="text-md font-weight-bold mb-1 text-dark">
                                        {{ $pct->total_pembiayaan }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    @endif
    {{-- End Body Komite --}}

    {{-- Body Marketing --}}
    @if (Auth::user()->role === 'marketing')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow mb-0 my-3">
                <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Terbaru</b> </label>
                </div>
                <div class="card-body">
                    @if(empty($pengajuanMarketingTerbaru) || $pengajuanMarketingTerbaru->count() == 0)
                    <div class="">
                        <div class="mb-2">
                            <div class="">Data tidak ditemukan</div>
                        </div>
                    </div>
                    @else
                    @foreach ($pengajuanMarketingTerbaru as $pmt)
                    @php
                    $statuspmt = App\Models\komiteM::where('pengajuan_id',$pmt->id_pengajuan)->first();
                    $pembiayaanpmt = App\Models\pembiayaanM::where('pengajuan_id',$pmt->id_pengajuan)->first();
                    @endphp
                    <div class="list-group ">
                        <div class="list-group-item py-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col">
                                        <div class="">
                                            <a href="/show_pengajuan/{{ $pmt->id_pengajuan }}"
                                                class="text-xs font-weight-bold mb-1 text-dark">
                                                {{ \Illuminate\Support\Str::limit($pmt->nama, 17) }}
                                            </a>
                                        </div>
                                        <div class="mt-0">
                                            @if ($statuspmt->status === 'acc')
                                            <span class="bg-primary text-xs rounded-pill badge text-white px-2">
                                                ACC</span>
                                            @elseif ($statuspmt->status === 'tidak_acc')
                                            <span class="bg-danger text-xs rounded-pill badge text-white px-2">
                                                Tidak ACC
                                            </span>
                                            @else
                                            <span class="bg-warning text-xs rounded-pill badge text-white px-2">
                                                Pengajuan
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="text-xs rounded-pill text-primary">Jumlah Pengajuan</span>
                                    <div class="text-md font-weight-bold mb-1 text-dark">
                                        Rp.
                                        {{ \Illuminate\Support\Str::limit($pembiayaanpmt->jumlah_pembiayaan, 15) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
    @endif
    {{-- End body marketing --}}


    @if (Auth::user()->role === 'mancab')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow mb-0 my-3">
                <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Terbaru</b> </label>
                </div>
                <div class="card-body">
                    {{-- @if(empty($pengajuanMarketingTerbaru) || $pengajuanMarketingTerbaru->count() == 0)
                    <div class="">
                        <div class="mb-2">
                            <div class="">Data tidak ditemukan</div>
                        </div>
                    </div>
                    @else
                    @foreach ($pengajuanMarketingTerbaru as $pmt)
                    @php
                    $statuspmt = App\Models\komiteM::where('pengajuan_id',$pmt->id_pengajuan)->first();
                    $pembiayaanpmt = App\Models\pembiayaanM::where('pengajuan_id',$pmt->id_pengajuan)->first();
                    @endphp
                    <div class="list-group ">
                        <div class="list-group-item py-2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col">
                                        <div class="">
                                            <a href="/show_pengajuan/{{ $pmt->id_pengajuan }}"
                                                class="text-xs font-weight-bold mb-1 text-dark">
                                                {{ \Illuminate\Support\Str::limit($pmt->nama, 17) }}
                                            </a>
                                        </div>
                                        <div class="mt-0">
                                            @if ($statuspmt->status === 'acc')
                                            <span class="bg-primary text-xs rounded-pill badge text-white px-2">
                                                ACC</span>
                                            @elseif ($statuspmt->status === 'tidak_acc')
                                            <span class="bg-danger text-xs rounded-pill badge text-white px-2">
                                                Tidak ACC
                                            </span>
                                            @else
                                            <span class="bg-warning text-xs rounded-pill badge text-white px-2">
                                                Pengajuan
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="text-xs rounded-pill text-primary">Jumlah Pengajuan</span>
                                    <div class="text-md font-weight-bold mb-1 text-dark">
                                        Rp.
                                        {{ \Illuminate\Support\Str::limit($pembiayaanpmt->jumlah_pembiayaan, 15) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif --}}
                </div>

            </div>
        </div>
    </div>
    @endif
</div>
@endsection
