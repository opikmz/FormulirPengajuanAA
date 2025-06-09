@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <h1 class="h3 font-weight-bold mb-2 text-dark">Lihat Pengajuan</h1>
    <div class="">Pengajuan / Lihat Pengajuan</div>
    <div class="card shadow my-3 py-2">
        <div class="body-card">
            <div class="row mx-10 px-3">
                <div class="col  items-center mb-0 mt-1">
                    <div class="btn btn-primary rounded-pill active py-1">1</div>
                    <a href="" class="  font-weight-bold text-dark active text-decoration-none ">Pemohon</a>
                </div>
                <div class="col items-center mb-0 mt-1">
                    <a class="btn btn-primary rounded-pill py-1" style="cursor: pointer;" href="/show_pengajuan_berkas/{{ $pengajuan->id_pengajuan }}">2</a>
                    <a href="{{ url('show_pengajuan_berkas/' . $pengajuan->id_pengajuan) }}" class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-0 mt-1">
                    <div class="btn btn-primary rounded-pill py-1">3</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Komite</a>
                </div>
            </div>
        </div>
    </div>
    <form action="/store_pengajuan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-12 col-md-6 col-lg-4 card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pemohon</b> </label>
                </div>

                <div class="card-body">
                    <label for="" class="m-0"> <b>Nama</b> </label>
                    <input type="text" name="nama" value="{{ $pengajuan->nama }}" class="form-control mb-3" disabled>

                    <label for="" class="m-0"> <b>Alamat</b> </label>
                    <input type="text" name="" value="{{ $pengajuan->alamat }}" class="form-control mb-3" disabled>

                    {{-- <label for="" class="m-0"> <b>Formulir Pengajuan</b> </label>
                    <input type="file" name="" class="form-control mb-3" required> --}}
                    <div class="col-12 col-md-6 col-lg-4">
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Penghasilan & Pengeluaran</b> </label>
                </div>
                <div class="card-body">
                    <label for="" class="m-0"> <b>Pekerjaan</b> </label>
                    <input type="text" name="" value="{{ $penghasilanPengeluaran->pekerjaan }}"
                        class="form-control mb-3" disabled>

                    <label for="" class="m-0"> <b>Pendapatan</b> </label>
                    <div class="row m-0 ">
                        <span class="col-2 mb-3 input-group-text" style="border-radius: 10% 0 0 10% "
                            id="validationTooltipUsernamePrepend">RP.</span>
                        <input type="number" value="{{ $penghasilanPengeluaran->pendapatan }}" name=""
                            placeholder="Laba bersih per-bulan" style="border-radius: 0 0.35rem 0.35rem 0 "
                            class="col form-control mb-3" disabled>
                    </div>

                    <label for="" class="m-0"> <b>Pengeluaran</b> </label>
                    <div class="row m-0 ">
                        <span class="col-2 mb-3 input-group-text" style="border-radius: 10% 0 0 10% "
                            id="validationTooltipUsernamePrepend">RP.</span>
                        <input type="number" value="{{ $penghasilanPengeluaran->pengeluaran }}" name=""
                            placeholder="Pengeluaran per-bulan" style="border-radius: 0 0.35rem 0.35rem 0 "
                            class="col form-control mb-3" disabled>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pembiayaan</b> </label>
                </div>
                <div class="card-body">
                    <label for="" class="m-0"> <b>Jumlah Pembiayaan</b> </label>
                    <div class="row m-0 ">
                        <span class="col-2 mb-3 input-group-text" style="border-radius: 10% 0 0 10% "
                            id="validationTooltipUsernamePrepend">RP.</span>
                        <input type="number" name="" value="{{ $pembiayaan->jumlah_pembiayaan }}" placeholder=""
                            style="border-radius: 0 0.35rem 0.35rem 0 " class="col form-control mb-3" disabled>
                    </div>
                    <label for="" class="m-0"> <b>Jangka Waktu/Bulan</b> </label>
                    <input type="number" name="" value="{{ $pembiayaan->jangka_waktu }}" placeholder="Bulan"
                        class="form-control mb-3" disabled>

                    <label for="" class="m-0"> <b>Sistem Pengembalian</b> </label>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputGroupSelect01" name="sistem_pengembalian" disabled>
                            <option selected>{{ $pembiayaan->sistem_pengembalian }}</option>
                        </select>
                    </div>

                    <label for="" class="m-0"> <b>Bentuk Pembiayaan</b> </label>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputGroupSelect01" name="bentuk_pembiayaan" disabled>
                            <option selected>{{ $pembiayaan->bentuk_pembiayaan }}</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-md-6 col-lg card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Data Jaminan</b> </label>
                </div>
                <div class="card-body">
                    @csrf
                    <label for="" class="m-0"> <b>Jaminan</b> </label>
                    <input type="text" name="" value="{{ $jaminan->jaminan }}" class="form-control mb-3" disabled>
                    <label for="" class="m-0"> <b>Nilai Jaminan</b> </label>
                    <input type="number" name="" value="{{ $jaminan->nilai_jaminan }}" class="form-control mb-3"
                        disabled>
                </div>
            </div>
            <div class="col-12  col-lg card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Ceklist</b> </label>
                </div>
                <div class="card-body">
                    <div class="form-check mr-4">
                        <input class="form-check-input" {{ $ceklis->ceklis_ktp_suami === 1 ? 'checked' : '' }}
                        type="checkbox" name="" id="" >
                        <label class="form-check-label  font-weight-bold" for=""> Fc KTP Suami</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" {{ $ceklis->ceklis_ktp_istri === 1 ? 'checked' : '' }}
                        type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Fc KTP Istri</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" {{ $ceklis->ceklis_kk === 1 ? 'checked' : '' }}
                        name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Fc KK</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" {{ $ceklis->ceklis_jaminan === 1 ? 'checked' : '' }}
                        type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for="">Jaminan</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" {{ $ceklis->ceklis_denah_rumah === 1 ? 'checked' : '' }}
                        type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Denah Rumah</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" {{ $ceklis->ceklis_struk_gaji === 1 ? 'checked' : '' }}
                        type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Struk Gaji</label>
                    </div>
                </div>
            </div>
                 <div class="col-lg-12 card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>5 C</b> </label>
                </div>
                <div class="card-body row mx-2">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="fcktpsuami" class="m-0"> <b>Character</b> </label>
                        <input type="text" name="character" value="{{ $limaC->character }}" id="fcktpsuami" class="form-control mb-3" disabled>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Capacity</b> </label>
                        <input type="text" name="capacity" value="{{ $limaC->capacity }}" class="form-control mb-3" disabled>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Capital</b> </label>
                        <input type="text" name="capital" value="{{ $limaC->capital }}" class="form-control mb-3" disabled>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Collateral</b> </label>
                        <input type="text" name="collateral" value="{{ $limaC->collateral }}" class="form-control mb-3" disabled>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Condition</b> </label>
                        <input type="text" name="condition" value="{{ $limaC->condition }}" class="form-control mb-3" disabled>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Editan col-12 --}}
{{-- flex: 0 0 100%; --}}
{{-- Catatan Tinggi ukuran from-file --}}
{{-- height:calc(1.5em + .75rem + 2px); --}}
@endsection
