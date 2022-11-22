<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <ul class="nav flex-column">
            <li class="nav-item">
    <a class="btn my-3" href="/mahasiswa/pendaftaran-ta-2-step1" role="button"
        style="background-color:#ff8c1a; width: 14rem;">Pendaftaran Administrasi</a>
            </li>
            <li class="nav-item">
                <a class="btn my-3 @if($formBimbingan == null) disabled @endif
" href="/mahasiswa/form-bimbingan" role="button" style="background-color:#ff8c1a; width: 14rem;">Formulir Bimbingan TA2</a>
            </li> 
            <li class="nav-item">
    <a class="btn my-3
    @if($formBimbingan == null)
    disabled
    @endif
    " href="/mahasiswa/pendaftaran-seminar-ta-2" role="button"
        style="background-color:#ff8c1a; width: 14rem;">Pendaftaran
        Seminar TA 2</a>
            </li>            
            <li class="nav-item">
    <a class="btn my-3
    @if(auth()->user()->formbimbingan == null)
    disabled
    @endif
    " href="/mahasiswa/revisi-seminar" role="button" style="background-color:#ff8c1a; width: 14rem;">Revisi Seminar</a>
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