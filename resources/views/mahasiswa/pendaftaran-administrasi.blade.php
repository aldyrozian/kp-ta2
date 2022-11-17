@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran {{$seminar}} Tugas Akhir 2</h2>

<div class="row align-items-start mt-3">
    @if ($seminar == '')
    <form class="" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-2-step1" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1-step1" method="POST">
            @endif
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

            <div class=" col-md-6 ">
                <div class=" input-group">
                    <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
                    <div class="input-group-text">+62</div>
                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                        placeholder="898******">
                </div>
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
            <div class="col-md-6">
                            <label for="judul_ta1" class="form-label">Judul Penelitian</label>
                            <input type="text" class="form-control error" name="judul_ta1" id="judul_ta1" placeholder="Judul Penelitian">
                        </div>

            @endif
            {{-- STEP 4 --}}
            <div class="col-md-6 ">
            <label for="p1" class="form-label error">Nama Pembimbing 1</label>
                        <select type="text" class="form-select" name="p1" id="p1">
                            <option disabled selected>Pilih.. </option>
                            @foreach ($list_p1 as $p1)
                            <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                            @endforeach
                        </select>
            </div>
                        
                        
                        
                        <div class="col-md-6 ">
                        <label for="p2" class="form-label">Nama Pembimbing 2</label>
                        <select type="text" class="form-select" name="p2" id="p2">
                            <option disabled selected>Pilih.. </option>
                            @foreach ($list_p2 as $p2)
                            <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                            @endforeach
                        </select>
                        </div>

            {{-- STEP2 --}}
            <div class="row align-items-start mt-3">
                @if ($seminar == '')
                <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-2-step1" method="POST"
                    enctype="multipart/form-data">
                    @else
                    <form class="row g-3" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1-step1"
                        method="POST">
                        @endif
                        @csrf
            </div>
            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah Nilai D (Teori)</label>
                <input type="number" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d" placeholder="0"
                   >
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah Nilai D (Prak)</label>
                <input type="number" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d" placeholder="0"
                  >
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah Nilai E</label>
                <input type="number" class="form-control" name="jumlah_e" id="jumlah_e" placeholder="0"
                  >
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks" placeholder="138"
                 >
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" step="0.01" class="form-control" name="ipk" id="ipk" placeholder="3.10"
                 >
            </div>



            {{-- STEP 3 --}}

                    <div class="row mt-4">
                        <div class="col-md-5">
                            <label for="berkas_ta1" class="form-label">Berkas Penelitian</label>
                            <input class="form-control" type="file" id="berkas_ta1" name="berkas_ta1">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <label for="tagihan_uang" class="form-label">Tagihan Uang Kuliah</label>
                            <input class="form-control" type="file" id="tagihan_uang" name="tagihan_uang">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <label for="lunas_pembayaran" class="form-label">Bukti Lunas Pembayaran</label>
                            <input class="form-control" type="file" id="lunas_pembayaran" name="lunas_pembayaran">
                        </div>
                    </div>
                    <div class="row mt-4">
                                    <div class="col-md-5">
                                        <label for="khs" class="form-label">Kartu Hasil Studi</label>
                                        <input class="form-control" type="file" id="khs" name="khs">
                                    </div>
                                </div>

            <div class="col-12 mt-4">

            <a class="btn " href="/mahasiswa" role="button"
                style="width: 5rem;background-color:#ff8c1a;">Back</a>
            <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>

            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
</div>
<script type="text/javascript" src="/js/validasiPembimbing.js"></script>
<script type="text/javascript" src="/js/validasijabfun.js"></script>

@endsection