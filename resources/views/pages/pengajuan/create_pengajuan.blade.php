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
    <h1 class="h3 font-weight-bold mb-2 text-dark">Tambah Pengajuan</h1>
    <div class="">Pengajuan / Tambah Pengajuan</div>
    {{-- <div class="card shadow my-3 py-2">
        <div class="body-card">
            <div class="row mx-10 px-3">
                <div class="col  items-center mb-0 ">
                    <div class="btn btn-primary rounded-pill active py-1">1</div>
                    <a href="" class="  font-weight-bold text-dark active text-decoration-none ">Pemohon</a>
                </div>
                <div class="col items-center mb-0">
                    <div class="btn btn-primary rounded-pill py-1">2</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-0">
                    <div class="btn btn-primary rounded-pill py-1">3</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Komite</a>
                </div>
            </div>
        </div>
    </div> --}}
    <form action="/store_pengajuan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2 ">
            <div class="col-12 col-md-6 col-lg-4 card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Pemohon</b> </label>
                </div>

                <div class="card-body">
                    <label for="" class="m-0"> <b>Nama</b> </label>
                    <input type="text" name="nama" class="form-control mb-3" required>

                    <label for="" class="m-0"> <b>Alamat</b> </label>
                    <input type="text" name="alamat" class="form-control mb-3" required>

                    <label for="" class="m-0"> <b>Formulir Pengajuan</b> </label>
                    <input type="file" name="formulir_pengajuan" class="form-control mb-3" required>
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
                    <input type="text" name="pekerjaan" class="form-control mb-3" required>

                    <label for="" class="m-0"> <b>Pendapatan</b> </label>
                    <div class="row m-0 ">
                        <span class="col-2 mb-3 input-group-text" style="border-radius: 10% 0 0 10% "
                            id="validationTooltipUsernamePrepend">RP.</span>
                        <input type="number" name="pendapatan" min="1" placeholder="Laba bersih per-bulan"
                            style="border-radius: 0 0.35rem 0.35rem 0 " class="col form-control mb-3" required>
                    </div>

                    <label for="" class="m-0"> <b>Pengeluaran</b> </label>
                    <div class="row m-0 ">
                        <span class="col-2 mb-3 input-group-text" style="border-radius: 10% 0 0 10% "
                            id="validationTooltipUsernamePrepend">RP.</span>
                        <input type="number" name="pengeluaran" min="1" placeholder="Pengeluaran per-bulan"
                            style="border-radius: 0 0.35rem 0.35rem 0 " class="col form-control mb-3" required>
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
                        <input type="number" name="jumlah_pembiayaan" min="1" placeholder=""
                            style="border-radius: 0 0.35rem 0.35rem 0 " class="col form-control mb-3" required>
                    </div>
                    <label for="" class="m-0"> <b>Jangka Waktu</b> </label>
                    <input type="number" name="jangka_waktu" min="1" placeholder="Bulan" class="form-control mb-3"
                        required>

                    <label for="" class="m-0"> <b>Sistem Pengembalian</b> </label>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputGroupSelect01" name="sistem_pengembalian" required>
                            <option selected>Pilih Sistem Pengembalian</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="bulanan">Bulanan</option>
                            <option value="tangguh">Tangguh</option>
                        </select>
                    </div>

                    <label for="" class="m-0"> <b>Bentuk Pembiayaan</b> </label>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputGroupSelect01" name="bentuk_pembiayaan" required>
                            <option selected>Pilih Bentuk Pembiayaan</option>
                            <option value="murobahah">Murobahah</option>
                            <option value="mudhorobah">Mudhorobah</option>
                            <option value="ijaroh">Ijaroh</option>
                            <option value="musyarokah">Musyarokah</option>
                            <option value="qordul_hasan">Qordul Hasan</option>
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
                    <input type="text" name="jaminan" class="form-control mb-3" required>
                    <label for="" class="m-0"> <b>Nilai Jaminan</b> </label>
                    <input type="number" name="nilai_jaminan" min="1" class="form-control mb-3" required>
                </div>
            </div>
            <div class="col-12  col-lg card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Ceklist</b> </label>
                </div>
                <div class="card-body">
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" value="1" name="ceklis_ktp_suami" id="">
                        <label class="form-check-label  font-weight-bold" for=""> Fc KTP Suami</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" value="1" name="ceklis_ktp_istri" id="">
                        <label class="form-check-label  font-weight-bold" for=""> Fc KTP Istri</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" value="1" name="ceklis_kk" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Fc KK</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" value="1" name="ceklis_jaminan" id="" required>
                        <label class="form-check-label  font-weight-bold" for="">Jaminan</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" value="1" name="ceklis_denah_rumah" id="">
                        <label class="form-check-label  font-weight-bold" for=""> Denah Rumah</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" value="1" name="ceklis_struk_gaji" id=""
                            >
                        <label class="form-check-label  font-weight-bold" for=""> Struk Gaji</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 card shadow p-0 mb-4  mx-2">
                <div class="card-header py-2 px-4">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Berkas</b> </label>
                </div>
                <div class="card-body row mx-2">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="fcktpsuami" class="m-0"> <b>FC KTP Suami</b> </label>
                        <input type="file" name="ktp_suami" id="fcktpsuami" class="form-control mb-3">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>FC KTP Istri</b> </label>
                        <input type="file" name="ktp_istri" class="form-control mb-3">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>FC KK</b> </label>
                        <input type="file" name="kk" class="form-control mb-3" required>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Jaminan</b> </label>
                        <div class="font-small mt-0" style="font-size:10px">Dapat memasukan lebih dari satu file </div>
                        <input type="file" name="berkas_jaminan[]" class="form-control mb-3" multiple required>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Struk Gaji</b> </label>
                        <div class="font-small mt-0" style="font-size:10px">Dapat memasukan lebih dari satu file </div>
                        <input type="file" name="struk_gaji[]" class="form-control mb-3" multiple required>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label for="" class="m-0"> <b>Denah Rumah</b> </label>
                        <div class="font-small mt-0" style="font-size:10px">Dapat memasukan lebih dari satu file </div>
                        <input type="file" name="denah_rumah[]" class="form-control mb-3" multiple>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Ajukan Pengajuan</button>
    </form>
</div>
{{-- Editan col-12 --}}
{{-- flex: 0 0 100%; --}}
{{-- Catatan Tinggi ukuran from-file --}}
{{-- height:calc(1.5em + .75rem + 2px); --}}
@endsection