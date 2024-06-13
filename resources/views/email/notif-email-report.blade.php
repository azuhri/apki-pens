@extends('email.template.master-email')
@section('content-indonesia')
        <p>Laporan Dari: </p>
        <p><b>{{$reporterName}} - {{$statusPelapor}}</b></p>
        <p>Judul Laporan: </p>
        <p><b>{{$title}}</b></p>
        <p>Keterangan:</p>
        <p><b>{{$description}}</b></p>
@endsection