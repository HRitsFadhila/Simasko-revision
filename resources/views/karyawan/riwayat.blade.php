@extends('layouts.app')

@section('title', 'Riwayat Karyawan')

@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-history"></i> <span class="text-semibold">Riwayat Karyawan</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><i class="icon-home2 position-left"></i><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
                <li class="active">Riwayat Karyawan</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Riwayat Karyawan</h5>
        </div>

        <div class="panel-body">
            @if(count($riwayat) > 0)
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal Perubahan</th>
                            <th>Perubahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_karyawan }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->perubahan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Tidak ada riwayat karyawan.</p>
            @endif
        </div>
    </div>
@endsection
