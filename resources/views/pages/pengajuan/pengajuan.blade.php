@extends('layouts.main')
@section('container')
<div class="container-fluid">
    @error('error')
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
            aria-label="Warning:">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>
            {{ $message }}
        </div>
    </div>
    @enderror
    <!-- Page Heading -->
    <h1 class="h3 font-weight-bold mb-2 text-dark">Pengajuan</h1>
    <div class="">Pengajuan</div>

    <!-- DataTales Example -->
    <div class="card shadow mb-0 my-3">
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'komite' )
           <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan</b> </label>
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'marketing')
            <a href="/create_pengajuan" class="btn btn-primary">Tambah</a>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                <thead class="mb-0" style="margin: 0%;">
                    <tr>
                        <th>Pengelola</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jumlah Pembiayaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="mt-0">
                    @foreach ($pengajuan as $p)
                    @php
                    $jumlahPembiyaan = App\Models\pembiayaanM::where('pengajuan_id',$p->id_pengajuan)->first();
                    @endphp
                    <tr>
                        <td>{{ $p->pengelola }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>Rp.{{ $jumlahPembiyaan->jumlah_pembiayaan }}</td>
                        {{-- <td>Tanggal</td> --}}
                        {{-- <td>{{ $p->nama }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->kode_barang }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->created_at }}</td> --}}
                        <td>
                            <a href="/show_pengajuan/{{ $p->id_pengajuan }}" class="btn btn-primary">Lihat</a>
                            <a href="/destroy_pengajuan/{{ $p->id_pengajuan }}" class="btn btn-danger">hapus</a>
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
        @endif
        @if ( Auth::user()->role === 'mancab')
           <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan</b> </label>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                <thead class="mb-0" style="margin: 0%;">
                    <tr>
                        <th>Pengelola</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jumlah Pembiayaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="mt-0">
                    @foreach ($pengajuanCabang as $pc)
                    @php
                    $jumlahPembiyaan = App\Models\pembiayaanM::where('pengajuan_id',$pc->id_pengajuan)->first();
                    @endphp
                    <tr>
                        <td>{{ $pc->pengelola }}</td>
                        <td>{{ $pc->nama }}</td>
                        <td>{{ $pc->alamat }}</td>
                        <td>Rp.{{ $jumlahPembiyaan->jumlah_pembiayaan }}</td>
                        <td>
                            <a href="/show_pengajuan/{{ $pc->id_pengajuan }}" class="btn btn-primary">Lihat</a>
                            <a href="/destroy_pengajuan/{{ $pc->id_pengajuan }}" class="btn btn-danger">hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @if (Auth::user()->role === 'marketing')
           <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan</b> </label>
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'marketing')
            <a href="/create_pengajuan" class="btn btn-primary">Tambah</a>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                <thead class="mb-0" style="margin: 0%;">
                    <tr>
                        <th>Pengelola</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jumlah Pembiayaan</th>
                        {{-- <th>Tanggal</th> --}}
                        {{-- @if (Auth::user()->role == 'manager') --}}
                        {{-- <th>Aksi</th> --}}
                        {{-- @endif --}}
                        {{-- @if (Auth::user()->role == 'admin') --}}
                        <th>Aksi</th>
                        {{-- @endif --}}
                    </tr>
                </thead>
                <tbody class="mt-0">
                    @foreach ($pengajuanOne as $po)
                    @php
                    $jumlahPembiyaan = App\Models\pembiayaanM::where('pengajuan_id',$po->id_pengajuan)->first();
                    @endphp
                    <tr>
                        <td>{{ $po->pengelola }}</td>
                        <td>{{ $po->nama }}</td>
                        <td>{{ $po->alamat }}</td>
                        <td>Rp.{{ $jumlahPembiyaan->jumlah_pembiayaan }}</td>
                        {{-- <td>Tanggal</td> --}}
                        {{-- <td>{{ $p->nama }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->kode_barang }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->created_at }}</td> --}}
                        <td>
                            <a href="/show_pengajuan/{{ $po->id_pengajuan }}" class="btn btn-primary">Lihat</a>
                            <a href="/destroy_pengajuan/{{ $po->id_pengajuan }}" class="btn btn-danger">hapus</a>
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
        @endif
    </div>

</div>
@endsection