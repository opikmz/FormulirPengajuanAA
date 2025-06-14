@extends('layouts.main')
@section('container')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengajuan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-0 my-3">
        <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan Terbaru</b> </label>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0"  width="100%" cellspacing="0">
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
        @if (Auth::user()->role === 'marketing')
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
{{-- <script>
    var keuangan = @json($keuangan);
        var label = Object.keys(keuangan);
        var data = Object.values(keuangan);
</script> --}}
@endsection