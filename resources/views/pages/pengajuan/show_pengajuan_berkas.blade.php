@extends('layouts.main')
@section('container')
<div class="container-fluid">

    <h1 class="h3 font-weight-bold mb-2 text-dark">Berkas Pengajuan</h1>
    <div class="">Pengajuan / Berkas Pengajuan</div>
    <div class="card shadow my-3 py-2">
        <div class="body-card">
            <div class="row mx-10 px-3">
                <div class="col  items-center mb-0 mt-1">
                    {{-- <div class="btn btn-primary rounded-pill  py-1">1</div> --}}
                    <a class="btn btn-primary rounded-pill py-1" style="cursor: pointer;"
                        href="/show_pengajuan/{{ $pengajuan->id_pengajuan }}">1</a>
                    <a href="/show_pengajuan/{{ $pengajuan->id_pengajuan }}"
                        class="  font-weight-bold text-dark active text-decoration-none ">Pemohon</a>
                </div>
                <div class="col items-center mb-0 mt-1">
                    <a class="btn btn-primary rounded-pill active py-1" style="cursor: pointer;"
                        href="/show_pengajuan_berkas/{{ $pengajuan->id_pengajuan }}">2</a>
                    <a href="{{ url('show_pengajuan_berkas/' . $pengajuan->id_pengajuan) }}"
                        class="m-0 font-weight-bold text-dark active text-decoration-none ">Berkas</a>
                </div>
                <div class="col items-center mb-0 mt-1">
                    <a class="btn btn-primary rounded-pill  py-1" style="cursor: pointer;"
                        href="/komite_pengajuan/{{ $pengajuan->id_pengajuan }}">3</a>
                    <a href="{{ url('komite_pengajuan/' . $pengajuan->id_pengajuan) }}"
                        class="m-0 font-weight-bold text-dark active text-decoration-none ">Komite</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>Pengajuan</b> </label>
            </div>
            <div class="image-hover-container mb-3" style="height: 20rem; width:15rem; cursor: pointer;" data-bs-toggle="modal"
                data-bs-target="#FormulirPengajuan">

                <img src="{{ asset($pengajuan->formulir_pengajuan) }}" alt="Formulir Pengajuan"
                    style="height: 20rem; width:15rem; object-fit: cover;">
                <div class="image-hover-overlay">Lihat</div>
            </div>
            <!-- Modal (Popup gambar besar) -->
            <div class="modal fade " id="FormulirPengajuan" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset($pengajuan->formulir_pengajuan) }}" class="img-fluid" alt="KTP Suami">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- KTP Suami --}}
        @if ($berkas_ktp_suami)
        <div class="col-12 col-lg-3">
            <div class="">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>KTP Suami</b> </label>
            </div>
            <div class="image-hover-container" style="height: 20rem; width:15rem; cursor: pointer; "
                data-bs-target="#berkas_ktp_suami" data-bs-toggle="modal">

                <img src="{{ asset($berkas_ktp_suami->berkas_ktp_suami) }}" class="d-block mb-3 "
                    style="height: 20rem; width:15rem; object-fit: cover;" alt="..." alt="KTP Suami">

                <div class="image-hover-overlay">Lihat</div>
            </div>
            <!-- Modal (Popup gambar besar) -->
            <div class="modal fade" id="berkas_ktp_suami" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset($berkas_ktp_suami->berkas_ktp_suami) }}" class="img-fluid "
                                alt="KTP Suami">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($berkas_ktp_istri)
        <div class="col-12 col-lg-3">
          <div class="">
              <label for="" class="m-0 text-dark font-weight-bold"> <b>KTP Istri</b> </label>
          </div>

          <div class="image-hover-container mb-3" style="height: 20rem; width:15rem; cursor: pointer; "
              data-bs-target="#berkas_ktp_istri" data-bs-toggle="modal">

              <img src="{{ asset($berkas_ktp_istri->berkas_ktp_istri) }}" class="d-block mb-3 "
                  style="height: 20rem; width:15rem; object-fit: cover;" alt="..." alt="KTP Istri">

              <div class="image-hover-overlay">Lihat</div>
          </div>
          <!-- Modal (Popup gambar besar) -->
          <div class="modal fade" id="berkas_ktp_istri" tabindex="-1" aria-labelledby="imageModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content bg-transparent border-0">
                      <div class="modal-body p-0 text-center">
                          <img src="{{ asset($berkas_ktp_istri->berkas_ktp_istri) }}" class="img-fluid"
                              alt="KTP Suami">
                      </div>
                  </div>
              </div>
          </div>
      </div>
        @endif
        <div class="col-12 col-lg-3">
            <div class="">
                <label for="" class="m-0 text-dark font-weight-bold"> <b>KK</b> </label>
            </div>
            <div class="image-hover-container mb-3" style="height: 20rem; width:15rem; cursor: pointer; "
                data-bs-target="#berkas_kk" data-bs-toggle="modal">

                <img src="{{ asset($berkas_kk->kk) }}" class="d-block mb-3 "
                    style="height: 20rem; width:15rem; object-fit: cover;" alt="..." alt="KTP Istri">

                <div class="image-hover-overlay">Lihat</div>
            </div>
            <!-- Modal (Popup gambar besar) -->
            <div class="modal fade" id="berkas_kk" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset($berkas_kk->kk) }}" class="img-fluid" alt="kk">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <label for="" class="m-0 text-dark font-weight-bold"> <b>Berkas Jaminan</b> </label>
    <div class="row">
        @foreach ($berkas_jaminan as $bj)
        <div class="col-lg col-12">
            @php
            $modalIdBerkasJaminan = 'modal_' . md5($bj->berkas_jaminan);
            @endphp
            <div class="image-hover-container mb-3" style="height: 20rem; width:15rem; cursor: pointer; "
                data-bs-target="#{{ $modalIdBerkasJaminan }}" data-bs-toggle="modal">

                <img src="{{ asset($bj->berkas_jaminan) }}" class="d-block mb-3 "
                    style="height: 20rem; width:15rem; object-fit: cover;" alt="..." alt="berkas_jaminan">

                <div class="image-hover-overlay">Lihat</div>
            </div>
            <!-- Modal (Popup gambar besar) -->
            <div class="modal fade" id="{{ $modalIdBerkasJaminan }}" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset($bj->berkas_jaminan) }}" class="img-fluid" alt="KTP Suami">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (count($struk_gaji)??[]>0)
    <label for="" class="m-0 text-dark font-weight-bold"> <b>Struk Gaji</b> </label>
    <div class="row">
        @foreach ($struk_gaji as $sg)
        <div class="col-lg col-12">
            @php
            $modalIdStrukGaji = 'modal_' . md5($sg->struk_gaji);
            @endphp
            <div class="image-hover-container mb-3" style="height: 20rem; width:15rem; cursor: pointer; "
                data-bs-target="#{{ $modalIdStrukGaji }}" data-bs-toggle="modal">

                <img src="{{ asset($sg->struk_gaji) }}" class="d-block mb-3 " style="height: 20rem; width:15rem; object-fit: cover;"
                    alt="..." alt="Struk Gaji">

                <div class="image-hover-overlay">Lihat</div>
            </div>
            <!-- Modal (Popup gambar besar) -->
            <div class="modal fade" id="{{ $modalIdStrukGaji }}" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset($sg->struk_gaji) }}" class="img-fluid" alt="KTP Suami">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    @if (count($denah_rumah)??[]>0)
    <label for="" class="m-0 text-dark font-weight-bold"> <b>Denah Rumah</b> </label>
    <div class="row">
        @foreach ($denah_rumah as $dr)
        <div class="col-lg col-12">
            @php
            $modalldIDenahRumah = 'modal_' . md5($dr->denah_rumah);
            @endphp
            <div class="image-hover-container mb-3" style="height: 20rem; width:15rem; cursor: pointer; "
                data-bs-target="#{{$modalldIDenahRumah}}" data-bs-toggle="modal">

                <img src="{{ asset($dr->denah_rumah) }}" class="d-block mb-3 " style="height: 20rem; width:15rem; object-fit: cover;"
                    alt="..." alt="KTP Istri">

                <div class="image-hover-overlay">Lihat</div>
            </div>
            <!-- Modal (Popup gambar besar) -->
            <div class="modal fade" id="{{ $modalldIDenahRumah }}" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset($dr->denah_rumah) }}" class="img-fluid" alt="KTP Suami">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
{{-- Editan col-12 --}}
{{-- flex: 0 0 100%; --}}
{{-- Catatan Tinggi ukuran from-file --}}
{{-- height:calc(1.5em + .75rem + 2px); --}}
@endsection
