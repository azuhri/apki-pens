<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand d-flex justify-content-center flex-column align-items-center m-0" href="#" target="_blank">
            <img src="{{asset('img/logo-pens.jpeg')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold mt-2">APKI PENS</span>
        </a>
    </div>
    <hr class="horizontal dark mt-4">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'dashboard') == true ? 'active' : '' }}"
                    href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
            </li>
            @if (Auth::user()->type_role)
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'reports') == true ? 'active' : '' }}"
                        href="{{ route("admin.report.index") }}">
                        <div
                            class="icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Daftar Laporan Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'location') == true ? 'active' : '' }}"
                        href="{{ route("admin.location.index") }}">
                        <div
                            class="text-primary icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <span class="nav-link-text ms-1">Daftar Lokasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'map') == true ? 'active' : '' }}"
                        href="{{ route('admin.map.index') }}">
                        <div
                        class="text-primary icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                    </div>
                    <span class="nav-link-text ms-1">Lihat Denah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'management') == true ? 'active' : '' }}"
                    href="{{ route("admin.management.index") }}">
                    <div
                        class="text-primary icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <span class="nav-link-text ms-1">Admin Manajemen</span>
                </a>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'form-report/create') == true ? 'active' : '' }}"
                        href="{{ route('user.form-report.create') }}">
                        <div
                            class="icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-fat-add text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Buat Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'my-report') == true ? 'active' : '' }}"
                        href="{{ route('user.my-report.index') }}">
                        <div
                            class="icon icon-shape icon-md border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Saya</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
