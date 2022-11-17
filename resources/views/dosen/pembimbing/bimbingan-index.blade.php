@extends('layouts/main')
@section('container')
<h2 class="text-center">{{ $title }}</h2>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex mt-4">
    <div class="me-auto p-2">
        @if ($role == 'Pembimbing 1')
        <form action="/dosen/pembimbing-1/form-bimbingan">
            @elseif ($role == 'Pembimbing 2')
            <form action="/dosen/pembimbing-2/form-bimbingan">
                @endif
                <div class="input-group" style=" width: 100%;">
                    <input type=" text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <div class=" input-group-append">
                        <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" "><i class=" fa-solid
                            fa-magnifying-glass"></i> Search</button>
                    </div>
                </div>
            </form>
    </div>
    <div class=" p-2">

    </div>
    <div class="p-2">

    </div>
</div>

<table class="table table-hover table-sm mt-3">
    <thead>
        <tr>
            <th scope="col">NO
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">NIM
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Nama
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Peminatan
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
                        <th scope="col">Sebagai
                <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                </span>
            </th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($mahasiswas as $key=> $mahasiswa)
    <?php
    $p1_id = $mahasiswa->p1_id;
    $p2_id = $mahasiswa->p2_id;
    if (auth()->user()->pembimbing1->id == $p1_id) {
        $isp1 = true;
    }else if (auth()->user()->pembimbing2->id == $p2_id) {
        $isp1 = false;
    }
    
    ?>
    <tbody>
        <tr>
            <th scope="row">{{ $mahasiswas->firstItem()+ $key}}</th>
            <td>{{ $mahasiswa->mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->mahasiswa->name }}</td>
            <td>{{ $mahasiswa->peminatan }}</td>
            @if ($isp1 == true) 
            <td> Pembimbing 1 </td>
            @else 
            <td> Pembimbing 2 </td>
            @endif
            <td>
                @if($role == 'Pembimbing 1')
                <a class="btn btn-warning" href="/dosen/pembimbing-1/form-bimbingan/{{ $mahasiswa->mahasiswa->id  }}"><i
                        class="fa-solid fa-align-left"></i> Bimbingan</a>
                @else
                <a class="btn btn-warning" href="/dosen/pembimbing-2/form-bimbingan/{{ $mahasiswa->mahasiswa->id  }}"><i
                        class="fa-solid fa-align-left"></i> Bimbingan</a>
                @endif
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

<div class="d-flex justify-content-between">
    <div>
        <a class="btn" href="/dosen" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
    </div>
    <div>
        Showing
        {{ $mahasiswas->firstItem() }}
        to
        {{ $mahasiswas->lastItem() }}
        of
        {{ $mahasiswas->total() }}
        enteries
    </div>
    <div>
        {{ $mahasiswas->links() }}
    </div>
    <!-- <div class="position-fixed"
                    style="position:absolute; bottom: 2rem; left: 50%; transform: translate(-50%, -10%);">

                </div> -->
</div>
</div>


@endsection