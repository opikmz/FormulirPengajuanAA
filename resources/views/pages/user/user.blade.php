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
    <!-- DataTales Example -->
    <div class="card shadow mb-0 my-3">
        <div class="card-header py-2 px-4 d-flex justify-content-between align-items-center">
            <label for="" class="m-0 text-dark font-weight-bold"> <b>User</b> </label>
            <a href="/create_user" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
                <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                    <thead class="mb-0" style="margin: 0%;">
                        <tr>
                            <th>Nama</th>
                            <th>username</th>
                            <th>Role</th>
                            <th>Cabang</th>
                            <th>Aksi</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody class="mt-0">
                        @foreach ($user as $u)
                        {{-- @php
                            $jumlahPembiyaan = App\Models\pembiayaanM::where('pengajuan_id',$p->id_pengajuan)->first();
                        @endphp --}}
                        <tr>
                            <td>{{ $u->nama }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->role }}</td>
                            <td>{{ $u->cabang }}</td>
                            <td>
                                <a href="/show_user/{{ $u->id_user }}" class="btn btn-primary">Lihat</a>
                                <a href="/destroy_user/{{ $u->id_user }}" class="btn btn-danger">hapus</a>
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
                {{--
            </div> --}}
        </div>
    </div>

</div>
@endsection
