<nav class="navbar navbar-expand-lg navbar-dark navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="background-color: #595959;">
    <div class="container">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 py-3 px-3 fs-6 ml-3" href="">Sistem Tugas Akhir 2</a>
    <button class="navbar-toggler position-absolute top-50 end-0 translate-middle-y d-md-none collapsed border-0" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ">
                @if (auth()->user())
                @if (isset(auth()->user()->mahasiswa))
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->mahasiswa->name }} ({{ $role }})</small>
                    </div>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                    </form>
                </li>
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
                @elseif (isset(auth()->user()->admin))
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->admin->name }} ({{ $role }})</small>
                    </div>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                    </form>
                </li>
                @elseif (isset(auth()->user()->koordinator))
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->koordinator->name }} ({{ $role }})</small>
                    </div>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                    </form>
                </li>
                @elseif (isset(auth()->user()->tatausaha))
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->tatausaha->name }} ({{ $role }})</small>
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
            </ul>
        </div>
    </div>
</nav>