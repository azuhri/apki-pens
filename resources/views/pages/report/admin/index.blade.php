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
                                <div class="mb-2 d-flex align-items-center">
                                    <input id="searchInput" type="text" placeholder="Cari laporan.." class="form-control"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button onclick="searching(this);" type="button" class="btn btn-primary m-0">
                                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor"
                                                stroke-width="2" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" class="css-i6dzq1">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-primary dropdown-toggle m-0" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="css-i6dzq1">
                                                    <line x1="8" y1="6" x2="21" y2="6">
                                                    </line>
                                                    <line x1="8" y1="12" x2="21" y2="12">
                                                    </line>
                                                    <line x1="8" y1="18" x2="21" y2="18">
                                                    </line>
                                                    <line x1="3" y1="6" x2="3.01" y2="6">
                                                    </line>
                                                    <line x1="3" y1="12" x2="3.01" y2="12">
                                                    </line>
                                                    <line x1="3" y1="18" x2="3.01" y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li onclick="sorting('DESC');"><a class="dropdown-item"
                                                        href="#">Terbaru ke terlama</a></li>
                                                <li onclick="sorting('ASC');"><a class="dropdown-item"
                                                        href="#">Terlama ke terbaru</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <select onchange="changeStatus(this);" class="form-select my-2"
                                        style="margin-right: 4px" aria-label="Default select example">
                                        <option value="">Semua Status</option>
                                        <option selected value="BARU">BARU</option>
                                        <option value="DIPROSES">DIPROSES</option>
                                        {{-- <option value="MY_REPORT">DIPROSES OLEH SAYA</option> --}}
                                        <option value="SELESAI">SELESAI</option>
                                    </select>
                                    <select onchange="changeTypeUser(this);" class="form-select my-2"
                                        aria-label="Default select example">
                                        <option value="">Semua Pengguna</option>
                                        <option value="MAHASISWA">MAHASISWA</option>
                                        <option value="DOSEN">DOSEN</option>
                                        <option value="KARYAWAN">KARYAWAN</option>
                                    </select>
                                </div>
                                <select onchange="changeLocation(this);" class="form-select my-2"
                                    style="margin-right: 4px" aria-label="Default select example">
                                    <option value="">Semua Lokasi</option>
                                    @foreach ($locations as $loc)
                                        <option value="{{ $loc->id }}">{{ $loc->location_name }}</option>
                                    @endforeach
                                </select>
                                <div class="btn-group my-2" role="group" aria-label="Basic radio toggle button group">
                                    <input onchange="radioStatus(this);" checked type="radio" class="btn-check"
                                        name="radioStatus" id="new_report" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="new_report">Laporan Masuk</label>

                                    <input onchange="radioStatus(this);" type="radio" class="btn-check"
                                        name="radioStatus" id="my_report" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="my_report">Diproses oleh Saya</label>
                                </div>
                            </div>
                            <small class="font-weight-bold">Laporan Masuk</small>
                            <div style="overflow-y: scroll">
                                <div id="containerData" style="max-height: 600px" class="mt-2">
                                    {{-- <div class="p-3 border mb-2 border-1 rounded-3 shadow cursor-pointer">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card mb-4 rounded-2 border border-1" id="containerDetailData">
                        <div class="card-body d-flex justify-content-center" id="loadingDetailData">
                            <small class="text-muted text-center w-100">-- no selected data --</small>
                        </div>
                        {{-- <div class="card-header border-bottom border-bottom-4">
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
                                                <button class="accordion-button font-weight-bold" style="padding-left: 0"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Foto Kerusakan
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body" style="padding-left: 0">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('img/logo-pens.jpeg') }}" alt="">
                                                        <img src="{{ asset('img/logo-pens.jpeg') }}" alt="">
                                                        <img src="{{ asset('img/logo-pens.jpeg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
    <style>
        .selectedData {
            background-color: #0277b621;
            border: 1px solid #0277b6 !important;
        }

        .post {
            width: 220px;
            height: 80px;
        }

        .post .avatar {
            float: left;
            width: 52px;
            height: 52px;
            background-color: #ccc;
            border-radius: 25%;
            margin: 8px;
            background-image: linear-gradient(90deg, #ddd 0px, #e8e8e8 40px, #ddd 80px);
            background-size: 600px;
            animation: shine-avatar 1.6s infinite linear;
        }

        .post .line {
            float: left;
            width: 140px;
            height: 16px;
            margin-top: 12px;
            border-radius: 7px;
            background-image: linear-gradient(90deg, #ddd 0px, #e8e8e8 40px, #ddd 80px);
            background-size: 600px;
            animation: shine-lines 1.6s infinite linear;
        }

        .post .avatar+.line {
            margin-top: 11px;
            width: 100px;
        }

        .post .line~.line {
            background-color: #ddd;
        }

        @keyframes shine-lines {
            0% {
                background-position: -100px;
            }

            40%,
            100% {
                background-position: 140px;
            }
        }

        @keyframes shine-avatar {
            0% {
                background-position: -32px;
            }

            40%,
            100% {
                background-position: 208px;
            }
        }
    </style>
@endsection
@push('js')
    <script>
        const skeleton = (total) => {
            let component = '';
            for (let i = 0; i < total; i++) {
                component += ` <div class="post">
                    <div class="avatar"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>`;
            }
            return component;
        }

        let search, orderBy, sortBy, status, typeUser, locationId, approvedBy;

        const getData = async () => {
            let loading = skeleton(2);
            $("#containerData").html(loading)
            await fetch(
                    `{{ route('admin.report.list') }}?order_by=${orderBy ?? ''}&sort_by=${sortBy ?? ''}&status=${status ?? 'BARU'}&type_user=${typeUser ?? ''}&location_id=${locationId ?? ''}&approved_by=${approvedBy ?? ''}&search=${search ?? ''}`
                )
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // setTimeout(() => {
                    // }, 2000);
                    $("#containerData").html(data.data.html);
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                });
        }

        const getDetailData = async (id) => {
            let loading = `<div class="card-body d-flex justify-content-center" id="loadingDetailData">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                          </div>`;
            $("#containerDetailData").html(loading)
            await fetch(`{{ route('admin.report.detail', '') }}/` + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // setTimeout(() => {
                    // }, 2000);
                    $("#containerDetailData").html(data.data.html);
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                });
        }

        getData();

        const selectedData = (self, id) => {
            $(".selectedData").removeClass("selectedData");
            $(self).addClass("selectedData");
            getDetailData(id);
        }

        const sorting = (val) => {
            orderBy = "created_at";
            sortBy = val
            getData()
        }

        const changeStatus = (self) => {
            status = $(self).val();
            getData();
        }

        const changeTypeUser = (self) => {
            typeUser = $(self).val();
            getData();
        }

        const changeLocation = (self) => {
            locationId = $(self).val();
            getData();
        }

        const searching = (self) => {
            search = $("#searchInput").val();
            console.log(search);
            getData();
        }

        const radioStatus = (self) => {
            let id = $(self).attr("id");
            if (id == "my_report") {
                status = '';
                approvedBy = '{{ Auth::id() }}';
            } else {
                approvedBy = '';
                status = "BARU";
            }
            getData();
        }

        const updateStatus = (id, status) => {
            let text, dataParams;
            if (status == "DIPROSES") {
                text = 'Apakah Anda ingin memproses laporan ini?';
            } else {
                text = 'Apakah Anda ingin menyelesaikan laporan ini?'
            }
            Swal.fire({
                title: "Konfirmasi!",
                text: text,
                showCancelButton: true,
                cancelButtonText: "BATAL",
                confirmButtonText: "IYA",
                confirmButtonColor: "#38a3a5",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.report.update', '') }}/' + id,
                        type: "post",
                        dataType: "json",
                        data: {
                            status,
                            approved_by: '{{ Auth::id() }}',
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            getData();
                            getDetailData(id);
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
    </script>
@endpush
