@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Status Pendaftaran TA 2</h2>
<div class="row">
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-50 mt-5 " style="background-color:#D9D9D9;">
            <div class=" card-body my-5">
                @if ($status == 'Lolos')
                <h3 class="card-title" style="text-align: center;">Lolos Seleksi Administrasi</h3>
                @if ($status != 'Lolos' || auth()->user()->pendaftaran->pembimbing1 == null ||
                auth()->user()->pendaftaran->pembimbing2 == null)
                <p style="text-align:center ;">Dosen Pembimbing anda akan segera ditampilkan</p>
                @endif
                @elseif ($status == 'Pending')
                <h3 class="card-title" style="text-align: center;">Pending</h3>
                <p style="text-align:center ;">Silakan segera hubungi Koordinator TA 2!</p>
                @elseif ($status == 'Lolos Bersyarat')
                <h3 class="card-title" style="text-align: center;">Lolos Bersyarat</h3>
                @if ($status != 'Lolos Bersyarat' || auth()->user()->pendaftaran->pembimbing1 == null ||
                auth()->user()->pendaftaran->pembimbing2 == null)
                <p style="text-align:center ;">Dosen Pembimbing anda akan segera ditampilkan<br><b>Perhatikan
                        syaratnya!</b>
                </p>
                @endif
                @elseif ($status == 'Tidak Lolos')
                <h3 class="card-title" style="text-align: center;">Tidak Lolos</h3>
                @if (auth()->user()->pendaftaran->status == 'Lolos Bersyarat')
                <h2 class="text-center mb-5">Syarat Maju Tugas Akhir 2</h2>
                @elseif (auth()->user()->pendaftaran->status == 'Tidak Lolos')
                @endif
                                @if (auth()->user()->pendaftaran->status == 'Lolos Bersyarat')
                                <h5><b>Saat pendaftaran seminar, anda diharuskan untuk :</b></h5>
                                {!! $syarat !!}
                                @elseif (auth()->user()->pendaftaran->status == 'Tidak Lolos')
                                {!! $syarat !!}
                                @endif
                @else
                <h3 class="card-title" style="text-align: center;">Seleksi Administrasi</h3>
                @endif
            </div>
        </div>
    </div>
    @if ($status == 'Lolos' || $status == 'Lolos Bersyarat' &&
    auth()->user()->pendaftaran->p1 == null &&
    auth()->user()->pendaftaran->p2 == null)
    @if(auth()->user()->pendaftaran->p1 != null & auth()->user()->pendaftaran->p2 != null)
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-50 border-0" style="background-color:#f5f5f5;">
            <div class="form-group row">
                <div class="row">
                    <div class="col-4">
                        <label class="col-sm-12 col-form-label ps-3">Pembimbing 1</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" value="{{ auth()->user()->pendaftaran->pembimbing1->dosen->name }}"
                            disabled>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <label class="col-sm-12 col-form-label ps-3">Pembimbing 2</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" value="{{ auth()->user()->pendaftaran->pembimbing2->dosen->name }}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>

@endif
</div>
<div class="d-flex justify-content-center mt-5">
    <a href="/mahasiswa" class="btn" style="background-color:#ff8c1a;">Kembali</a>
    @if ($status == 'Lolos Bersyarat')
    {{-- <a href="/mahasiswa/pendaftaran-ta-2/status/syarat" class="btn mx-2" style="background-color:#ff8c1a;">Syarat</a> --}}
    @elseif ($status == 'Tidak Lolos')
    {{-- <a href="/mahasiswa/pendaftaran-ta-2/status/alasan-tidak-lolos" class="btn mx-2"
        style="background-color:#ff8c1a;">Alasan</a> --}}
        <a href="/mahasiswa/pendaftaran-ta-2/edit" class="btn mx-2"
            style="background-color:#ff8c1a;">Update</a>
    @endif
</div>
@endsection