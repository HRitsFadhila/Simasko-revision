@extends('layouts.app')
@section('title', 'Edit Daftar Barang ')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dbarang.index') }}">Daftar Barang</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Barang</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dbarang.update', $barang->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="id_kategori_barang">Kategori Barang</label>
                                <select class="form-control" id="id_kategori_barang" name="id_kategori_barang">
                                    @foreach($kategori_barang as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $barang->id_kategori_barang == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_supplier">Supplier</label>
                                <select class="form-control" id="id_supplier" name="id_supplier">
                                    @foreach($supplier as $sup)
                                        <option value="{{ $sup->id }}" {{ $barang->id_supplier == $sup->id ? 'selected' : '' }}>{{ $sup->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}">
                            </div>

                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $barang->satuan }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $barang->jumlah }}">
                            </div>

                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $barang->harga_beli }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('dbarang.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
