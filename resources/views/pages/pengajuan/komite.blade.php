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
    <h1 class="h3 font-weight-bold mb-2 text-dark">Komite Pengajuan</h1>
    <div class="">Pengajuan / Komite Pengajuan</div>
    <div class="card shadow my-3 py-2">
        <div class="body-card">
            <div class="row mx-10 px-3">
                <div class="col  items-center mb-0 mt-1">
                    {{-- <div class="btn btn-primary rounded-pill  py-1">1</div> --}}
                    <a class="btn btn-primary rounded-pill py-1" style="cursor: pointer;"
                        href="/show_pengajuan/{{ $pengajuan->id_pengajuan }}">1</a>
                    <a href="/show_pengajuan/{{ $pengajuan->id_pengajuan }}"
                        class="  font-weight-bold text-dark text-decoration-none ">Pemohon</a>
                </div>
                <div class="col items-center mb-0 mt-1">
                    <a class="btn btn-primary rounded-pill  py-1" style="cursor: pointer;"
                        href="/show_pengajuan_berkas/{{ $pengajuan->id_pengajuan }}">2</a>
                    <a href="{{ url('show_pengajuan_berkas/' . $pengajuan->id_pengajuan) }}"
                        class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-0 mt-1">
                    <a class="btn btn-primary rounded-pill active py-1" style="cursor: pointer;"
                        href="/komite_pengajuan/{{ $pengajuan->id_pengajuan }}">3</a>
                    <a href="{{ url('komite_pengajuan/' . $pengajuan->id_pengajuan) }}"
                        class="m-0 font-weight-bold text-dark active text-decoration-none ">Komite</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($komite->status === 'pengajuan')
            <button class="btn btn-warning mb-3 w-100" data-bs-target="#status_komite" data-bs-toggle="modal">
                Pengajuan
            </button>
            @elseif ($komite->status === 'acc')
            <button class="btn btn-primary mb-3 w-100" data-bs-target="#status_komite" data-bs-toggle="modal">
                ACC
            </button>
            @elseif ($komite->status === 'tidak_acc')
            <button class="btn btn-danger mb-3 w-100" data-bs-target="#status_komite" data-bs-toggle="modal">
                Tidak ACC
            </button>
            @endif
        </div>
    </div>
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'komite')
    <div class="modal fade" id="status_komite" tabindex="-1" aria-labelledby="status_komite" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0">
                <div class="card shadow w-lg-60 mx-auto my-3 py-3 px-3">
                    {{-- <label for="" class="m-0 text-dark font-weight-bold"> <b>{{ $pk->nama }}</b> </label> --}}
                    <div class="body-card ">
                        <h1 class="h3 font-weight-bold mb-2 text-dark">ACC / Tidak ACC</h1>
                        <form action="/update_status_komite/{{ $komite->id_komite }}" method="POST">
                            @csrf
                            <label for="" class="m-0 mb-3"> <b>Apakah Pengajuan ini di setujui?</b> </label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="inputGroupSelect01" name="status" required>
                                    <option value="acc">Ya disetujui / ACC</option>
                                    <option value="tidak_acc">Tidak / Tidak ACC</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif 

    @if (count($pesanKomite) ?? [] >0)
    @foreach ($pesanKomite as $pk)
    <div class="d-flex">
        <div class="flex-wrap">
            <div class="card shadow my-3 py-2 px-3">
                <div class="d-flex">
                    <div class="">
                        <label for="" class="m-0 text-dark font-weight-bold"> <b>{{ $pk->nama }}</b> </label>
                    </div>
                    @if (Auth::user()->nama === $pk->nama)
                    <div class="dropdown">
                        <button class="btn btn-sm" type="button" id="dropdownMenu{{ $pk->id_pesan_komite }}"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="dropdownMenu{{ $pk->id_pesan_komite }}">
                            <a class="dropdown-item " href="/destroy_pesan_komite/{{ $pk->id_pesan_komite }}">
                                <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i> Hapus
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="body-card">{{ $pk->pesan_komite }}</div>

            </div>
        </div>

    </div>
    @endforeach
    @else
    <div class="row">
        <div class="col-12 mx-0">
            <div class="card shadow my-3 py-2 px-3">
                {{-- <label for="" class="m-0 text-dark font-weight-bold"> <b>{{ $pk->nama }}</b> </label> --}}
                <div class="body-card">
                    <div class="mx-auto">
                        Pesan belum tersedia
                        Masukan pesan komite
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'komite' || Auth::user()->role === 'mancab' )
    <form action="/store_pesan_komite/{{ $komite->id_komite }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>Pesan Komite</b> </label>
            <textarea class="form-control mb-3" name="pesan_komite" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="hidden" name="nama" value="{{ Auth::user()->nama }}">
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
    @endif
</div>


{{-- Editan col-12 --}}
{{-- flex: 0 0 100%; --}}
{{-- Catatan Tinggi ukuran from-file --}}
{{-- height:calc(1.5em + .75rem + 2px); --}}
@endsection