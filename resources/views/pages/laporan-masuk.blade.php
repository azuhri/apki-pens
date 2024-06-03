@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Laporan Masuk'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Laporan Masuk</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Laporan</th>
                                        <th>Tempat</th>
                                        <th>Keterangan</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>hello</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan Kursi</td>
                                        <td>Kelas</td>
                                        <td>Meja kursi patah satu sehingga kurang nyaman untuk digunakan</td>
                                        <td>Foto</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
