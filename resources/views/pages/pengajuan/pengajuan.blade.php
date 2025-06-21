@extends('layouts.main')
@section('container')
<div class="container-fluid">
    @if (session('succesStore'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="allert">
        <i class="fa-solid fa-check  " style="font-size: 20px"></i>
        <strong>Selamat </strong> {{ session('succesStore') }}.

    </div>
    @endif
    @if (session('succesDestroy'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="allert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <strong>Berhasil!</strong> Data telah dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
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
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'komite')
        <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan</b> </label>
            @if (Auth::user()->role === 'admin')
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
                    $jumlahPembiyaan = App\Models\pembiayaanM::where(
                    'pengajuan_id',
                    $p->id_pengajuan,
                    )->first();
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
        @if (Auth::user()->role === 'mancab')
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
                    $jumlahPembiyaan = App\Models\pembiayaanM::where(
                    'pengajuan_id',
                    $pc->id_pengajuan,
                    )->first();
                    @endphp
                    <tr>
                        <td>{{ $pc->pengelola }}</td>
                        <td>{{ $pc->nama }}</td>
                        <td>{{ $pc->alamat }}</td>
                        <td>Rp.{{ $jumlahPembiyaan->jumlah_pembiayaan }}</td>
                        <td>
                            <a href="/show_pengajuan/{{ $pc->id_pengajuan }}" class="btn btn-primary">Lihat</a>
                            {{-- <a href="/destroy_pengajuan/{{ $pc->id_pengajuan }}" class="btn btn-danger">hapus</a>
                            --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @if (Auth::user()->role === 'marketing')
        <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <div class="">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Tabel Pengajuan</b> </label>
                <div class="">{{ Auth::user()->nama }}</div>
            </div>
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'marketing')
            <a href="/create_pengajuan" class="btn btn-primary">Tambah</a>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                <thead class="mb-0" style="margin: 0%;">
                    <tr>
                        <th>No</th>
                        <th class="col-3">Pengelola</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jumlah Pembiayaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="mt-0">
                    @foreach ($pengajuanOne as $po)
                    @php
                    $jumlahPembiyaan = App\Models\pembiayaanM::where(
                    'pengajuan_id',
                    $po->id_pengajuan,
                    )->first();
                    $status = App\Models\komiteM::where('pengajuan_id', $po->id_pengajuan)->first();
                    // dd($status->status)
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if ($status->status === 'pengajuan')
                        <td class="" style="opacity: 100%;">
                            <div class="">
                                {{ $po->pengelola }}
                            </div>
                            <span class="bg-warning rounded-pill badge text-white">Pengajuan</span>

                        </td>
                        @endif
                        @if ($status->status === 'acc')
                        <div class="">
                            <td class=" text-dark" style="opacity: 100%;">
                                <div class="">
                                    {{ $po->pengelola }}
                                </div>
                                {{-- <div class="btn btn-primary rounded-pill">tes</div> --}}
                                <span class="bg-primary rounded-pill badge text-white">ACC</span>
                            </td>
                        </div>
                        @endif
                        @if ($status->status === 'tidak_acc')
                        <td class="" style="">
                            <div class="">
                                {{ $po->pengelola }}
                            </div>
                            <span class="bg-danger rounded-pill badge text-white">Tidak ACC</span>
                        </td>
                        @endif
                        <td>{{ $po->nama }}</td>
                        <td>
                            {{ \Illuminate\Support\Str::limit($po->alamat, 17) }}
                        </td>
                        <td>Rp.{{ $jumlahPembiyaan->jumlah_pembiayaan }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div class="bg-primary px-3  py-1 rounded-lg">
                                    <a href="/show_pengajuan/{{ $po->id_pengajuan }}"
                                        class="text-light font-weight-bold text-xs p-0 m-0">Lihat</a>
                                </div>
                                <div class="bg-danger px-3  py-1 rounded-lg">
                                    <a href="" class="text-light font-weight-bold text-xs p-0 m-0" data-toggle="modal"
                                        data-target="#modalDelete">hapus</a>
                                </div>
                            </div>
                            {{-- Modal Delete --}}
                            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content bg-transparent border-0">
                                        <div class="card shadow w-lg-40 mx-auto my-3 py-3 px-3">
                                            <div class="body-card ">
                                                <div class="text-center">
                                                    <i class="fa-solid fa-circle-exclamation text-danger mb-3"
                                                        style=" font-size:5rem"></i>
                                                    <h1 class="h3 font-weight-bold mb-2 ">Hapus</h1>
                                                    <div class="mb-3">Apakah kamu yakin menghapus ini?</div>
                                                </div>
                                                <div class="text-center">
                                                    <a class="btn btn-danger"
                                                        href="/destroy_pengajuan/{{ $po->id_pengajuan }}">Hapus</a>
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

@endsection
