@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran{{$seminar}}Tugas Akhir 2</h2>

<div class="row align-items-start mt-3">
    @if ($seminar == '')
    <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-2-step2" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="row g-3" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1-step2" method="POST">
            @endif
            @csrf
            </div>
            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah Nilai D (Teori)</label>
                <input type="number" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d" placeholder="0"
                    value="{{ $pendaftaran->jumlah_teori_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah Nilai D (Prak)</label>
                <input type="number" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d" placeholder="0"
                    value="{{ $pendaftaran->jumlah_prak_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah Nilai E</label>
                <input type="number" class="form-control" name="jumlah_e" id="jumlah_e" placeholder="0"
                    value="{{ $pendaftaran->jumlah_e }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks" placeholder="138"
                    value="{{ $pendaftaran->jumlah_sks }}">
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" step="0.01" class="form-control" name="ipk" id="ipk" placeholder="3.10"
                    value="{{ $pendaftaran->ipk }}">
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="khs" class="form-label">Kartu Hasil Studi</label>
                    <input class="form-control" type="file" id="khs" name="khs">
                </div>
            </div>

            <div class="col-12 mt-4">
                <a class="btn" href="/mahasiswa/pendaftaran-ta-2-step1" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Next</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
    <script type="text/javascript" src="/js/validasiPembimbing.js"></script>
    <script type="text/javascript" src="/js/validasijabfun.js"></script>
</div>
@endsection