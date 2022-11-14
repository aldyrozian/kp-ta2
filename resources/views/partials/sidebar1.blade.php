<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Pendaftaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Bimbingan
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Pendaftaran Seminar
                </a>
            </li>            
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Revisi Seminar
                </a>
            </li> 
                <li class="nav-item">
                    <a class="nav-link">
                        <span style=" color:#000000">{{ auth()->user()->mahasiswa->name }} ({{ $role }})</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="w-full mt-4 d-block bg-transparent border-0 fw-bold text-danger px-3" href="#">Logout</button>
                    </form>
                </li>
        </ul>
 </nav>