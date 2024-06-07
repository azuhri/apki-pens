@extends('layouts.app')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Laporan Saya'])
    <div class="row mt-4 mx-4">
        {{-- <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Data Lokasi</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewLocation">
                            <svg style="margin-right: 4px" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            Buat Lokasi</button>
                        <div class="modal fade" id="modalAddNewLocation" tabindex="-1" aria-labelledby="modalAddNewLocationLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAddNewLocationLabel">Buat Lokasi Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: none" id="textErrorModalAddLocation"
                                            class="alert text-center alert-danger font-weight-bold text-white"
                                            role="alert">
                                            Test
                                        </div>
                                        <form>
                                            <div class="mb-3">
                                                <label for="location_name" class="form-label">Nama Lokasi</label>
                                                <input type="text" class="form-control" name="Masukan nama lokasi" id="location_name">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" onclick="addNewLocation(this);"
                                            class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="container" id="containerData">

                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="card mb-4 rounded-2 border border-1">
                        <div class="card-body shadow">
                            <div class="d-flex flex-column">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">
                                        <svg viewBox="0 0 24 24" width="30" height="30" stroke="currentColor"
                                            stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            class="css-i6dzq1">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                    <input type="text" placeholder="Cari laporan.." class="form-control"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <small class="font-weight-bold">Laporan Masuk</small>
                            <div id="containerData" class="mt-2">
                                <div class="p-3 border mb-2 border-1 rounded-3 shadow cursor-pointer">
                                    <div class="d-flex mb-2">
                                        <div class="d-flex align-items-center">
                                            <img style="width: 50px" class="rounded-circle"
                                                src="https://ui-avatars.com/api/?background=14DCD7&color=ffffff&name={{ Auth::user()->name }}"
                                                alt="">
                                            <div class="mx-2 d-flex flex-column">
                                                <small class="font-weight-bold m-0">Azis Zuhri</small>
                                                <small style="font-size: 12px" class="m-0">2 Juni 2024</small>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="font-weight-bold">Halo ac di ruangan B 204 mati nih...</small>
                                    <div class="mt-3 d-flex">
                                        <div class="d-flex justify-content-center">
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color:skyblue">PENDING</span>
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color:orange; margin-left: 4px">DOSEN</span>
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color: green; margin-left: 4px">Ruang B
                                                204</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 border mb-2 border-1 rounded-3 shadow cursor-pointer">
                                    <div class="d-flex mb-2">
                                        <div class="d-flex align-items-center">
                                            <img style="width: 50px" class="rounded-circle"
                                                src="https://ui-avatars.com/api/?background=14DCD7&color=ffffff&name={{ Auth::user()->name }}"
                                                alt="">
                                            <div class="mx-2 d-flex flex-column">
                                                <small class="font-weight-bold m-0">Azis Zuhri</small>
                                                <small style="font-size: 12px" class="m-0">2 Juni 2024</small>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="font-weight-bold">Halo ac di ruangan B 204 mati nih...</small>
                                    <div class="mt-3 d-flex">
                                        <div class="d-flex justify-content-center">
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color:skyblue">PENDING</span>
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color:orange; margin-left: 4px">DOSEN</span>
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color: green; margin-left: 4px">Ruang B
                                                204</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 border mb-2 border-1 rounded-3 shadow cursor-pointer">
                                    <div class="d-flex mb-2">
                                        <div class="d-flex align-items-center">
                                            <img style="width: 50px" class="rounded-circle"
                                                src="https://ui-avatars.com/api/?background=14DCD7&color=ffffff&name={{ Auth::user()->name }}"
                                                alt="">
                                            <div class="mx-2 d-flex flex-column">
                                                <small class="font-weight-bold m-0">Azis Zuhri</small>
                                                <small style="font-size: 12px" class="m-0">2 Juni 2024</small>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="font-weight-bold">Halo ac di ruangan B 204 mati nih...</small>
                                    <div class="mt-3 d-flex">
                                        <div class="d-flex justify-content-center">
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color:skyblue">PENDING</span>
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color:orange; margin-left: 4px">DOSEN</span>
                                            <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                                style="font-size: 12px; background-color: green; margin-left: 4px">Ruang B
                                                204</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card mb-4 rounded-2 border border-1">
                        <div class="card-header border-bottom border-bottom-4">
                            <div class="d-flex flex-column">
                                <h5>AC RUSAK DI RUANG B 204</h5>
                                <div class="d-flex">
                                    <div class="d-flex justify-content-center">
                                        <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                            style="font-size: 12px; background-color:skyblue">PENDING</span>
                                        <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                            style="font-size: 12px; background-color:orange; margin-left: 4px">DOSEN</span>
                                        <span class="font-weight-bold text-white p-1 px-2 rounded-2"
                                            style="font-size: 12px; background-color: green; margin-left: 4px">Ruang B
                                            204</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row position-relative">
                                <div class="col-1 d-flex justify-content-end">
                                </div>
                                <div class="col-11">
                                    <img style="width: 50px; left: 25px" class="rounded-circle position-absolute"
                                        src="https://ui-avatars.com/api/?background=14DCD7&color=ffffff&name={{ Auth::user()->name }}"
                                        alt="">
                                    <div class="mx-2 mt-1 d-flex flex-column">
                                        <small class="font-weight-bold m-0">Azis Zuhri</small>
                                        <small style="font-size: 12px" class="m-0">2 Juni 2024</small>
                                    </div>
                                    <div class="my-3">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem earum eos
                                        incidunt. Sequi optio amet vero minus temporibus! Molestiae ex magni quod eveniet
                                        nisi nostrum necessitatibus laborum dolor distinctio inventore?
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button font-weight-bold" style="padding-left: 0" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Foto Kerusakan
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body" style="padding-left: 0">
                                                    <div class="d-flex">
                                                        <img src="{{asset("img/logo-pens.jpeg")}}" alt="">
                                                        <img src="{{asset("img/logo-pens.jpeg")}}" alt="">
                                                        <img src="{{asset("img/logo-pens.jpeg")}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUpdateLocation" tabindex="-1" aria-labelledby="modalUpdateLocationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateLocationLabel">Edit Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="display: none" id="textErrorModalUpdateLocation"
                        class="alert text-center alert-danger font-weight-bold text-white" role="alert">
                        Test
                    </div>
                    <form>
                        <input type="hidden" id="location_id">
                        <div class="mb-3">
                            <label for="map_name" class="form-label">Nama Lokasi</label>
                            <input type="text" class="form-control" placeholder="Masukan nama lokasi"
                                id="edit_location_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" onclick="updateLocation(this);" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@push('js')
    <script>
        const getData = async () => {
            await fetch(`{{ route('admin.location.list') }}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    $("#containerData").html(data.data);
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                });
        }

        getData();

        const addNewLocation = (self) => {
            let locationName = $("#location_name").val();
            $.ajax({
                url: '{{ route('admin.location.store') }}',
                type: "POST",
                dataType: "json",
                beforeSend: function() {
                    $(self).html(`<div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`);
                },
                data: {
                    location_name: locationName,
                    _token: '{{ csrf_token() }}',
                },
                success: function(res) {
                    $("#modalAddNewLocation").modal("hide");
                    $("#location_name").val("");
                    getData();
                },
                error: function(err) {
                    let errorMessage = err.responseJSON.errors;
                    $("#textErrorModalAddLocation").html(errorMessage);
                    $("#textErrorModalAddLocation").show(200);
                    setTimeout(() => {
                        $("#textErrorModalAddLocation").hide(200);
                    }, 3000);
                },
                complete: function() {
                    $(self).html(`Simpan`);
                }
            });
        }

        const updateLocation = (self) => {
            let dataForm = new FormData();
            let locationName = $("#edit_location_name").val();
            let locationId = $("#location_id").val();
            $.ajax({
                url: '{{ route('admin.location.store') }}',
                type: "POST",
                dataType: "json",
                beforeSend: function() {
                    $(self).html(`<div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`);
                },
                data: {
                    location_name: locationName,
                    id: locationId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(res) {
                    $("#modalUpdateLocation").modal("hide");
                    getData();
                },
                error: function(err) {
                    let errorMessage = err.responseJSON.errors;
                    $("#textErrorModalUpdateLocation").html(errorMessage);
                    $("#textErrorModalUpdateLocation").show(200);
                    setTimeout(() => {
                        $("#textErrorModalUpdateLocation").hide(200);
                    }, 3000);
                },
                complete: function() {
                    $(self).html(`Simpan`);
                }
            });
        }


        const deleteLocation = (id) => {
            Swal.fire({
                title: "Konfirmasi!",
                text: "Apakah Anda ingin menghapus lokasi ini?",
                showCancelButton: true,
                cancelButtonText: "BATAL",
                confirmButtonText: "HAPUS",
                confirmButtonColor: "#f5365c",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.location.destroy', '') }}/' + id,
                        type: "DELETE",
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        success: function(res) {
                            Swal.hideLoading()
                            getData();
                        },
                        error: function(err) {
                            let errorMessage = err.responseJSON.errors;
                            Swal.fire({
                                icon: "error",
                                title: "Terjadi Kesalahan!",
                                text: errorMessage,
                            });
                        },
                        complete: function() {
                            $(self).html(`Simpan`);
                        }
                    });
                }
            });

        }

        const openModalUpdate = (self, data) => {
            let json = JSON.parse(data);
            $("#edit_location_name").val(json.location_name)
            $("#location_id").val(json.id);
            $("#modalUpdateLocation").modal("show");
        }
    </script>
@endpush
