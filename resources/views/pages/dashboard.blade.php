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
        @if (Auth::user()->role === 'komite' || Auth::user()->role === 'admin' )
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
    </div>
    @if (Auth::user()->role === 'komite')
    <div class="card shadow mb-0 my-3">
        <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Terbaru</b> </label>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0" width="100%" cellspacing="0">
                <thead class="mb-0" style="margin: 0%;">
                    <tr>
                        <th>Pengelola</th>
                        <th>Nama</th>
                        <th>Jumlah Pembiayaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="mt-0">
                    @foreach ($pengajuanTerbaru as $p)
                    @php
                    $jumlahPembiayaanTerbaru = App\Models\pembiayaanM::where('pengajuan_id',$p->id_pengajuan)->first();
                    @endphp
                    <tr>
                        <td>{{ $p->pengelola }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>Rp.{{ $jumlahPembiayaanTerbaru->jumlah_pembiayaan }}</td>
                        <td>
                            <a href="/show_pengajuan/{{ $p->id_pengajuan }}" class="btn btn-primary">Lihat</a>
                        </td>
                        {{-- @if (Auth::user()->role == 'manager')
                        <td>
                            <a href="/edit_produk/{{ $p->id_barang }}" class="btn btn-primary">edit</a>
                            <a href="/destroy_produk/{{ $p->id_barang }}" class="btn btn-danger">hapus</a>
                        </td>
                        @endif
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <a href="/edit_produk/{{ $p->id_barang }}" class="btn btn-primary">edit</a>
                            <a href="/destroy_produk/{{ $p->id_barang }}" class="btn btn-danger">hapus</a>
                        </td>
                        @endif --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if (Auth::user()->role === 'marketing')
    <div class="row">
        <div class="col-12 col-lg-5">
            <div class="card shadow mb-0 my-3">
                <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Terbaru</b> </label>
                </div>
                <div class="card-body">
                    @foreach ($pengajuanMarketingTerbaru as $pmt)
                    @php
                    $statuspmt = App\Models\komiteM::where('pengajuan_id',$pmt->id_pengajuan)->first();
                    $pembiayaanpmt = App\Models\pembiayaanM::where('pengajuan_id',$pmt->id_pengajuan)->first();
                    @endphp
                    <div class="list-group ">
                        <div class="list-group-item ">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col">
                                        <div class="">
                                            <a href="" class="text-xs font-weight-bold mb-1 text-dark">
                                                {{ \Illuminate\Support\Str::limit($pmt->nama, 17) }}
                                            </a>
                                        </div>
                                        <div class="">
                                            @if ($statuspmt->status === 'acc')
                                            <span class="bg-primary text-xs rounded-pill badge text-white px-2">{{
                                                $statuspmt->status }}</span>
                                            @elseif ($statuspmt->status === 'tidak_acc')
                                            <span class="bg-danger text-xs rounded-pill badge text-white px-2">{{
                                                $statuspmt->status }}</span>
                                            @else
                                            <span class="bg-warning text-xs rounded-pill badge text-white px-2">{{
                                                $statuspmt->status }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="text-xs rounded-pill text-primary">Jumlah Pengajuan</span>
                                    <div class="text-md font-weight-bold mb-1 text-dark">
                                        Rp.
                                        {{-- {{$pembiayaanpmt->jumlah_pembiayaan }} --}}
                                        {{ \Illuminate\Support\Str::limit($pembiayaanpmt->jumlah_pembiayaan, 15) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <a href="" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Taufik</a>
                        --}}

                        {{-- <div class=" text-lg font-weight-bold  mb-1 text-dark">Tessss</div> --}}
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    @endif
    {{-- @if (Auth::user()->role === 'marketing')
    <div class="card-shadow mb-0 my-3">
        <div class="card-body">
            <div class="list-group ">
                <a href="list-group-item">tes</a>
            </div>
        </div>
    </div>
    @endif --}}
</div>
@endsection