@extends('layouts.app')

@section('content')
    @include('layouts.navbars.guest.navbar')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('img/gedung-pens.jpeg') }}'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang APKI PENS!</h1>
                        <p class="text-lead text-white">Silahkan melakukan pendaftaran untuk membuat laporan kerusakan pada
                            fasilatas di PENS</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-6 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="text-center pt-4">
                            <h5>APKI PENS</h5>
                            <img class="w-20 mt-2 btn btn-transparent shadow" src="{{ asset('img/logo-pens.jpeg') }}"
                                alt="">
                        </div>
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert text-center alert-danger font-weight-bold text-white" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan nama Anda" aria-label="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <select name="type_user" class="form-control" id="type_user">
                                        <option value="">PILIH STATUS</option>
                                        <option {{ old('type_user') == 'MAHASISWA' ? 'selected' : '' }} value="MAHASISWA">
                                            MAHASISWA</option>
                                        <option {{ old('type_user') == 'DOSEN' ? 'selected' : '' }} value="DOSEN">DOSEN
                                        </option>
                                        <option {{ old('type_user') == 'KARYAWAN' ? 'selected' : '' }} value="KARYAWAN">
                                            KARYAWAN</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Masukan email Anda" aria-label="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="phonenumber" class="form-control"
                                        placeholder="Masukan No WA Anda" aria-label="phonenumber"
                                        value="{{ old('phonenumber') }}">
                                    @error('phonenumber')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukan password Anda" aria-label="Password">
                                    @error('password')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="confirm_password" class="form-control"
                                        placeholder="Masukan konfirmasi password Anda" aria-label="Password">
                                    @error('confirm_password')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Daftar</button>
                                </div>
                                <p class="text-sm mt-3 mb-0 text-center">Anda sudah punya akun? <a
                                        href="{{ route('login') }}" class="text-dark font-weight-bolder">Masuk</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
