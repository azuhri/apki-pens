@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Form Laporan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Form Laporan</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionExample">
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($maps as $map)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button
                                            class="text-uppercase rounded-2 border-2 border-1 accordion-button w-100 btn text-secondary"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#map_{{ $map->id }}" aria-expanded="true"
                                            aria-controls="map_{{ $map->id }}">
                                            Lihat Denah &nbsp;<span class="text-primary">{{ $map->name }}</span>
                                        </button>
                                    </h2>
                                    <div id="map_{{ $map->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <a target="_blank" href="{{ url('/') . '/' . $map->path }}" class="w-100">
                                                <img class="w-100" src="{{ asset($map->path) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul Laporan</label>
                                    <input class="form-control" placeholder="Masukan judul laporan kerusakan"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Lokasi Kerusakan</label>
                                    <select class="form-control my-4" name="location" id="location">
                                        @foreach ($locations as $loc)
                                            <option value="{{ $loc->id }}">{{ $loc->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                                    <textarea class="form-control" placeholder="Deskripsikan bentuk kerusakan yang terjadi" id="exampleFormControlTextarea1"
                                        rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Foto
                                        Kerusakan</label>
                                    <div class="d-flex">
                                        <input type="file" id="doc1" name="documents[]" class="dropify"
                                            data-max-file-size="1M" />
                                        <input type="file" id="doc2" name="documents[]" class="dropify"
                                            data-max-file-size="1M" />
                                        <input type="file" id="doc3" name="documents[]" class="dropify"
                                            data-max-file-size="1M" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn d-flex align-items-center btn-primary btn-md float-right">
                            {{-- <svg style="margin-right: 4px"  viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> --}}
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}" />
    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
        content: url('data:image/svg+xml; base64, PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KDTwhLS0gVXBsb2FkZWQgdG86IFNWRyBSZXBvLCB3d3cuc3ZncmVwby5jb20sIFRyYW5zZm9ybWVkIGJ5OiBTVkcgUmVwbyBNaXhlciBUb29scyAtLT4KPHN2ZyB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4IiB2aWV3Qm94PSIwIDAgMTAyNCAxMDI0IiBjbGFzcz0iaWNvbiIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9IiMwMDAwMDAiPgoNPGcgaWQ9IlNWR1JlcG9fYmdDYXJyaWVyIiBzdHJva2Utd2lkdGg9IjAiLz4KDTxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgoNPGcgaWQ9IlNWR1JlcG9faWNvbkNhcnJpZXIiPgoNPHBhdGggZD0iTTUxMS4yNjA3NTUgNTE0LjAzNzUzMm0tNDMyLjI5MjU3NSAwYTQzMi4yOTI1NzUgNDMyLjI5MjU3NSAwIDEgMCA4NjQuNTg1MTUgMCA0MzIuMjkyNTc1IDQzMi4yOTI1NzUgMCAxIDAtODY0LjU4NTE1IDBaIiBmaWxsPSIjRENFNUY3Ii8+Cg08cGF0aCBkPSJNNTExLjI1ODcwNyA5NjAuMDIxNTAyYy0yNDUuOTE0NzMgMC00NDUuOTgyOTQ2LTIwMC4wNjEwNDktNDQ1Ljk4Mjk0Ni00NDUuOTgyOTQ2IDAtMjQ1LjkxNDczIDIwMC4wNjcxOTItNDQ1Ljk4Mjk0NiA0NDUuOTgyOTQ2LTQ0NS45ODI5NDZzNDQ1Ljk4Mjk0NiAyMDAuMDY3MTkyIDQ0NS45ODI5NDYgNDQ1Ljk4Mjk0NmMwIDI0NS45MjE4OTctMjAwLjA2NzE5MiA0NDUuOTgyOTQ2LTQ0NS45ODI5NDYgNDQ1Ljk4Mjk0NnogbTAtODY0LjU4NjE3NWMtMjMwLjgyMTYzNiAwLTQxOC42MDQyNTIgMTg3Ljc4MTU5Mi00MTguNjA0MjUyIDQxOC42MDMyMjkgMCAyMzAuODE1NDkzIDE4Ny43ODE1OTIgNDE4LjYwMzIyOCA0MTguNjA0MjUyIDQxOC42MDMyMjhzNDE4LjYwMzIyOC0xODcuNzg4NzYgNDE4LjYwMzIyOC00MTguNjAzMjI4YzAuMDAxMDI0LTIzMC44MjE2MzYtMTg3Ljc4MDU2OS00MTguNjAzMjI4LTQxOC42MDMyMjgtNDE4LjYwMzIyOXoiIGZpbGw9IiM0RTZEQzQiLz4KDTxwYXRoIGQ9Ik02MjkuMjMzODQ2IDI5MS4wNTM3MzhIMjkxLjQ0MjgxNGE4LjY2MjA3IDguNjYyMDcgMCAwIDAtOC42NjMwOTMgOC42NjMwOTR2NDI4LjY0MjQyNGE4LjY2MjA3IDguNjYyMDcgMCAwIDAgOC42NjMwOTMgOC42NjIwN2g0MzkuNjM2OTA1YTguNjYyMDcgOC42NjIwNyAwIDAgMCA4LjY2MjA3LTguNjYyMDdWNDA1LjAyMjQxM2wtMTEwLjUwNzk0My0xMTMuOTY4Njc1eiIgZmlsbD0iI0ZGRkZGRiIvPgoNPHBhdGggZD0iTTczMS4wNzg2OTUgNzUwLjcwOTY0OUgyOTEuNDQ1ODg2Yy0xMi4zMjU1MzIgMC0yMi4zNTg1ODQtMTAuMDI2OTA5LTIyLjM1ODU4NC0yMi4zNTI0NDFWMjk5LjcxMzc2YzAtMTIuMzI1NTMyIDEwLjAzMzA1Mi0yMi4zNTI0NDEgMjIuMzU4NTg0LTIyLjM1MjQ0aDMzNy43OTEwMzFjMy43MDMzOTMgMCA3LjI1MjE4IDEuNTA0MDg4IDkuODI2MjI4IDQuMTU3OTk4bDExMC41MDQ4NzEgMTEzLjk3Mzc5NWExMy42ODMyMDMgMTMuNjgzMjAzIDAgMCAxIDMuODYzMTIgOS41MzEzNDh2MzIzLjMzMjc0N2MwIDEyLjMyNTUzMi0xMC4wMjY5MDkgMjIuMzUyNDQxLTIyLjM1MjQ0MSAyMi4zNTI0NDF6IG0tNDM0LjYxMjY5OS0yNy4zNzg2OTRoNDI5LjU4NjQ0NlY0MTAuNTcyODk2TDYyMy40NDE3MjcgMzA0Ljc0MDAxM0gyOTYuNDY1OTk2djQxOC41OTA5NDJ6IiBmaWxsPSIjNEU2REM0Ii8+Cg08cGF0aCBkPSJNNjI5LjcyMDE5MSAyOTEuMDUzNzM4VjM5NS44NTc2MTZhOC42NjIwNyA4LjY2MjA3IDAgMCAwIDguNjYyMDcgOC42NjMwOTRoMTAxLjM2MDU1MmwtMTEwLjAyMjYyMi0xMTMuNDY2OTcyeiIgZmlsbD0iI0ZGRkZGRiIvPgoNPHBhdGggZD0iTTczOS43NDE3ODkgNDE4LjIxMzEyOGgtMTAxLjM2MDU1MmMtMTIuMzI1NTMyIDAtMjIuMzUyNDQxLTEwLjAzMzA1Mi0yMi4zNTI0NC0yMi4zNTg1ODRWMjkxLjA1MDY2NmExMy42ODkzNDcgMTMuNjg5MzQ3IDAgMCAxIDguNTQ5NDQyLTEyLjY4Njk2M2M1LjE2NjUyNS0yLjA3ODQ4NyAxMS4wOTU4NDUtMC44NDI2NTggMTQuOTY2MTMyIDMuMTU0NTkxbDExMC4wMjM2NDUgMTEzLjQ3MjA5MWExMy42ODQyMjcgMTMuNjg0MjI3IDAgMCAxIDIuNzgwODczIDE0Ljg2NTc5MSAxMy42ODgzMjMgMTMuNjg4MzIzIDAgMCAxLTEyLjYwNzEgOC4zNTY5NTJ6IG0tOTYuMzM0Mjk5LTI3LjM3ODY5M2g2My45OTU5MDVsLTYzLjk5NTkwNS02Ni4wMDA2NzJ2NjYuMDAwNjcyeiIgZmlsbD0iIzRFNkRDNCIvPgoNPHBhdGggZD0iTTQ3OC45MTUxOTMgNDczLjgwMzk1OHMtMTQuNjE2OTg3LTE0LjgxMzU3My0zNC40NDY1NzMtMi43MTUzNDRjLTE3Ljc0MjkwOSAxMS41NDk0MjYtMTQuNjA0NyAzMi42ODY1MTUtMTQuNjA0NzAxIDMyLjY4NjUxNXMtMzkuNDA5MzQ2IDguMDcyMzEyLTM5LjQwOTM0NiA1MC40MjMyODFjMC44Nzc0NyA0Mi4yODIzNjggNDIuNzk4NDA3IDQyLjcxNjQ5NiA0Mi43OTg0MDcgNDIuNzE2NDk2bDYyLjkyNDkyIDAuMDY3NTc2VjU1MS43MTM0NEg0NjYuMDA0bDQ1LjI2OTA0MS00NS4yNjU5NyA0NS4yNjI4OTkgNDUuMjY1OTdoLTMwLjE3OTAydjQ1LjI2OTA0Mmw2MS4xMDAzNTctMC4wNjg2czM5LjAxMDAzMSAwLjAzMzc4OCA0NC40OTI5MzctNDAuMTkxNTk1YzIuNjA2ODEyLTQzLjk5OTQyNC0zNy43MDk2OTctNTIuNjcwNzA5LTM3LjcwOTY5Ny01Mi42NzA3MDlzNC41ODcwMDYtNjUuMTMxMzkzLTUyLjAyOTc1Ny03Mi41NTY2MDljLTQ4LjUzMjE2NC01LjIyMTgxNS02My4yOTY1OTEgNDIuMzA4OTg5LTYzLjI5NjU5IDQyLjMwODk4OXoiIGZpbGw9IiM0RTZEQzQiLz4KDTwvZz4KDTwvc3ZnPg==');
        }
    </style>
@endsection
@push('js') <script src="{{ asset('assets/js/dropify.js') }}"></script> <script src="{{ asset('assets/js/select2.js') }}"></script> <script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                'default': 'Drag dan drop filenya disini atau klik',
            }
        });
        $('#location').select2();
    });
</script> @endpush
