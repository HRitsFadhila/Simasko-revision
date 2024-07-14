@extends('layouts.app')

@section('title', 'Edit Barang Masuk')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('bmasuk.index') }}">Barang Masuk</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('bmasuk.update', $barangMasuk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_daftar_barang">Barang</label>
                        <select name="id_daftar_barang" class="form-control" id="id_daftar_barang" required>
                            @foreach ($daftarBarang as $barang)
                                <option value="{{ $barang->id }}" {{ $barang->id == $barangMasuk->id_daftar_barang ? 'selected' : '' }}>
                                    {{ $barang->kd_barang }} - {{ $barang->nama }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('id_daftar_barang'))
                            <div class="text-danger">
                                {{ $errors->first('id_daftar_barang') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $barangMasuk->tanggal }}" required>
                        @if($errors->has('tanggal'))
                            <div class="text-danger">
                                {{ $errors->first('tanggal') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ $barangMasuk->jumlah }}" required>
                        @if($errors->has('jumlah'))
                            <div class="text-danger">
                                {{ $errors->first('jumlah') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')

@endpush
