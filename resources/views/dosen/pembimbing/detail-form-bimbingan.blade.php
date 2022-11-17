@extends('layouts/main')
@section('container')
@if($bimbingan_ke == null)
<h2 class="text-center mb-5">Form Bimbingan</h2>
@else
<h2 class="text-center mb-5">Form Bimbingan {{$bimbingan_ke}}</h2>
@endif
<div class="row">
    <div class="col-4">
        <label for="tanggal_waktu" class="form-label">Tanggal & Waktu</label>
        <input type="text" class="form-control" value="{{ $bimbingan->waktu }}">
    </div>
    <div class="col-8">
        <label for="pokok_materi" class="form-label">Pokok Materi</label>
        <input type="text" class="form-control" value="{{ $bimbingan->pokok_materi }}">
    </div>
</div>
<div class="row my-3">
    <div class="col-4">
        <label for="is_p1" class="form-label">Pembimbing</label>
        @if($role == 'Pembimbing 1')
        <input type="text" class="form-control" value="{{ $bimbingan->bimbingan->pembimbing1->dosen->name }}">
        @elseif ($role == 'Pembimbing 2')
        <input type="text" class="form-control" value="{{ $bimbingan->bimbingan->pembimbing2->dosen->name }}">
        @endif
    </div>
</div>
<div class="row my-3">
<div class="row my-3">

    <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
        href="/dosen/pembimbing-1/form-bimbingan/{{$mahasiswa_id}}/{{ $bimbingan_ke }}/downloadbukti">Download Bukti Bimbingan
        <i class="fa-solid fa-download"></i>
    </a>
</div>
<div class="row my-3">

    <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
        href="/dosen/pembimbing-1/form-bimbingan/{{$mahasiswa_id}}/{{ $bimbingan_ke }}/downloadqrcode">Download Bukti QR
        <i class="fa-solid fa-download"></i>
    </a>
</div>
</div>

<div class="col-12 mt-5">
    @if($role == 'Pembimbing 1')
    <a class="btn " href="/dosen/pembimbing-1/form-bimbingan/{{$mahasiswa_id}}" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @elseif ($role == 'Pembimbing 2')
    <a class="btn " href="/dosen/pembimbing-2/form-bimbingan/{{$mahasiswa_id}}" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @endif
</div>
</form>
@endsection