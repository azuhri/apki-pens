<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse d-flex justify-content-end mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <div class="dropdown dropcenter">
                            <a class="d-flex align-items-center justify-content-center" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex justify-content-center align-items-center mx-2">
                                    <p style="font-size: 15px" class="m-0 mx-2 text-white font-weight-bold">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <div>
                                        <small class="text-white p-1 px-2 rounded"
                                            style="background-color: #fb9940; font-size:10px; font-weight:bold">
                                            {{ Auth::user()->type_user }}
                                        </small>
                                    </div>
                                </div>
                                {{-- <img style="width: 45px" class="rounded-circle border-2 border-black"
                                    src="https://ui-avatars.com/api/?background=ffffff&color=fb6340&name={{ Auth::user()->name }}"
                                    alt=""> --}}
                                <img style="width: 45px" class="rounded-circle border-2 border-black"
                                    src="https://ui-avatars.com/api/?background={{Auth::user()->color_hex ?? "random"}}&color=ffffff&name={{ Auth::user()->name }}"
                                    alt="">
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-item" href="#">
                                        <svg class="mr-4" viewBox="0 0 24 24" width="18" height="18"
                                            stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" class="css-i6dzq1">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        Keluar</a></li>
                            </ul>
                        </div>
                    </form>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
