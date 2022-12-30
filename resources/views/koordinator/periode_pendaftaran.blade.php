@extends('layouts/main')
@section('container')
<h2 class="text-center">{{ $title }}</h2>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row align-items-start mt-3">
    <form id="formperiode" action="/koordinator/periode-pendaftaran" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="col-md-6">
                        <label for="keterangan" class="form-label">Keterangan Periode</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" value=""  >
            </div>
            <div class=" col-md-6 ">
                <div class=" input-group">
                    <label for="tglmulai" class="input-group mb-2">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tglmulai" name="tglmulai">
                </div>
            </div>
            <div class=" col-md-6 ">
                <div class=" input-group">
                    <label for="tglberakhir" class="input-group mb-2">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tglberakhir" name="tglberakhir">
                </div>
            </div>

            <div class="col-12 mt-4">
                <a class="btn " href="/koordinator/list-pendaftaran-ta-2" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
            </div>
            <div style=" height: 100px;">
            </div>
    </form>
    <table>
        <thead>
            <tr>
                <th>Keterangan Periode</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Connect to the database
        $db = new PDO('mysql:host=localhost;dbname=si_ta2', 'root', '');
    
        // Query the database for the periods
        $query = "SELECT * FROM periode_pendaftarans";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $periods = $stmt->fetchAll();
    
        // Iterate through the periods
        foreach ($periods as $period) {
          echo "<tr>";
          echo "<td>" . $period['keterangan'] . "</td>";
          echo "<td>" . $period['tanggal_mulai'] . "</td>";
          echo "<td>" . $period['tanggal_selesai'] . "</td>";
          echo "<td>" . "<a href='/koordinator/periode-pendaftaran/delete/" . $period['id'] . "'>Delete</a>" . "</td>";
          echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

    @endsection