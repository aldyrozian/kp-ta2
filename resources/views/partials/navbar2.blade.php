<header class="navbar navbar-expand-lg navbar-dark navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 py-3 px-3 fs-6 ml-3" href="">Sistem Tugas Akhir 2</a>
    <button class="navbar-toggler position-absolute top-50 end-0 translate-middle-y d-md-none collapsed border-0" type="button"
        data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

                @if (auth()->user())
                @if (isset(auth()->user()->mahasiswa))
                
                @include('partials.sidebar2')
                
                @elseif (isset(auth()->user()->dosen))
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->dosen->name }} ({{ $role }})</small>
                    </div>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">({{ $role }})</small>
                    </div>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                    </form>
                </li>
                @endif
                @endif
