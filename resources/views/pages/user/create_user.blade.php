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
    <h1 class="h3 font-weight-bold mb-2 text-dark">Tambah User</h1>
    <div class="">User / Tambah User</div>
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
    <form action="/store_user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2 ">
            <div class="col-12  card shadow p-0 mb-4  mx-2">
                <div class="card-header ">
                    <label for="" class="m-0 text-dark font-weight-bold"> <b>Input User</b> </label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg">
                            <label for="" class="m-0"> <b>Nama</b> </label>
                            <input type="text" name="nama" class="form-control mb-3" required>
                            <label for="" class="m-0"> <b>Username</b> </label>
                            <input type="text" name="username" class="form-control mb-3" required>
                            <label for="" class="m-0"> <b>Password</b> </label>
                            <input type="text" name="password" class="form-control mb-3" required>
                        </div>
                        <div class="col-12 col-lg">  
                            <label for="" class="m-0"> <b>Role</b> </label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="inputGroupSelect01" name="role" required>
                                    <option selected>Pilih Role User</option>
                                    <option value="admin">Admin</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="mancab">Mancab</option>
                                    <option value="komite">Komite</option>
                                </select>
                            </div>
                            <label for="" class="m-0"> <b>Cabang</b> </label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="inputGroupSelect01" name="cabang" required>
                                    <option selected>Pilih Cabang</option>
                                    <option value="pusat">Pusat</option>
                                    <option value="sanden">Sanden</option>
                                    <option value="bantul">Bantul</option>
                                    <option value="kretek">Kretek</option>
                                    <option value="piyungan">Piyungan</option>
                                    <option value="sedayu">Sedayu</option>
                                    <option value="kulon_progo">Kulon Progo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</div>
{{-- Editan col-12 --}}
{{-- flex: 0 0 100%; --}}
{{-- Catatan Tinggi ukuran from-file --}}
{{-- height:calc(1.5em + .75rem + 2px); --}}
@endsection