@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 font-weight-bold mb-2 text-dark">Lihat Pengajuan</h1>
    <div class="">Pengajuan / Cek List</div>

    <!-- DataTales Example -->
    <div class="card  shadow my-3 py-2" >
        <div class="body-card">
            <div class="row mx-10 px-3">
                <div class="col items-center mb-1 ">
                    <div class="btn btn-primary rounded-pill  py-1" >1</div>
                    <a href="" class="  font-weight-bold text-dark active text-decoration-none ">Pemohon</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill py-1 active" >2</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Cek List</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill  py-1" >3</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill py-1" >2</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Ceklist</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill  py-1" >3</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-1">
                    <div class="btn btn-primary rounded-pill  py-1" >3</div>
                    <a href="" class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body row px-5">
            {{-- <form action="/store_produk" method="POST">
                @csrf
                <label for="" class="m-0"> <b>Nama</b> </label>
                <input type="text" name="" value="Taufik Putra" class="form-control mb-3" style="width:20rem" disabled>
                <label for="" class="m-0"> <b>Alamat</b> </label>
                <input type="text" name="" value="Depok Kretek Bantul City" class="form-control mb-3"
                    style="width:20rem" disabled>
                <label for="" class="m-0"> <b>Jumlah Pembiayaan</b> </label>
                <input type="number" name="" value="20.000" class="form-control mb-3" style="width:20rem" disabled>
            </form> --}}
            <div class="form-check mr-4">
                <input class="form-check-input"  type="checkbox" name="" id="">
                <label class="form-check-label text-dark font-weight-bold" for=""> Fc KTP</label>
            </div>
            <div class="form-check mr-4">
                <input class="form-check-input"  type="checkbox" name="" id="">
                <label class="form-check-label text-dark font-weight-bold" for=""> Fc KK</label>
            </div>
            <div class="form-check mr-4">
                <input class="form-check-input"  type="checkbox" name="" id="">
                <label class="form-check-label text-dark font-weight-bold" for=""> Fc Usaha</label>
            </div>
            <div class="form-check mr-4">
                <input class="form-check-input"  type="checkbox" name="" id="">
                <label class="form-check-label text-dark font-weight-bold" for=""> Mutasi Rekening</label>
            </div>
            <div class="form-check mr-4">
                <input class="form-check-input"  type="checkbox" name="" id="">
                <label class="form-check-label text-dark font-weight-bold" for=""> Ceklist 1</label>
            </div>
        </div>
    </div>
</div>
@endsection