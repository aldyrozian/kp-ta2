@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran{{$seminar}}Tugas Akhir 1</h2>

<div class="row align-items-start mt-3">
    @if ($seminar == '')
    <form class="" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-1" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1" method="POST"
            enctype="multipart/form-data">
            @endif
            @csrf
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
                    @if (auth()->user()->pendaftaran->peminatan == "AIG")
                    <option disabled>Pilih...</option>
                    <option selected>AIG</option>
                    <option>DSE</option>
                    @elseif (auth()->user()->pendaftaran->peminatan == "DSE")
                    <option disabled>Pilih...</option>
                    <option>AIG</option>
                    <option selected>DSE</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select type="text" class="form-select" name="angkatan" id="angkatan">
                    @if (auth()->user()->pendaftaran->angkatan == "2016")
                    <option disabled>Pilih...</option>
                    <option selected>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    @elseif (auth()->user()->pendaftaran->angkatan == "2017")
                    <option disabled>Pilih...</option>
                    <option>2016</option>
                    <option selected>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    @elseif (auth()->user()->pendaftaran->angkatan == "2018")
                    <option disabled>Pilih...</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option selected>2018</option>
                    <option>2019</option>
                    @elseif (auth()->user()->pendaftaran->angkatan == "2019")
                    <option disabled>Pilih...</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option selected>2019</option>
                    @endif
                </select>
            </div>



            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah SKS yang bernilai D (Teori)</label>
                <input type="number" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d" placeholder="0"
                    value="{{ auth()->user()->pendaftaran->jumlah_teori_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah SKS yang bernilai D (Prak)</label>
                <input type="number" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d" placeholder="0"
                    value="{{ auth()->user()->pendaftaran->jumlah_prak_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah SKS yang bernilai E</label>
                <input type="number" class="form-control" name="jumlah_e" id="jumlah_e" placeholder="0"
                    value="{{ auth()->user()->pendaftaran->jumlah_e }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS (sudah & sedang diambil)</label>
                <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks" placeholder="138"
                    value="{{ auth()->user()->pendaftaran->jumlah_sks }}">
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" step="0.01" class="form-control" name="ipk" id="ipk" placeholder="3.10"
                    value="{{ auth()->user()->pendaftaran->ipk }}">
            </div>



            <div class="col-md-12">
                <label for="judul_ta1" class="form-label">Judul Penelitian</label>
                <input type="text" class="form-control error" name="judul_ta1" id="judul_ta1"
                    placeholder="Judul Penelitian">
            </div>
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

            <div class="my-4">

            </div>
            @if ($seminar == '')
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Pembimbing 1</h6>
                <label for="alt1_p1" class="form-label error">Alternatif 1</label>
                <select type="text" class="form-select" name="alt1_p1" id="alt1_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt2_p1" class="form-label mt-2">Alternatif 2</label>
                <select type="text" class="form-select" name="alt2_p1" id="alt2_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt3_p1" class="form-label mt-2 ">Alternatif 3</label>
                <select type="text" class="form-select" name="alt3_p1" id="alt3_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt4_p1" class="form-label mt-2">Alternatif 4</label>
                <select type="text" class="form-select" name="alt4_p1" id="alt4_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Pembimbing 2</h6>
                <label for="alt1_p2" class="form-label">Alternatif 1</label>
                <select type="text" class="form-select" name="alt1_p2" id="alt1_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt2_p2" class="form-label mt-2">Alternatif 2</label>
                <select type="text" class="form-select" name="alt2_p2" id="alt2_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt3_p2" class="form-label mt-2">Alternatif 3</label>
                <select type="text" class="form-select" name="alt3_p2" id="alt3_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt4_p2" class="form-label mt-2">Alternatif 4</label>
                <select type="text" class="form-select" name="alt4_p2" id="alt4_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="mt-4">

            </div>
            <div class="col-12 m-2">
                <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
    <script type="text/javascript" src="/js/validasiPembimbing.js"></script>
    <script type="text/javascript" src="/js/validasijabfun.js"></script>
</div>
@endsection