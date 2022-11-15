@extends('layouts/main2')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">{{ $title }}</h2>

<div class="row align-items-start mt-3">
    <form id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-2/edit" method="POST"
        enctype="multipart/form-data">
            @csrf
            @if ($pendaftaran != null)
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim"
                    value="{{ auth()->user()->mahasiswa->nim }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ auth()->user()->mahasiswa->name }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="peminatan" class="form-label">Peminatan</label>
                <select type="text" class="form-select" name="peminatan" id="peminatan">
                    @if ($pendaftaran->peminatan == 'AIG')
                    <option disabled>Pilih...</option>
                    <option selected>AIG</option>
                    <option>DSE</option>
                    @else
                    <option disabled>Pilih...</option>
                    <option>AIG</option>
                    <option selected>DSE</option>
                    @endif
                </select>
            </div>

            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select type="text" class="form-select" name="angkatan" id="angkatan">
                    @if ($pendaftaran->angkatan == '2017')
                    <option disabled>Pilih...</option>
                    <option selected>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    @elseif ($pendaftaran->angkatan == '2018')
                    <option disabled>Pilih...</option>
                    <option>2017</option>
                    <option selected>2018</option>
                    <option>2019</option>
                    @else
                    <option disabled>Pilih...</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option selected>2019</option>
                    @endif
                </select>
            </div>



            @else
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim"
                    value="{{ auth()->user()->mahasiswa->nim }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ auth()->user()->mahasiswa->name }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="peminatan" class="form-label">Peminatan</label>
                <select type="text" class="form-select" name="peminatan" id="peminatan">
                    <option disabled selected>Pilih...</option>
                    <option>AIG</option>
                    <option>DSE</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select type="text" class="form-select" name="angkatan" id="angkatan">
                    <option disabled selected>Pilih...</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                </select>
            </div>
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
                <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Update</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
</div>
@endsection