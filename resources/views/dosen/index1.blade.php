@extends('layouts/main')
@section('container')
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Dashboard Dosen</h1>

<div>
    <div class="d-flex justify-content-center">
        <a class="btn my-3
        " href="/dosen/pembimbing-1/form-bimbingan" role="button"
            style="background-color:#ff8c1a; width: 20rem;">Bimbingan
            Mahasiswa</a>
    </div>
</div>


<div class="d-flex justify-content-center">
    
    <a class="btn my-3 
    " href="/dosen/downloadJadwalSeminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Jadwal Seminar
        TA 2</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/reviewer-1/penilaian-seminar" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Berkas Penelitian Mahasiswa</a>
</div>
@endsection