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
                                        <button class="text-uppercase rounded-2 border-2 border-1 accordion-button w-100 btn text-secondary"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#map_{{ $map->id }}" aria-expanded="true"
                                            aria-controls="map_{{ $map->id }}">
                                            Lihat Denah  &nbsp;<span class="text-primary">{{ $map->name }}</span> 
                                        </button>
                                    </h2>
                                    <div id="map_{{ $map->id }}"
                                        class="accordion-collapse collapse"
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
                                    <label for="example-text-input" class="form-control-label">Nama Laporan</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tempat</label>
                                    <input class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Foto Kerusakan</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm ms-auto">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
