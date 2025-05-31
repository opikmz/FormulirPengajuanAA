@extends('layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Riwayat Pembelian</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
     
        <div class="card shadow mb-4">
             <div class="card-header py-3">

                <div class="row">
                    <div class="col-md">
                        <b>No Pembelian</b><br>
                        <b>Tanggal Pembelian</b><br>
                        <b>User</b><br>

                    </div>
                    @php
                        // $user = App\Models\User::find($id->id_user)
                    @endphp
                    <div class="col-md">
                        {{-- : {{ $id->id_pembelian }} <br>
                        : {{ $id->created_at }} <br>
                        : {{ $user->username }} <br> --}}

                    </div>
                </div>
            </div>
            <div class="card-body">
               <form action="/store_produk" method="POST">
                   @csrf
                   <label for=""> <b>Nama Barang/Produk</b> </label>
                   <input type="text" name="barang" class="form-control " style="width:20rem">
                   <label for=""> <b>Harga</b> </label>
                   <input type="number" name="harga" class="form-control " style="width:20rem">
                   <label for=""> <b>Kode Barang</b> </label>
                   <input type="text" name="kode_barang" class="form-control " style="width:20rem">
                   <label for=""> <b>Jenis</b> </label>
                   <div class="input-group" style="width:20rem">
                       <select class="form-control" id="inputGroupSelect01" style="width:20rem" name="jenis" required>
                           <option value="makanan">Makanan</option>
                           <option value="minuman">Minuman</option>
                           <option value="barang">barang</option>
                       </select>
                   </div><br>
                   <br>
                   <button type="submit" class="btn btn-primary">Tambahkan</button>
               </form>
           </div>
        </div>
    </div>
@endsection
