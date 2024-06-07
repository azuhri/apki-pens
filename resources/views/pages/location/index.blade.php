@extends('layouts.app')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Lokasi'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
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
        </div>
    </div>

    <div class="modal fade" id="modalUpdateLocation" tabindex="-1" aria-labelledby="modalUpdateLocationLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" placeholder="Masukan nama lokasi" id="edit_location_name">
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
                    _token: '{{csrf_token()}}',
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
                    _token: '{{csrf_token()}}',
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
