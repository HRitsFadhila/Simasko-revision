@extends('layouts.app')

@section('title', 'Tambah Karyawan Baru')

@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-file-plus"></i> <span class="text-semibold">Tambah Karyawan Baru</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
                <li class="active">Tambah Karyawan Baru</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Tambah Karyawan Baru</h5>
            </div>

            <div class="panel-body">
                <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Karyawan:</label>
                        <input type="text" name="nama_karyawan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>No Telepon:</label>
                        <input type="text" name="no_telepon" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Gaji:</label>
                        <input type="text" name="gaji" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Foto:</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Umur:</label>
                        <input type="number" name="umur" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin:</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
