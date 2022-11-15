@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Seleksi Seminar</h2>

<div class="row align-items-start mt-3">
    <div class="">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $pendaftaran->mahasiswa->nim }}">
        </div>

        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $pendaftaran->mahasiswa->name }}">
        </div>
        <div class="col-md-6">
            <label for="peminatan" class="form-label">Peminatan</label>
            <input type="text" class="form-control" name="peminatan" id="peminatan" readonly
                value="{{ $pendaftaran->peminatan }}">
        </div>

        <div class="col-md-6">
            <label for="angkatan" class="form-label">Angkatan</label>
            <input type="number" class="form-control" name="angkatan" id="angkatan" readonly
                value="{{ $pendaftaran->angkatan }}">
        </div>

        <div class="col-md-3">
            <label for="jumlah_teori_d" class="form-label">Jumlah SKS yang bernilai D (Teori)</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_teori_d > 6 ) ? 'is-invalid' : ''; }}"
                name="jumlah_teori_d" id="jumlah_teori_d" readonly value="{{ $pendaftaran->jumlah_teori_d }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_prak_d" class="form-label">Jumlah SKS yang bernilai D (Prak)</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_prak_d != 0 ) ? 'is-invalid' : ''; }}"
                name="jumlah_prak_d" id="jumlah_prak_d" readonly value="{{ $pendaftaran->jumlah_prak_d }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_e" class="form-label">Jumlah SKS yang bernilai E</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_e != 0 ) ? 'is-invalid' : ''; }}"
                name="jumlah_e" id="jumlah_e" readonly value="{{ $pendaftaran->jumlah_e }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_sks < 130 ) ? 'is-invalid' : ''; }}"
                name="jumlah_sks" id="jumlah_sks" readonly value="{{ $pendaftaran->jumlah_sks }}">
        </div>
        <div class="col-md-3">
            <label for="ipk" class="form-label">IPK</label>
            <input type="text" class="form-control {{($pendaftaran->ipk < 2.8 ) ? 'is-invalid' : ''; }}" name="ipk"
                id="ipk" readonly value="{{ $pendaftaran->ipk }}">
        </div>
        <div class="my-4">
        </div>
        @if ($pendaftaran->judul_ta1 != null)
        <div class="col-md-12">
            <label for="judul_ta1" class="form-label">Judul Proposal</label>
            <input type="text" class="form-control" name="judul_ta1" id="judul_ta1" readonly
                value="{{ $pendaftaran->judul_ta1 }}">
        </div>
        @endif
        @if ($pendaftaran->berkas_ta1 != null)
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="berkas_ta1" class="form-label col-sm-5">Berkas Proposal</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/downloadBerkasTa1">Download
                    <i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        @endif
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="tagihan_uang" class="form-label col-sm-5">Tagihan Uang Kuliah</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/downloadTagihanUang">Download
                    <i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="lunas_pembayaran" class="form-label col-sm-5">Bukti Lunas Pembayaran</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/downloadLunasPembayaran">Download
                    <i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="khs" class="form-label col-sm-5">KHS</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/downloadKhs">Download <i
                        class="fa-solid fa-download"></i></a>
            </div>
        </div>

        <div class="my-4">

        </div>

        <div class="mt-4">
        </div>

        <h5 style="text-align:center;">Siswa di atas dinyatakan:</h5>
        <div class="d-flex justify-content-center mt-3 ">
            @if ($status == null)
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2 "
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>

                <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">

                </form>
                <a class="btn btn-dark"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Lolos")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2  disabled"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>

                <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">

                </form>
                <a class="btn btn-dark"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Lolos Bersyarat")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>

                <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">

                </form>
                <a class="btn btn-dark"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Pending")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>

                <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">

                </form>
                <a class="btn btn-dark"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Tidak Lolos")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>

                <form method="post" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">

                </form>
                <a class="btn btn-dark disabled"
                    href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @endif
        </div>
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator/list-pendaftaran-seminar-ta-1" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
    </div>
    <div style=" height: 100px;">
    </div>
</div>
@endsection