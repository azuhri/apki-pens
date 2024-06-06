@extends('layouts.app')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Denah'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Data Denah</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewMap">Denah
                            Baru</button>
                        <div class="modal fade" id="modalAddNewMap" tabindex="-1" aria-labelledby="modalAddNewMapLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAddNewMapLabel">Buat Denah Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: none" id="textErrorModalAddMap"
                                            class="alert text-center alert-danger font-weight-bold text-white"
                                            role="alert">
                                            Test
                                        </div>
                                        <form>
                                            <div class="mb-3">
                                                <label for="map_name" class="form-label">Nama Denah</label>
                                                <input type="text" class="form-control" placeholder="Masukan nama denah" id="map_name">
                                            </div>
                                            <input type="file" class="filepond mt-4" name="map" id="map">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" onclick="addNewMap(this);"
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
                    {{-- <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Role
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-1.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Admin</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-2.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Creator</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Creator</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-3.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Member</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Member</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0 cursor-pointer">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2 cursor-pointer">Delete</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUpdateMap" tabindex="-1" aria-labelledby="modalUpdateMapLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateMapLabel">Edit Denah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="display: none" id="textErrorModalUpdateMap"
                        class="alert text-center alert-danger font-weight-bold text-white" role="alert">
                        Test
                    </div>
                    <form>
                        <input type="hidden" id="map_id">
                        <div class="mb-3">
                            <label for="map_name" class="form-label">Nama Denah</label>
                            <input type="text" class="form-control" name="Masukan nama denah" id="edit_map_name">
                        </div>
                        <input type="file" class="filepond mt-4" name="edit_map" id="edit_map">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" onclick="updateMap(this);" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection
@push('js')
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        const inputElement = document.querySelector('#map');
        const inputElement2 = document.querySelector('#edit_map');
        const pond = FilePond.create(inputElement, {
            instantUpload: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            labelFileTypeNotAllowed: "File yang di bolehkan hanya .jpg/.png/.jpeg",
            labelIdle: "Upload denah dengan cara Drag & Drop atau Browse"
        });
        const pond2 = FilePond.create(inputElement2, {
            instantUpload: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            labelFileTypeNotAllowed: "File yang di bolehkan hanya .jpg/.png/.jpeg",
            labelIdle: "Upload denah di sini jika ingin ubah denah yang sebelumnya"
        });

        const getData = async () => {
            await fetch(`{{ route('admin.map.list') }}`)
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

        const addNewMap = (self) => {
            let dataForm = new FormData();
            let mapName = $("#map_name").val();
            let mapFile = pond.getFile();
            dataForm.append("name", mapName);
            dataForm.append("map", mapFile?.file ?? "");
            dataForm.append("_token", "{{ csrf_token() }}")
            $.ajax({
                url: '{{ route('admin.map.store') }}',
                type: "POST",
                contentType: false, // Tidak mengatur header konten
                processData: false, // Tidak memproses data
                async: true,
                dataType: "json",
                beforeSend: function() {
                    $(self).html(`<div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`);
                },
                data: dataForm,
                success: function(res) {
                    pond.removeFile({
                        revert: true
                    });
                    $("#modalAddNewMap").modal("hide");
                    $("#map_name").val("");
                    getData();
                },
                error: function(err) {
                    let errorMessage = err.responseJSON.errors;
                    $("#textErrorModalAddMap").html(errorMessage);
                    $("#textErrorModalAddMap").show(200);
                    setTimeout(() => {
                        $("#textErrorModalAddMap").hide(200);
                    }, 3000);
                },
                complete: function() {
                    $(self).html(`Simpan`);
                }
            });
        }

        const updateMap = (self) => {
            let dataForm = new FormData();
            let mapName = $("#edit_map_name").val();
            let mapId = $("#map_id").val();
            let mapFile = pond2.getFile();
            dataForm.append("name", mapName);
            dataForm.append("map", mapFile?.file ?? "");
            dataForm.append("map_id", mapId);
            dataForm.append("_token", "{{ csrf_token() }}")
            $.ajax({
                url: '{{ route('admin.map.store') }}',
                type: "POST",
                contentType: false, // Tidak mengatur header konten
                processData: false, // Tidak memproses data
                async: true,
                dataType: "json",
                beforeSend: function() {
                    $(self).html(`<div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`);
                },
                data: dataForm,
                success: function(res) {
                    pond2.removeFile({
                        revert: true
                    });
                    $("#modalUpdateMap").modal("hide");
                    getData();
                },
                error: function(err) {
                    let errorMessage = err.responseJSON.errors;
                    $("#textErrorModalUpdateMap").html(errorMessage);
                    $("#textErrorModalUpdateMap").show(200);
                    setTimeout(() => {
                        $("#textErrorModalUpdateMap").hide(200);
                    }, 3000);
                },
                complete: function() {
                    $(self).html(`Simpan`);
                }
            });
        }


        const deleteMap = (id) => {
            Swal.fire({
                title: "Konfirmasi!",
                text: "Apakah Anda ingin menghapus denah ini?",
                showCancelButton: true,
                cancelButtonText: "BATAL",
                confirmButtonText: "HAPUS",
                confirmButtonColor: "#f5365c",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.map.destroy', '') }}/' + id,
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
            $("#edit_map_name").val(json.name)
            $("#map_id").val(json.id);
            $("#modalUpdateMap").modal("show");
        }
    </script>
@endpush
