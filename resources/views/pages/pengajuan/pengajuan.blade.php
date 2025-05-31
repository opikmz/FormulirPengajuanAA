@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pengajuan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 flex flex-wrap">
            <h6 class="m-0 font-weight-bold text-primary ">Tabel Pengajuan</h6>
             <a href="/tambah_produk" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            {{-- <div class="table-responsive"> --}}
                {{-- @if (Auth::user()->role == 'manager')
                <a href="/tambah_produk" class="btn btn-primary">Tambah</a>
                @endif
                @if (Auth::user()->role == 'admin')
                <a href="/tambah_produk" class="btn btn-primary">Tambah</a>
                @endif --}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kode Barang</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            {{-- @if (Auth::user()->role == 'manager') --}}
                            {{-- <th>Aksi</th> --}}
                            {{-- @endif --}}
                            {{-- @if (Auth::user()->role == 'admin') --}}
                            <th>Aksi</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($produk as $p) --}}
                        <tr>
                            <td>Nama</td>
                            <td>Harga</td>
                            <td>Kode Barang</td>
                            <td>Jenis</td>
                            <td>Tanggal</td>
                            {{-- <td>{{ $p->nama }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>{{ $p->kode_barang }}</td>
                            <td>{{ $p->jenis }}</td>
                            <td>{{ $p->created_at }}</td> --}}
                            <td>
                                <a href="/view_produk" class="btn btn-primary">Lihat</a>
                                <a href="/destroy_produk" class="btn btn-danger">hapus</a>
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
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>

</div>
@endsection