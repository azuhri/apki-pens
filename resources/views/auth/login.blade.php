@extends('layouts.app')

@section('css')
    <style>
        @keyframes zoomAnimation {
            0% {
                background-size: 350%;
                /* Zoom in to 120% */
            }

            50% {
                background-size: 200%;
                /* Zoom out to 100% */
            }

            100% {
                background-size: 350%;
                /* Zoom in again */
            }
        }

        #cover {
            animation: zoomAnimation 8s infinite alternate ease-in-out;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Masuk</h4>
                                    <p class="mb-0">Masuk untuk membuat laporan ke APKI PENS</p>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div style="display: none"
                                            class="alert text-center alert-danger font-weight-bold text-white"
                                            role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="user_identity"
                                                placeholder="Masukan email atau No HP" class="form-control form-control-lg"
                                                value="{{ old('user_identity') }}" aria-label="user_identity">
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" placeholder="Masukan password"
                                                class="form-control form-control-lg" aria-label="Password" value="">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Tetap masuk</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        Forgot you password? Reset your password
                                        <a href="{{ route('reset-password') }}"
                                            class="text-primary text-gradient font-weight-bold">here</a>
                                    </p>
                                </div> --}}
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Anda belum punya akun?
                                        <a href="{{ route('register') }}"
                                            class="text-primary text-gradient font-weight-bold">Daftar</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div id="cover" class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('{{ asset('img/view-pens.jpeg') }}');
              background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"PENS JOSS!"</h4>
                                <p class="text-white position-relative">Jujur, Orisinil, Semangat, Santun.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('js')
    <script>
        setTimeout(() => {
            $(".alert").show(200);
            setTimeout(() => {
                $(".alert").hide(200);
            }, 3000);
        }, 200);
    </script>
@endpush
