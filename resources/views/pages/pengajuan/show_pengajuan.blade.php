@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 font-weight-bold mb-2 text-dark">Lihat Pengajuan</h1>
    <div class="">Pengajuan / Pemohon</div>

    <!-- DataTales Example -->

    <div class="card  shadow my-3 py-2">
        <div class="body-card">
            <div class="row mx-10 px-3">
                <div class="col  items-center mb-1 ">
                    <div class="btn btn-primary rounded-pill active py-1">1</div>
                    <a href="" class="  font-weight-bold text-dark active text-decoration-none ">Pemohon</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill py-1">2</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill py-1">3</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Komite</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 col-md-6 col-lg-4 card shadow p-0 mb-4  mx-2">
            <div class="card-header py-2 px-4">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Pemohon</b> </label>
            </div>
            <div class="card-body">
                <form action="/store_produk" method="POST">
                    @csrf
                    <label for="" class="m-0"> <b>Nama</b> </label>
                    <input type="text" name="" value="Taufik Putra" class="form-control mb-3" disabled>
                    <label for="" class="m-0"> <b>Alamat</b> </label>
                    <input type="text" name="" value="Depok Kretek Bantul City" class="form-control mb-3" disabled>
                    {{-- <label for="" class="m-0"> <b>Jumlah Pembiayaan</b> </label>
                    <input type="number" name="" value="20.000" class="form-control mb-3" disabled> --}}
                    {{-- <label for=""> <b>Jenis</b> </label>
                    <div class="input-group" style="width:20rem">
                        <select class="form-control" id="inputGroupSelect01" style="width:20rem" name="jenis" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="barang">barang</option>
                        </select>
                    </div><br> --}}
                    {{-- <button type="submit" class="btn btn-primary">Tambahkan</button> --}}

                </form>
            </div>
        </div>
        <div class="col card shadow p-0 mb-4  mx-2">
            <div class="card-header py-2 px-4">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Penghasilan & Pengeluaran</b> </label>
            </div>
            <div class="card-body">
                <form action="/store_produk" method="POST">
                    @csrf
                    <label for="" class="m-0"> <b>Pekerjaan</b> </label>
                    <input type="text" name="" class="form-control mb-3">
                    <label for="" class="m-0"> <b>Pendapatan</b> </label>
                    <input type="text" name="" placeholder="Laba Bersih per Bulan" class="form-control mb-3">
                    <label for="" class="m-0"> <b>Pengeluaran</b> </label>
                    <input type="number" name="" placeholder="Pengeluaran " class="form-control mb-3">
                    {{-- <label for=""> <b>Jenis</b> </label>
                    <div class="input-group" style="width:20rem">
                        <select class="form-control" id="inputGroupSelect01" style="width:20rem" name="jenis" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="barang">barang</option>
                        </select>
                    </div><br> --}}
                    {{-- <button type="submit" class="btn btn-primary">Tambahkan</button> --}}

                </form>
            </div>
        </div>
        <div class="col card shadow p-0 mb-4  mx-2">
            <div class="card-header py-2 px-4">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Pembiayaan</b> </label>
            </div>
            <div class="card-body">
                <form action="/store_produk" method="POST">
                    @csrf
                    <label for="" class="m-0"> <b>Jumlah Pembiayaan</b> </label>
                    <input type="number" name="" class="form-control mb-3">
                    <label for="" class="m-0"> <b>Jangka Waktu</b> </label>
                    <input type="number" name="" placeholder="Laba Bersih per Bulan" class="form-control mb-3">
                    <label for="" class="m-0"> <b>Sistem Pengembalian</b> </label>
                    <input type="text" name="" placeholder="Pengeluaran " class="form-control mb-3">
                    <label for="" class="m-0"> <b>Bentuk Pembiayaan</b> </label>
                    <input type="text" name="" placeholder="Pengeluaran " class="form-control mb-3">
                    {{-- <label for=""> <b>Jenis</b> </label>
                    <div class="input-group" style="width:20rem">
                        <select class="form-control" id="inputGroupSelect01" style="width:20rem" name="jenis" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="barang">barang</option>
                        </select>
                    </div><br> --}}
                    {{-- <button type="submit" class="btn btn-primary">Tambahkan</button> --}}

                </form>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col card shadow p-0 mb-4  mx-2">
            <div class="card-header py-2 px-4">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Data Jaminan</b> </label>
            </div>
            <div class="card-body">
                <form action="/store_produk" method="POST">
                    @csrf
                    <label for="" class="m-0"> <b>Jaminan</b> </label>
                    <input type="text" name="" class="form-control mb-3">
                    <label for="" class="m-0"> <b>Nilai Jaminan</b> </label>
                    <input type="number" name="" class="form-control mb-3">
                    {{-- <label for=""> <b>Jenis</b> </label>
                    <div class="input-group" style="width:20rem">
                        <select class="form-control" id="inputGroupSelect01" style="width:20rem" name="jenis" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="barang">barang</option>
                        </select>
                    </div><br> --}}
                    {{-- <button type="submit" class="btn btn-primary">Tambahkan</button> --}}

                </form>
            </div>
        </div>

        <div class="col card shadow p-0 mb-4  mx-2">
            <div class="card-header py-2 px-4">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Ceklist</b> </label>
            </div>
            <div class="card-body">
                <form action="/store_produk" method="POST">
                    @csrf
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Fc KTP Suami</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Fc KTP Istri</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for="" > Fc KK</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for="" > Fc Jaminan</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" name="" id="" required>
                        <label class="form-check-label  font-weight-bold" for=""> Denah Rumah</label>
                    </div>
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="checkbox" name="" id="">
                        <label class="form-check-label  font-weight-bold" for=""> Struk Gaji</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-12 card shadow p-0 mb-4  mx-2">
            <div class="card-header py-2 px-4">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Berkas</b> </label>
                <div class="font-small">Bisa Memasukan Lebih Dari Satu File</div>

            </div>
            <div class="card-body row">
                <div class="col-4">
                    <label for="fcktpsuami" class="m-0"> <b>FC KTP Suami</b> </label>
                    <input type="file" name="" id="fcktpsuami" class="form-control mb-3" required>
                </div>
                <div class="col-4">
                    <label for="" class="m-0"> <b>FC KTP Istri</b> </label>
                    <input type="file" name="" class="form-control mb-3" required>
                </div>
                <div class="col-4">
                    <label for="" class="m-0"> <b>FC KK</b> </label>
                    <input type="file" name="" class="form-control mb-3" required>
                </div>
                <div class="col-4">
                    <label for="" class="m-0"> <b>Jaminan</b> </label>
                    <input type="file" name="" class="form-control mb-3" required>
                </div>
                <div class="col-4">
                    <label for="" class="m-0"> <b>Struk Gaji</b> </label>
                    <input type="file" name="" class="form-control mb-3" required>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection