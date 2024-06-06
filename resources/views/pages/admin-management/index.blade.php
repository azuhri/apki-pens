@extends('layouts.app')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Admin Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Data Admin</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewAdmin">Lokasi
                            Baru</button>
                        <div class="modal fade" id="modalAddNewAdmin" tabindex="-1" aria-labelledby="modalAddNewAdminLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAddNewAdminLabel">Buat Admin Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: none" id="textErrorModalAddAdmin"
                                            class="alert text-center alert-danger font-weight-bold text-white"
                                            role="alert">
                                            Test
                                        </div>
                                        <form>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="Masukan nama" id="name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" name="Masukan email" id="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="phonenumber" class="form-label">No HP</label>
                                                <input type="number" class="form-control" name="Masukan No HP" id="phonenumber">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="Masukan password" id="password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                                <input type="password" class="form-control" name="Masukan konfirmasi password" id="confirm_password">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" onclick="addAdmin(this);"
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
            await fetch(`{{ route('admin.management.list') }}`)
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

        const addAdmin = (self) => {
            let name = $("#name").val();
            let email = $("#email").val();
            let phonenumber = $("#phonenumber").val();
            let password = $("#password").val();
            let confirm_password = $("#confirm_password").val();
            $.ajax({
                url: '{{ route('admin.management.store') }}',
                type: "POST",
                dataType: "json",
                beforeSend: function() {
                    $(self).html(`<div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`);
                },
                data: {
                    name,
                    email,
                    password,
                    phonenumber,
                    confirm_password,
                    _token: '{{csrf_token()}}',
                },
                success: function(res) {
                    $("#modalAddNewAdmin").modal("hide");
                    $("#modalAddNewAdmin form input").val("");
                    getData();
                },
                error: function(err) {
                    let errorMessage = err.responseJSON.errors;
                    $("#textErrorModalAddAdmin").html(errorMessage);
                    $("#textErrorModalAddAdmin").show(200);
                    setTimeout(() => {
                        $("#textErrorModalAddAdmin").hide(200);
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
                url: '{{ route('admin.management.store') }}',
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
                        url: '{{ route('admin.management.destroy', '') }}/' + id,
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
