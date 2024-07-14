@extends('layouts.app')

@section('title', 'Tambah Daftar Barang')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ '/dbarang'}}">Daftar Barang</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <form action="{{ route('dbarang.store') }}" method="POST">
      @csrf
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="id_kategori_barang">Kategori Barang</label>
                <select name="id_kategori_barang" class="form-control">
                    @foreach ($kategori_barang as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('id_kategori_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="id_supplier">Supplier</label>
                <select name="id_supplier" class="form-control">
                    @foreach ($supplier as $sup)
                        <option value="{{ $sup->id }}">{{ $sup->nama }}</option>
                    @endforeach
                </select>
                @error('id_supplier')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6"> <!-- Menggunakan col-lg-12 untuk nama barang -->
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang" required>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Barang" required>
                  @error('jumlah')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan" required>
                @error('satuan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" id="harga_beli" placeholder="Harga Beli" required>
                @error('harga_beli')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
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
